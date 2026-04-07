<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('worships')->insert([
            [
                'title' => 'Ibadah Minggu',
                'bible_verse' => 'Mazmur 23',
                'video_url' => 'https://youtube.com/example1',
                'category' => 1,
                'date' => '2026-03-01',
                'time' => '08:00:00',
                'liturgical_calendars_id' => 1,
                'guest_ministers_id' => 1,
            ],
            [
                'title' => 'Ibadah Pemuda',
                'bible_verse' => 'Yeremia 29:11; Filipi 4:13',
                'video_url' => null,
                'category' => 2,
                'date' => '2026-03-08',
                'time' => '19:00:00',
                'liturgical_calendars_id' => 1,
                'guest_ministers_id' => 2,
            ],
        ]);
    }
}
