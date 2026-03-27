<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('announcements')->insert([
            [
                'category' => 'Bidang Diakonia',
                'title' => 'Persembahan kasih untuk korban bencana alam',
                'content' => 'Saudara-saudari yang terkasih, mari kita bersatu
                    dalam doa dan dukungan untuk mereka yang terdampak bencana alam.
                    Kami mengajak Anda untuk memberikan persembahan kasih sebagai
                    bentuk solidaritas dan bantuan kepada mereka yang membutuhkan.
                    Setiap sumbangan, besar atau kecil, akan sangat berarti bagi
                    mereka yang sedang mengalami kesulitan. Mari kita tunjukkan
                    kasih Kristus melalui tindakan nyata dan memberikan harapan
                    kepada mereka yang sedang berjuang.',
                'image_url' => null,
                'date_start' => '2026-03-01',
                'date_end' => '2026-03-10',
                'created_at' => now(),
                'updated_at' => now(),
                'users_id' => 1,
            ],
        ]);
    }
}
