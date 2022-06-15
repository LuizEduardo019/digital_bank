<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = new Bank();
        $bank->name = 'xtagi';
        $bank->bank_number = '1';
        $bank->save();
    }
}
