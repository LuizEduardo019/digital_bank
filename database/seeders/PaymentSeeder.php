<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Payment;



class Payments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $payment = Payment::create([
            'payer_account' => 1,
            'ticket_value' => 1000.00,
            'receiver_account' => rand(1000, 999999),
            'password_payment' => Hash::make('12345678'),
            'was_paid' => 0
        ]);
    }
}
