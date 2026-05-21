<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/dashboard', function () {
    return 'Dashboard';
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->group(function ()
 {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
 });

 Route::middleware(['auth', 'role:mahasiswa'])->group(function ()
 {
    Route::get('/laporan', function () {
        return ('Halaman Mahasiswa');
    });
 });



require __DIR__.'/auth.php';
