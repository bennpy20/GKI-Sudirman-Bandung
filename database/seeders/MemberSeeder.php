<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'name' => 'Budi',
                'address' => 'Jl. Merdeka No. 1',
                'gender' => 1,
                'status' => 1,
                'phone_number' => '08123456789',
                'birth_date' => '2000-01-01',
                'join_date' => '2022-01-01',
                'membership' => 1,
                'is_active' => 1,
                'is_region_leader' => 0,
                'users_id' => 1,
                'regions_id' => 1,
                'commissions_id' => 1,
            ],
            [
                'name' => 'Andi',
                'address' => 'Jl. Surya Sumantri No. 10',
                'gender' => 1,
                'status' => 2,
                'phone_number' => '08987654321',
                'birth_date' => '1998-05-10',
                'join_date' => '2021-06-01',
                'membership' => 1,
                'is_active' => 1,
                'is_region_leader' => 1,
                'users_id' => 1,
                'regions_id' => 2,
                'commissions_id' => 2,
            ],
        ]);
    }
}
