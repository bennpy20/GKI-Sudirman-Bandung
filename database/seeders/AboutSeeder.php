<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            [
                'name' => 'Visi',
                'description' => 'Menjadi gereja yang mencerminkan kasih Kristus
                    dan memberdayakan jemaat untuk melayani dengan penuh semangat.',
                'users_id' => 1,
            ],
            [
                'name' => 'Misi',
                'description' => '1. Membangun komunitas yang inklusif dan penuh kasih di dalam gereja.
                    2. Memberikan pelayanan yang relevan dan berdampak bagi masyarakat sekitar.
                    3. Mengembangkan program pengajaran Alkitab yang mendalam untuk pertumbuhan rohani jemaat.',
                'users_id' => 1,
            ],
        ]);
    }
}
