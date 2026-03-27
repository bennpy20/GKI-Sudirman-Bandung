<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->insert([
            [
                'name' => 'Matius',
                'description' => 'Mencakup wilayah Bandung Timur dan Selatan'
            ],
            [
                'name' => 'Markus',
                'description' => 'Mencakup wilayah Bandung Utara dan Barat'
            ],
        ]);
    }
}
