<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use http\Env\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Address;
use App\Models\Account;


class UserApiController extends Controller
{

    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
        
    }

    public function index()
    {
        $users = $this->user->all();

        return response()->json($users, 200);
    }

    public function store(Request $request)
    {        
        //validate
        $request->validate([
           
            //user
            'name' => 'required',
            'birth_date' => 'required',
            'email' => 'required|unique',
            'telephone' => 'required',
            'gender' => 'required',
            'document_type' => 'required',
            'document_number' => 'required|unique|max:11',
            'password' => 'required',
            
            //address
            'cep' => 'required|max:8',
            'street' => 'required',
            'number' => 'required', 
            'district' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]);
        //user
        $user = new User();
    
        $user->fill($request->all());  
        $birth_date = $request['birth_date'];

        $user->birth_date = Carbon::createFromFormat('d/m/Y', $birth_date)->format('Y/m/d');
        $user->password = md5($user->password);
        $user->save();
        
        //account
        $account = new Account();

        $account->user_id = $user->id;
        $account->fill($request->all());
        $account->password = md5($user->password);
        $account->save();

        //address        
        $address = new Address();      

        $address->user_id = $user->id;
        $address->fill($request->all());
        $address->save();

        return response()->json(['msg' => 'Conta criada com sucesso', 
        'data' => ['users' => $user, 'address' => $address, 'account' => $account]]);

        
        
    }

}
