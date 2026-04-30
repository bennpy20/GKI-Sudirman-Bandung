<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SundayServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sunday_services')->insert([
            [
                'members_id' => 1,
                'worships_id' => 1,
                'stewards_id' => 1,
            ],
            [
                'members_id' => 2,
                'worships_id' => 1,
                'stewards_id' => 2,
            ],
        ]);
    }
}
