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

    public function __construct(User $user, Address $address, Request $request)
    {
        $this->user = $user;
        $this->address = $address;
        $this->request = $request;
        
    }

    public function index()
    {
        $users = $this->user->all();

        return response()->json($users, 200);
    }

    public function store(Request $request)
    {        
        //validation
        $request->validate($this->user->rulesUser(), $this->user->feedbackUser(),
            $this->address->rulesAddress(), $this->address->feedbackAddress()
        );

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
