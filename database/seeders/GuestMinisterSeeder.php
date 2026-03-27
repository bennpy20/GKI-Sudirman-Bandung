<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestMinisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guest_ministers')->insert([
            [
                'name' => 'Paduan Suara GKI Cibunut',
                'role' => 'Paduan Suara',
            ],
            [
                'name' => 'Angklung GKI Kebon Jati',
                'role' => 'Persembahan Pujian',
            ],
        ]);
    }
}
