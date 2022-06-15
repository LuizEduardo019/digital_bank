<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User ();

        $user->name = 'Luiz Eduardo';
        $user->birth_date = '2001/10/06';
        $user->email = 'luiz@teste.com';
        $user->telephone = '(19)98197-3462';
        $user->gender = 'M';
        $user->document_type = 'CPF';
        $user->document_number = '39376715870';
        $user->password = '12345678';
        $user->save();

        $user->address()->create([
            'cep' => '13082613',
            'street' => 'Rua Antonio Guilherme R. Ribas',
            'number' => '52',
            'complement' => 'casa',
            'district' => 'jardim são marcos',
            'city' => 'campinas',
            'state' => 'são paulo',
        ]);

        $user = new User ();

        $user->name = 'Igor';
        $user->birth_date = '2005/08/03';
        $user->email = 'igor@gmail.com';
        $user->telephone = '(19)9999-0000';
        $user->gender = 'N';
        $user->document_type = 'CPF';
        $user->document_number = '00000000000';
        $user->password = '12345678';
        $user->save();

        $user->address()->create([
            'cep' => '13000000',
            'street' => 'Rua Jacy',
            'number' => '319',
            'complement' => 'casa',
            'district' => 'jardim ouro verde',
            'city' => 'campinas',
            'state' => 'são paulo',
        ]);
    }
}
