<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::match(['get', 'post'], '/setting/umum', [SettingController::class, 'umum'])->name('setting.umum');
    Route::post('/setting/store', [SettingController::class, 'store'])->name('setting.store');

    Route::match(['get', 'post'], '/setting/jenjang', [SettingController::class, 'jenjang'])->name('setting.jenjang');
});

require __DIR__ . '/auth.php';
