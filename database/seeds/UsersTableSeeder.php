<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Sheraz Ahmed',
                'email' => 'sherazahmed93@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$alBUyk59jtw1ouy7yNiLUOMbLmCcgEru4EtA91EoVmK278JgI/gPe',
                'remember_token' => NULL,
                'created_at' => '2019-07-15 06:44:40',
                'updated_at' => '2019-07-15 06:44:40',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Muhammad Salman',
                'email' => 'mosalah@gmail.com',
                'email_verified_at' => NULL,
                'password' => Hash::make("asdf1234"),
                'remember_token' => NULL,
                'created_at' => '2019-07-15 06:44:40',
                'updated_at' => '2019-07-15 06:44:40',
            ),
        ));

        User::create([
            'name'=>'Taimoor',
            'email'=>'taimoor@gmail.com',
            'password' => Hash::make("asdf1234")
        ]);


    }
}
