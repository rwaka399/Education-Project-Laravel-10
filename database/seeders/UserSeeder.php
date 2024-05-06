<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'John Doe',
            'email'     => 'john@example.com',
            'password'  => bcrypt('1234'),

        ]);
        User::create([
            'name'      => 'John Dy',
            'email'     => 'johndy@example.com',
            'password'  => bcrypt('1234'),
        ]);
    }
}
