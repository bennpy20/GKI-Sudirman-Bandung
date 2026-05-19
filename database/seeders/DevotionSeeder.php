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
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'bible_verse' => 'Mazmur 1:1',
                'author' => 'Admin',
                'date' => '2026-04-01',
                'category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'users_id' => 1,
            ],
            [
                'title' => 'Tuhanlah Gembala yang Baik',
                'content' => 'Seekor domba tidak pernah mencemaskan hari esok. Ia tidak bingung mencari makan atau takut tersesat. Mengapa? Karena ia tahu ada gembala yang berjalan di depannya. Dalam hidup, kita sering kali merasa cemas akan masa depan, pekerjaan, keluarga, atau kesehatan. Melalui ayat ini, kita diingatkan akan tiga janji Tuhan sebagai Gembala yang Baik: Ia Mencukupkan: Tuhan tahu persis kebutuhan Anda, bukan sekadar keinginan Anda. Ia Menenangkan: Ia menuntun Anda ke air yang tenang untuk memulihkan jiwa yang lelah. Ia Melindungi: Di lembah paling gelap sekalipun, gada dan tongkat-Nya menjaga Anda tetap aman. Aplikasi Hidup Menjadikan Tuhan sebagai gembala berarti kita siap menjadi domba yang taat. Berhentilah mencoba mengendalikan segala hal sendirian. Serahkan kekhawatiran Anda hari ini, dan izinkan suara-Nya menuntun setiap keputusan Anda. Bersama Sang Gembala, Anda tidak akan pernah kekurangan apa yang baik. Doa "Tuhan, terima kasih karena Engkau adalah Gembala yang Baik dalam hidupku. Aku menyerahkan seluruh kekhawatiranku ke dalam tangan-Mu. Tuntunlah langkahku hari ini agar aku selalu berjalan di jalan-Mu yang benar. Amin."',
                'bible_verse' => 'Mazmur 23',
                'author' => 'Pdt. Yosafat Aji',
                'date' => '2026-05-17',
                'category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'users_id' => 1,
            ],
            [
                'title' => 'Alkitab Firman yang Diilhamkan',
                'content' => 'Alkitab berasal dari Allah. Firman Tuhan bukan hanya hasil pemikiran manusia, tetapi diilhamkan oleh Roh Allah sehingga mengandung kebenaran yang sempurna. Karena itu, Alkitab memiliki kuasa untuk membimbing kehidupan setiap orang percaya.

Firman Tuhan berguna untuk mengajar kita mengenal kehendak-Nya, menegur ketika kita salah jalan, memperbaiki hidup yang menyimpang, dan mendidik kita agar hidup benar di hadapan Tuhan. Saat kita membaca dan merenungkan Alkitab, Tuhan sedang membentuk karakter dan iman kita menjadi semakin dewasa.

Di tengah dunia yang penuh dengan berbagai suara dan pandangan, Alkitab tetap menjadi pedoman hidup yang teguh dan tidak berubah. Karena itu, marilah kita memiliki kerinduan untuk membaca, memahami, dan melakukan firman Tuhan setiap hari, sehingga hidup kita berkenan kepada-Nya.

Doa Singkat:
Tuhan, terima kasih untuk firman-Mu yang diilhamkan dan penuh kebenaran. Ajarku untuk setia membaca, memahami, dan melakukan firman-Mu dalam kehidupanku setiap hari. Amin.',
                'bible_verse' => '2 Timotius 3:16-17',
                'author' => 'Pdt. Yohanes Bambang M.',
                'date' => '2026-05-17',
                'category' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'users_id' => 1,
            ],
        ]);
    }
}
