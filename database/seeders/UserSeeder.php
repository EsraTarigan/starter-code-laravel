<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        User::factory(10)->create();

        //apabila kita menggunakan statik kitabisa tambahakan user dengan manual di page ini misal
        //membuat user seeder
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'super@gmail.com',
            'email_verified_at' => now(),
            'bio' =>'Aku adalah Superadmin',
            'phone' => '082275942259',
            'role' => 'superadmin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'bio' =>'Aku adalah Admin',
            'phone' => '082275942250',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);
    }
}
