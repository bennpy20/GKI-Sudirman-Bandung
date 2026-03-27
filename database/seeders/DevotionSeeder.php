<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('devotions')->insert([
            [
                'title' => 'Renungan Pagi',
                'content' => 'Isi renungan...',
                'bible_verse' => 'Mazmur 1:1',
                'author' => 'Admin',
                'category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'users_id' => 1,
            ],
        ]);
    }
}
