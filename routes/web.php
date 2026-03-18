<?php

use App\Http\Controllers\ArticleTeologisController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DevotionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\WartaController;
use App\Http\Controllers\WartaJemaatController;
use App\Http\Controllers\WartaKebaktianController;
use App\Http\Controllers\WartaKegiatanController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('home.index');
});

Route::resource('home', HomeController::class);

Route::resource('warta_kebaktian', WartaKebaktianController::class);
Route::resource('warta_jemaat', WartaJemaatController::class);
Route::resource('warta_kegiatan', WartaKegiatanController::class);
Route::get('/warta/{category}', [WartaController::class, 'index'])->name('warta.kategori');
Route::resource('renungan_harian', DevotionController::class);
Route::resource('artikel_teologis', ArticleTeologisController::class);
Route::resource('hubungi_kami', ContactUsController::class);
Route::resource('visi_misi', VisiMisiController::class);