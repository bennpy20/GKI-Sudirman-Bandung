<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('member_services')->insert([
            [
                'members_id' => 1,
                'stewards_id' => 1,
            ],
            [
                'members_id' => 2,
                'stewards_id' => 1,
            ],
            [
                'members_id' => 3,
                'stewards_id' => 2,
            ],
        ]);
    }
}
