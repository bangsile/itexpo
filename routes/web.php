<?php

use App\Exports\FeedbackExport;
use App\Exports\GuestExport;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScannerController;
use App\Http\Middleware\CheckRole;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::view('daftar-pengunjung', 'daftar-pengunjung')->middleware(['auth'])->name('daftar-pengunjung');
Route::middleware(['auth', 'checkRole:super-admin'])->group(function () {
    Route::get('kelola-admin', [AdminController::class, 'index'])->name('manage-admin');
    Route::get('kelola-admin/tambah', [AdminController::class, 'create'])->name('create-admin');
    Route::post('kelola-admin/tambah', [AdminController::class, 'store'])->name('store-admin');
    Route::get('kelola-admin/{username}/edit', [AdminController::class, 'edit'])->name('edit-admin');
    Route::put('kelola-admin/{username}/edit', [AdminController::class, 'update'])->name('update-admin');
    Route::put('kelola-admin/{username}/reset-password', [AdminController::class, 'resetPassword'])->name('reset-password');

    Route::get('/export-guest', function () {
        return Excel::download(new GuestExport, 'daftar-pengunjung-it-expo.xlsx');
    })->name('guests.export');
});


Route::post('cek-pengunjung', [ScannerController::class, 'cekPengunjung'])->middleware(['auth', 'checkRole:admin'])->name('cek-pengunjung');
Route::post('update-lencana', [ScannerController::class, 'updateBadge'])->middleware(['auth', 'checkRole:admin'])->name('update-badge');
Route::view('/daftar-feedback', 'daftar-feedback')->middleware(['auth'])->name('daftar-feedback');

Route::view('/registrasi-pengunjung', 'registrasi-pengunjung')->name('registrasi-pengunjung');
Route::view('/feedback', 'feedback')->name('feedback');

Route::get('/export-feedback/{stand}', function ($stand) {
    return Excel::download(new FeedbackExport($stand), $stand == 'all' ? 'feedback-stand-itexpo.xlsx' : "feedback-stand-{$stand}-itexpo.xlsx");
})->middleware('auth')->name('feedback.export');

require __DIR__ . '/auth.php';

Route::fallback(function () {
    return redirect(route('dashboard'));
});
