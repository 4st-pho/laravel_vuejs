<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'role_id' => '1',
            'password' => Hash::make('123123')
        ]);
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => '2',
            'password' => Hash::make('123123')
        ]);
    }
}
