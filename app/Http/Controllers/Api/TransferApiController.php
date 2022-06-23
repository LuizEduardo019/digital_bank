<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Request\TransfersRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class TransferApiController extends Controller
{
    
    public function store(transfersRequest $request, $id)
    {
       $user = new user;
       $transfers = new transfers;
       $account = new account;
       
       $to_account = Account::where(Auth::user()->id);
       $of_account = Account::where(Auth::user()->id);
       $to_account_id = $to_account->id;
       $of_account_id = $of_account->id;

      

       
        if(!$account->active){
        
        return response()->json(['mensagem' => 'Sua conta precisa estar ativa para efetuar o pagamento'], 203);
       
        }elseif(!Hash::check($request['password'] == $account['password']))
        {

            return response()->json(['mensagem' => 'A senha esta incorreta'], 203);
        
        }elseif($request['to_account'] ==  $account['account_number'])
       {
        
            return response()->json(['mensagem' => 'Não é possivel efetuar uma transferencia para si próprio'], 406);
       
        }elseif($request['value'] > $account['balance']){
        
            return response()->json(['msg' => 'Você não tem saldo para efetuar o pagamento'], 406);
        
        }else{
            
            $to_account_id['balance'] - $request['value'];
            $of_account_id['balance'] + $request['value'];

            return response()->json(['Transação concluida com sucesso'], 200);
        }
      }
    }



