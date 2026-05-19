<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('commissions')->insert([
            // [
            //     'name' => 'Kebaktian Umum',
            //     'day' => 'Minggu',
            //     'time_start' => '09:00:00',
            //     'time_end' => '10:30:00',
            //     'room' => 'Ruang Kebaktian'
            // ],
            [
                'name' => 'Tunas Remaja',
                'day' => 'Sabtu',
                'time_start' => '16:00:00',
                'time_end' => '17:30:00',
                'room' => 'Ruang Betsaida'
            ],
            [
                'name' => 'Youth',
                'day' => 'Sabtu',
                'time_start' => '18:00:00',
                'time_end' => '20:00:00',
                'room' => 'Ruang Bethesda'
            ],
            [
                'name' => 'Sekolah Minggu',
                'day' => 'Minggu',
                'time_start' => '09:00:00',
                'time_end' => '10:30:00',
                'room' => 'Gedung Anak'
            ],
            [
                'name' => 'Usia Indah',
                'day' => 'Minggu',
                'time_start' => '09:00:00',
                'time_end' => '10:30:00',
                'room' => 'Gedung Anak'
            ]
        ]);
    }
}
