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
    
    public function store(transfersRequest $request)
    {
        $to_account = Account::where(Auth::user()->id);
        $of_account = Account::where(Auth::user()->id);



       $user = new user;
       $transfers = new transfers;
       $account = new account;

       $account->password = $request->password;
       $account->account_number = $request->account_number;
       $account->balance = $request->balance;
       
       $transfers->to_account = $request->to_account;
       $transfers->value = $request->value;
       $transfers->date = $request->date;
       

       
        if(!$account->active){
        
        return response()->json(['mensagem' => 'Sua conta precisa estar ativa para efetuar o pagamento'], 203);
       
        }elseif(!Hash::check($request->password == $account['password']))
        {

            return response()->json(['mensagem' => 'A senha esta incorreta'], 203);
        
        }elseif($request->to_account ==  $account['account_number'])
       {
        
            return response()->json(['mensagem' => 'Não é possivel efetuar uma transferencia para si próprio'], 406);
       
        }elseif($request->value > $account['balance']){
        
            return response()->json(['msg' => 'Você não tem saldo para efetuar o pagamento'], 406);
        
        }
     
    
      }

    }



