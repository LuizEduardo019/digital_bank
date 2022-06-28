<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Request\ExtractRequest;
use App\Models\Extract;
use App\Models\Account;
use App\Models\Payment;
use App\Models\Transfer;

class ExtractApiController extends Controller
{

    public function index()
    {
        $account = new Account;
        $payments = new Payment;
        $transfers = new Transfer;

        if(!$account->active) {
            return response()->json(['mensagem' => 'Sua conta precisa estar ativa para ver seu extrato']);
        }elseif($payments == null){
            return response()->json(['mensagem' => 'Você não tem pagamentos para ser exibidos']);
        }elseif($transfers == null){
            return response()->json(['mensagem' => 'Você não tem transferencias para ser exibidas']);
        }else{

        }

    }

}
