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
                'commissions_id' => null,
            ],
            [
                'field' => 'Pemusik',
                'commissions_id' => null,
            ],
            [
                'field' => 'Usher',
                'commissions_id' => null,
            ],
            [
                'field' => 'Pemimpin Pujian',
                'commissions_id' => 1,
            ],
            [
                'field' => 'Guru Kelas Balita',
                'commissions_id' => 2,
            ]
        ]);
    }
}
