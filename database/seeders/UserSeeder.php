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
        User::create([
            'name' => 'Administrador',
            'phone' => '8555555555',
            'email' => 'ejnoleto@gmail.com',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'password' => bcrypt('1234567890'),
        ]);

        User::create([
            'name' => 'Maria do Carmo',
            'phone' => '851234567',
            'email' => 'mariadocarmo@gmail.com',
            'profile' => 'EMPLOYEE',
            'status' => 'ACTIVE',
            'password' => bcrypt('1234567890'),
        ]);
    }
}
