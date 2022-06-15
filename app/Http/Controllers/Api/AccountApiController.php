<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

class AccountApiController extends Controller
{
    public function __construct(Account $account, Request $request)
    {
        $this->account = $account;
        $this->request = $request;
    }
    
    public function index ()
    {
        $account = $this->account->all();
        
        return response()->json($account);
    }
}
