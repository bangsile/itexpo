<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScannerController;
use App\Http\Middleware\CheckRole;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

Route::view('lencana', 'badge')
    ->middleware(['auth', 'checkRole:pengunjung'])
    ->name('badge');

Route::view('my-qrcode', 'myqrcode')
    ->middleware(['auth'])
    ->name('myqrcode');

Route::view('kelola-pengunjung', 'manage-guest')
    ->middleware(['auth', 'checkRole:super-admin'])
    ->name('manage-guest');

Route::view('kelola-lencana', 'manage-badge')
    ->middleware(['auth', 'checkRole:admin'])
    ->name('manage-badge');

Route::view('update-lencana', 'give-badge')
    ->middleware(['auth', 'checkRole:admin'])
    ->name('give-badge');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('guest/{username}/edit', function ($username) {
    $guest = User::where('email', $username)->first();
    if (!$guest) {
        abort(404);
    }
    return view('edit-guest', ['guest' => $guest]);
})->middleware(['auth', 'checkRole:super-admin'])->name('edit-guest');

Route::middleware(['auth', 'checkRole:super-admin'])->group(function () {
    Route::get('kelola-admin', [AdminController::class, 'index'])->name('manage-admin');
    Route::get('kelola-admin/tambah', [AdminController::class, 'create'])->name('create-admin');
    Route::post('kelola-admin/tambah', [AdminController::class, 'store'])->name('store-admin');
    Route::get('kelola-admin/{username}/edit', [AdminController::class, 'edit'])->name('edit-admin');
    Route::put('kelola-admin/{username}/edit', [AdminController::class, 'update'])->name('update-admin');
    Route::put('kelola-admin/{username}/reset-password', [AdminController::class, 'resetPassword'])->name('reset-password');
});


Route::post('cek-pengunjung', [ScannerController::class, 'cekPengunjung'])->middleware(['auth', 'checkRole:admin'])->name('cek-pengunjung');
Route::post('update-lencana', [ScannerController::class, 'updateBadge'])->middleware(['auth', 'checkRole:admin'])->name('update-badge');



require __DIR__ . '/auth.php';
