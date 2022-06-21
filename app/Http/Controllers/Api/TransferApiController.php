<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Request\TransfersRequest;

class TransferApiController extends Controller
{
   
    


    public function store(transfersRequest $request)
    {
       
       
       
       
       
       $user = new user;
       $transfers = new transfers;
       $account = new account;
       
        if(!$account->active){
        
        return response()->json(['mensagem' => 'Sua conta precisa estar ativa para efetuar o pagamento'], 203);
       
        }elseif(!Hash::check($request->password == $account->password))
        {

            return response()->json(['mensagem' => 'A senha esta incorreta'], 203);
        
        }elseif($request->to_account_id ==  $account->account_number)
       {
        
            return response()->json(['mensagem' => 'Não é possivel efetuar uma transferencia para si próprio'], 406);
       
        }elseif($request->value > $account->balance){
        
            return response()->json(['msg' => 'Você não tem saldo para efetuar o pagamento'], 406);
        
        }
     
    
      }

    }



