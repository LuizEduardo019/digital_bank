<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankApiController extends Controller
{

    public function __construct(Bank $bank, Request $request)
    {
        $this->bank = $bank;
        $this->request = $request;
    }

    public function index()
    {
        $bank = $this->bank->all();

        return response()->json($bank);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
