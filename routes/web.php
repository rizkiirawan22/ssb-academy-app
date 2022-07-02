<?php

use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\CoachController as AdminCoachController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
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

Route::get('/', fn () => view('frontend.home'));
Route::get('/login', fn () => redirect()->route('login'));

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('admin/pelatih', AdminCoachController::class, ['as' => 'admin'])->except('show', 'update');
        Route::resource('admin/artikel', AdminArticleController::class, ['as' => 'admin'])->except('show', 'update');
        Route::resource('admin/prestasi', AdminAchievementController::class, ['as' => 'admin'])->except('show', 'update');
    });
});

require __DIR__ . '/auth.php';
