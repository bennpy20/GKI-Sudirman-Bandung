<?php

use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\AdminCommissionController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDevotionController;
use App\Http\Controllers\AdminLiturgicalCalendarController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\AdminPreacherController;
use App\Http\Controllers\AdminRegionController;
use App\Http\Controllers\AdminStewardController;
use App\Http\Controllers\AdminWorshipController;
use App\Http\Controllers\ArticleTeologisController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('dashboard', AdminDashboardController::class);
    Route::resource('member', AdminMemberController::class);
    Route::resource('commission', AdminCommissionController::class);
    Route::resource('region', AdminRegionController::class);
    Route::resource('steward', AdminStewardController::class);
    Route::resource('worship', AdminWorshipController::class);
    Route::resource('liturgical_calendar', AdminLiturgicalCalendarController::class);
    Route::resource('announcement', AdminAnnouncementController::class);
    Route::resource('devotion', AdminDevotionController::class);
    Route::resource('preacher', AdminPreacherController::class);
    Route::resource('about', AdminAboutController::class);
});

require __DIR__.'/auth.php';