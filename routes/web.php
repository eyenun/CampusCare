<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/laporan', function() {
        return view('admin.laporan.index', [
            'laporans' => \App\Models\Laporan::Latest()->get()
        ]);
    });

    Route::get('/admin/laporan/{id}', function($id) {
        return view('admin.laporan.show', [
            'laporan' => \App\Models\Laporan::findOrFail($id)
        ]);
    });

    Route::put('/admin/laporan/{id}/status', function($id) {
        $laporan = \App\Models\Laporan::findOrFail($id);
        $laporan->status = request('status');
        $laporan->save();

        return back()->with('success', 'Status updated');
    });
 });


 
Route::middleware(['auth', 'role:mahasiswa'])->group(function ()
{
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

    Route::get('/laporan/create', [LaporanController::class, 'create']) ->name('laporan.create');

    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');

    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

    Route::get('laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');

    Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');

    Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');

    Route::post('/laporan/{id}/komentar', [KomentarController::class, 'store'])
    ->name('laporan.komentar.store');
});



 Route::get('/profile', function () {
    return 'Profile Page';
})->name('profile.edit');



require __DIR__.'/auth.php';
