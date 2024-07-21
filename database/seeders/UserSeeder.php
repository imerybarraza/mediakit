<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Usuario Uno',
                'lastname' => 'apellido1',
                'password' => Hash::make('password1'),
                'email' => 'usuario1@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuario Dos',
                'lastname' => 'apellido2',
                'password' => Hash::make('password2'),
                'email' => 'usuario2@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
