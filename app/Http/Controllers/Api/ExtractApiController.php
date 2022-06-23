<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Request\ExtractRequest;
use App\Models\Extract;

class ExtractApiController extends Controller
{
   
    public function index()
    {
        $account = new account;
        $payments = new payments;
        $transfers = new transfers;
        
        if(!$account == active) {
            return response()->json(['mensagem' => 'Sua conta precisa estar ativa para ver seu extrato']);
        }elseif($payments == null){
            return response()->json(['mensagem' => 'Você não tem pagamentos para ser exibidos']);
        }elseif($transfers == null){
            return response()->json(['mensagem' => 'Você não tem transferencias para ser exibidas']);
        }else{
            return response()->json([
                'mensagem' => 'Essas são suas transferencias',
                'mensagem' => explode($request->$account['transfers']->all())
            ]);
            return response()->json([
                'mensagem' => 'Esses são seus pagamentos',
                'mensagem' => explode( $request->$account['payments']->all())
            ]);
        }
        
    }

}
