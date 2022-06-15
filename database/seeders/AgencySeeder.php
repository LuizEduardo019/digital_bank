<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agency;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agency = new Agency();
        $agency->bank_id = '1';
        $agency->agency_number = rand(1000, 9999);
        $agency->save();
    }
}
