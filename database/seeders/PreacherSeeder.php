<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('preachers')->insert([
            [
                'name' => 'Pdt. Dr. Hariman A. Pattianakotta, M.Th.',
                'base' => 'GKP Jemaat Tanah Tinggi',
            ],
            [
                'name' => 'GI. Amanda Cantika, S.Th.',
                'base' => 'GKI Maranatha',
            ],
        ]);
    }
}
