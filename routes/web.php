<?php

use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\CoachController as AdminCoachController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CompetitionController as AdminCompetitionController;
use App\Http\Controllers\Admin\FinanceController as AdminFinanceController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\Admin\OrganizationController as AdminOrganizationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PresenceController as AdminPresenceController;
use App\Http\Controllers\Member\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namesapace' => 'home'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/anggota', [HomeController::class, 'anggota']);
    Route::get('/artikel', [HomeController::class, 'artikel']);
    Route::get('/detail/{article}', [HomeController::class, 'show']);
    Route::get('/kompetisi', [HomeController::class, 'kompetisi']);
});
Route::get('/login', fn () => redirect()->route('login'));

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('admin/pelatih', AdminCoachController::class, ['as' => 'admin'])->except('show', 'update');
        Route::resource('admin/artikel', AdminArticleController::class, ['as' => 'admin'])->except('show');
        Route::resource('admin/prestasi', AdminAchievementController::class, ['as' => 'admin'])->except('show', 'update');
        Route::resource('admin/kompetisi', AdminCompetitionController::class, ['as' => 'admin'])->except('show', 'update');
        Route::resource('admin/keuangan', AdminFinanceController::class, ['as' => 'admin'])->except('show', 'update');
        Route::resource('admin/organisasi', AdminOrganizationController::class, ['as' => 'admin'])->only('update', 'edit', 'index');
        Route::resource('admin/absensi', AdminPresenceController::class, ['as' => 'admin']);
        Route::get('admin/anggota/terima{id}', [AdminMemberController::class, 'memberAccept'])->name('admin.anggota.accept');
        Route::resource('admin/anggota', AdminMemberController::class, ['as' => 'admin']);
    });

    Route::middleware(['role:member'])->group(function () {
        Route::get('anggota/data-diri', [MemberController::class, 'personalData'])->name('anggota.personalData');
        Route::post('anggota/daftar', [MemberController::class, 'registerStore'])->name('anggota.registerStore');
        Route::get('anggota/daftar', [MemberController::class, 'register'])->name('anggota.register');
        Route::resource('anggota/anggota', MemberController::class, ['as' => 'anggota']);
    });
});

require __DIR__ . '/auth.php';
