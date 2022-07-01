<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment = new Payment();
        $payment->payer_account = 1;
        $payment->ticket_value = 1000.00;
        $payment->receiver_account = 2;
        $payment->password_payment = Hash::make('12345678');
        $payment->was_paid = 0;
        $payment->save();
    }
}
