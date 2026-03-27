<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            RegionSeeder::class,
            CommissionSeeder::class,
            GuestMinisterSeeder::class,
            LiturgicalCalendarSeeder::class,
            StewardSeeder::class,

            MemberSeeder::class,   
            WorshipSeeder::class,

            MemberServiceSeeder::class,
            SundayServiceSeeder::class,
            AnnouncementSeeder::class,
            DevotionSeeder::class,
            AboutSeeder::class
        ]);
    }
}
