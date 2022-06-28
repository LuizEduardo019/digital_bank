<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;


class TransferApiController extends Controller
{
    public function store(Request $request)
    {
        $to_account = Account::where('user_id', auth()->user()->id)->first()->makeVisible('password');
        $of_account = Account::find($request['of_account']);

            if(!$to_account->active){

            return response()->json(['mensagem' => 'Sua conta precisa estar ativa para efetuar o pagamento'], 203);

            }elseif(!Hash::check($request['password_transfer'], $to_account->password))
            {

                return response()->json(['mensagem' => 'A senha esta incorreta'], 203);

            }elseif($to_account->account_number == $of_account->account_number)
           {

                return response()->json(['mensagem' => 'Não é possivel efetuar uma transferencia para si próprio'], 406);

            }elseif($to_account->balance < $request['value']){

                return response()->json(['mensagem' => 'Você não tem saldo para efetuar o pagamento'], 406);

            }else{

              $to_account->balance = $to_account->balance + $request['value'];
              $to_account->save();
              $of_account->balance = $of_account->balance - $request['value'];
              $of_account->save();

              return response()->json([ 'msg' => 'Transação concluida com sucesso'], 200);
            }
          }
        }





