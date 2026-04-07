<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StewardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stewards')->insert([
            [
                'field' => 'Liturgos (WL)',
                'commissions_id' => 1,
            ],
            [
                'field' => 'Pemusik',
                'commissions_id' => 1,
            ],
            [
                'field' => 'Usher',
                'commissions_id' => 1,
            ],
        ]);
    }
}
