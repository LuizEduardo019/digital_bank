<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;


class UserApiController extends Controller
{

    public function __construct(User $user, Request $request, Hash $hash)
    {
        $this->user = $user;
        $this->request = $request;
        $this->hash = $hash;
    }

    public function index()
    {
        $users = $this->user->all();

        return response()->json($users, 200);
    }

    public function store(Request $request)
    {
        $user = new User;

        $user->fill($request->all());  
        $birth_date = $request['birth_date'];

        $user->birth_date = Carbon::createFromFormat('d/m/Y', $birth_date)->format('Y/m/d');
        $user->password = $this->hash::make($user->password);
    
        $user->save();

        return response()->json(['msg' => 'criado com sucesso!']);
    }

}
