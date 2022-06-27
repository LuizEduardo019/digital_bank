<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;
use App\Models\Account;
use App\Request\TransfersRequest;
use Illuminate\Support\Facades\Hash;

class TransferApiController extends Controller
{
    
    public function store(Request $request)
    { 
       $to_account = account::where('user_id', auth()->user()->id)->first()->makeVisible('password');
       $of_account = account::where('account_number',$request['of_account'])->first();


       
        if(!$to_account->active){
        
        return response()->json(['mensagem' => 'Sua conta precisa estar ativa para efetuar o pagamento'], 203);
       
        }elseif(!Hash::check($request['password'], $to_account->password))
        {

            return response()->json(['mensagem' => 'A senha esta incorreta'], 203);
        
        }elseif($to_account->account_number ==  $request['account_number'])
       {
        
            return response()->json(['mensagem' => 'Não é possivel efetuar uma transferencia para si próprio'], 406);
       
        }elseif($to_account->balance < $request['value']){
        
            return response()->json(['mensagem' => 'Você não tem saldo para efetuar o pagamento'], 406);
        
        }else{
            
            $transfer = new transfer;
            
            $transfer = $to_account->balance = $to_account->balance - $request['value'];
            $transfer = $of_account->balance = $of_account->balance + $request['value'];
            $transfer = save();

            return response()->json([ 'msg' => 'Transação concluida com sucesso'], 200);
        }
      }
    }
    



