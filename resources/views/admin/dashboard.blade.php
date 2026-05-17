@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard Admin
        </h1>
        <p class="text-gray-500">
            Ringkasan laporan kerusakan fasilitas kampus.
        </p>
    </div>

    <!-- Card Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="card">
            <h3 class="text-sm text-gray-500">Total Laporan</h3>
            <p class="text-3xl font-bold text-blue-600">124</p>
        </div>

        <div class="card">
            <h3 class="text-sm text-gray-500">Pending</h3>
            <p class="text-3xl font-bold text-yellow-500">12</p>
        </div>

        <div class="card">
            <h3 class="text-sm text-gray-500">Diproses</h3>
            <p class="text-3xl font-bold text-orange-500">8</p>
        </div>

        <div class="card">
            <h3 class="text-sm text-gray-500">Selesai</h3>
            <p class="text-3xl font-bold text-green-500">104</p>
        </div>
    </div>
</div>
@endsection