<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LiturgicalCalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('liturgical_calendars')->insert([
            [
                'name' => 'Minggu Prapaskah I',
                'color' => 'Ungu',
            ],
            [
                'name' => 'Minggu Prapaskah II',
                'color' => 'Ungu',
            ],
            [
                'name' => 'Minggu Advent I',
                'color' => 'Ungu',
            ],
        ]);
    }
}
