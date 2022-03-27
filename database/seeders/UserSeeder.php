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
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Manajer',
            'username' => 'manajer',
            'email' => 'manajer@gmail.com',
            'password' => Hash::make('manajer'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'Kasir',
            'username' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir'),
            'role_id' => 3,
        ]);
    }
}
