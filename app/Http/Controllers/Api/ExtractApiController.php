<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Request\ExtractRequest;
use App\Models\Extract;
use App\Models\Account;
use App\Models\Payment;
use App\Models\Transfer;

class ExtractApiController extends Controller
{

    public function index()
    {
        $transfers = Transfer::all();
        $transfers = Transfer::auth();
        $payments = Payment::all();
        $payments = Payment::auth();

        return response()->json([
            'Essas são suas transferencias' => $transfers,
            'Esses são seus pagamentos' => $payments
        ]);
    }
}
