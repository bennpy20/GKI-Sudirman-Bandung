<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Super Admin',
                'role' => 1
            ],
            [
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('password'),
                'name' => 'Regular Admin',
                'role' => 2
            ],
        ]);
    }
}
