@extends('layouts.app')

@section('content')

<div>

    {{-- Header --}}
    <div class="mb-10">

        <h1 class="text-4xl font-bold text-slate-800 mb-2">
            Dashboard
        </h1>

        <p class="text-slate-500">
            Monitoring laporan fasilitas kampus
        </p>

    </div>

    {{-- Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Card --}}
        <div class="bg-white p-7 rounded-2xl shadow-sm border border-slate-100">

            <p class="text-slate-500 mb-3">
                Total Laporan
            </p>

            <h2 class="text-4xl font-bold text-blue-600">
                124
            </h2>

        </div>

        {{-- Card --}}
        <div class="bg-white p-7 rounded-2xl shadow-sm border border-slate-100">

            <p class="text-slate-500 mb-3">
                Pending
            </p>

            <h2 class="text-4xl font-bold text-yellow-500">
                12
            </h2>

        </div>

        {{-- Card --}}
        <div class="bg-white p-7 rounded-2xl shadow-sm border border-slate-100">

            <p class="text-slate-500 mb-3">
                Diproses
            </p>

            <h2 class="text-4xl font-bold text-green-500">
                36
            </h2>

        </div>

    </div>

</div>

{{-- Activity Section --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">

    {{-- Recent Reports --}}
    <div class="bg-white rounded-2xl p-7 shadow-sm border border-slate-100">

        <h2 class="text-2xl font-bold text-slate-800 mb-6">
            Laporan Terbaru
        </h2>

        <div class="space-y-4">
            @foreach($laporanTerbaru as $laporan)
            <div class="flex justify-between items-center p-4 bg-slate-50 rounded-xl"> <div>
                <h3 class="font-semibold text-slate-700">
                    {{ $laporan->judul }}
                </h3>
                <p class="text-sm text-slate-500">
                    {{ $laporan->lokasi }}
                </p>
            </div>
            <span class="px-4 py-2 rounded-lg text-sm font-medium @if($laporan->status == 'pending') bg-yellow-100 text-yellow-600
            @elseif($laporan->status == 'diproses') bg-blue-100 text-blue-600
            @elseif($laporan->status == 'selesai') bg-green-100 text-green-600
            @else bg-red-100 text-red-600
            @endif">
                {{ $laporan->status }}
            </span>
        </div>
        @endforeach
    </div>
</div>

    {{-- Quick Info --}}
    <div class="bg-white rounded-2xl p-7 shadow-sm border border-slate-100">

        <h2 class="text-2xl font-bold text-slate-800 mb-6">
            Informasi Sistem
        </h2>

        <div class="space-y-5">

            <div class="flex justify-between">

                <span class="text-slate-500">
                    Total Mahasiswa
                </span>

                <span class="font-bold text-slate-800">
                    1.245
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-slate-500">
                    Fasilitas Aktif
                </span>

                <span class="font-bold text-slate-800">
                    320
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-slate-500">
                    Admin Aktif
                </span>

                <span class="font-bold text-slate-800">
                    5
                </span>

            </div>

        </div>

    </div>

</div>

@endsection