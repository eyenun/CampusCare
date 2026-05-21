<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});



Route::get('/dashboard', function () {
    if(auth()->user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }
    return redirect('/laporan');

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
        return view('laporan.index');
    });
 });



 Route::get('/profile', function () {
    return 'Profile Page';
})->name('profile.edit');



require __DIR__.'/auth.php';
