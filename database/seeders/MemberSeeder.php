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
                'name' => 'Budi Gunawan',
                'address' => 'Jl. Merdeka No. 1',
                'gender' => 1,
                'status' => 1,
                'phone_number' => '08123456789',
                'birth_date' => '2000-01-01',
                'join_date' => '2022-01-01',
                'membership' => 2,
                'is_active' => 1,
                'is_region_leader' => 0,
                'users_id' => 1,
                'regions_id' => 1,
                'commissions_id' => null,
            ],
            [
                'name' => 'Andi Putra Sutrisno',
                'address' => 'Jl. Surya Sumantri No. 10',
                'gender' => 1,
                'status' => 2,
                'phone_number' => '08987654321',
                'birth_date' => '1998-05-10',
                'join_date' => '2021-06-01',
                'membership' => 2,
                'is_active' => 1,
                'is_region_leader' => 1,
                'users_id' => 1,
                'regions_id' => 2,
                'commissions_id' => 2,
            ],
            [
                'name' => 'Yuni Anita Permata',
                'address' => 'Jl. Asia Afrika No. 5',
                'gender' => 2,
                'status' => 3,
                'phone_number' => '08123456789',
                'birth_date' => '2000-01-01',
                'join_date' => '2022-01-01',
                'membership' => 2,
                'is_active' => 1,
                'is_region_leader' => 0,
                'users_id' => 1,
                'regions_id' => 1,
                'commissions_id' => 1,
            ],
            [
                'name' => 'Raymond Suryawan',
                'address' => 'Jl. Pagarsih No. 8',
                'gender' => 1,
                'status' => 4,
                'phone_number' => '08123456789',
                'birth_date' => '1989-05-17',
                'join_date' => '2018-03-29',
                'membership' => 2,
                'is_active' => 1,
                'is_region_leader' => 0,
                'users_id' => 1,
                'regions_id' => 2,
                'commissions_id' => 1,
            ],
            [
                'name' => 'Debby Lestari Wijaya',
                'address' => 'Jl. Braga No. 20',
                'gender' => 2,
                'status' => 5,
                'phone_number' => '083344556677',
                'birth_date' => '1995-12-11',
                'join_date' => '2016-08-10',
                'membership' => 2,
                'is_active' => 1,
                'is_region_leader' => 0,
                'users_id' => 1,
                'regions_id' => 2,
                'commissions_id' => 2,
            ],
            [
                'name' => 'Yudha Arkavandya',
                'address' => 'Jl. Cihampelas No. 12',
                'gender' => 1,
                'status' => 6,
                'phone_number' => '082112223333',
                'birth_date' => '1991-09-21',
                'join_date' => '2013-02-15',
                'membership' => 2,
                'is_active' => 1,
                'is_region_leader' => 0,
                'users_id' => 1,
                'regions_id' => 1,
                'commissions_id' => 1,
            ],
        ]);
    }
}
