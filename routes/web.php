<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('lencana', 'badge')
    ->middleware(['auth', 'verified'])
    ->name('badge');

Route::view('my-qrcode', 'myqrcode')
    ->middleware(['auth', 'verified'])
    ->name('myqrcode');

Route::view('kelola-lencana', 'manage-badge')
    ->middleware(['auth', 'verified'])
    ->name('manage-badge');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('test', 'testing');

require __DIR__.'/auth.php';
