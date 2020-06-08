<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Criando usuário padrão
        User::create([
            'name' => 'Rodrigo Gomes',
            'email' => 'rodrigogomessims@gmail.com',

            //bcrypt é usado para criptografar//
            'password' => bcrypt('123123')
        ]);
    }
}
