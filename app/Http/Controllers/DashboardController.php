<?php

namespace App\Http\Controllers;

use App\Models\Laporan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'total' => Laporan::count(),
            'pending' => Laporan::where('status', 'pending')->count(),
            'diproses' => Laporan::where('status', 'diproses')->count(),
            'selesai' => Laporan::where('status', 'selesai')->count(),
            'ditolak' => Laporan::where('status', 'ditolak')->count(),

            'laporanTerbaru' => Laporan::latest()->take(5)->get(),
        ]);
    }
}