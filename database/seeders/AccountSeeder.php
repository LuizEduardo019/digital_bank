<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = new Account();

        $account->user_id = '1';
        $account->agency_id = '1';
        $account->account_number = rand(1000, 99999);
        $account->balance = '1000';
        $account->password = '12345678';
      
        
        $account->save();
    }
}
