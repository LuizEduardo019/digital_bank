<?php

namespace App\Http\Controllers\Api;

use App\Models\user;
use App\Models\Account;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PaymentsRequest;


class PaymentApiController extends Controller
{


    public function  __construct()
    {
    }

    public function index()
    {
        $receiver = Payment::where('receiver_account', auth()->user()->id);
        $payer = Payment::where('payer_account', auth()->user()->id);

        return response()->json([
            'message' => 'Esses são seus boletos gerados',
            'data' => $receiver,
            'data' => $payer
        ], 200);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $payer_account = Account::where('user_id', auth()->user()->id)->first()->makevisible('password');

        if (!$user->document_type == 'cnpj') {

            return response()->json(['Você não tem permissão para gerar um boleto'], 203);
        } elseif (!$payer_account->active) {

            return response()->json(['Sua conta precisa estar ativa para gerar um boleto'], 203);
        } else {
            $payment = Payment::create([
                $codigoBoleto = rand(1000, 999999),
                'payer_account' => $request['payer_account'],
                'ticket_code' => $codigoBoleto,
                'ticket_value' => $request['ticket_value'],
                'receiver_account' => $request['receiver_account'],
                'password_payment' => $request['password_payment'],
                'was_paid' => $request['was_paid'],
                'status' => 'processing'
            ]);

            $payment->update([
                'status' => 'generated ticket'
            ]);

            return response()->json(['Boleto gerado com sucesso']);
        }
    }


    public function update(Request $request, $id)
    {

        $payer_account = Account::where('user_id', auth()->user()->id)->first()->makevisible('password');
        $receiver_account = Account::where('codigoBoleto', $request['payer_account'])->first();


        if ($this->payment->was_paid == true) {

            return response()->json(['Esse boleto ja está pago'], 203);
        } elseif (!Hash::check($this->payment->password_payment, $payer_account->password)) {

            return response()->json(['Senha incorreta'], 203);
        } elseif ($payer_account->account_number == $receiver_account->account_number) {

            return response()->json(['Esse boleto foi gerado por você'], 203);
        } elseif ($payer_account->balance < $this->payment->value) {
            return response()->json(['Saldo insuficiente'], 203);
        } else {
            $payer_account->balance = $payer_account->balance - $request['value'];
            $payer_account->save();
            $receiver_account->balance = $receiver_account->balance + $request['value'];
            $receiver_account->save();
            $this->payment->was_paid = $request['was_paid'];
            $this->payment->was_paid = true;
            $this->payment->was_paid->save();

            $this->payment->update([
                'status' => 'payment made'
            ]);
        }
    }
}
