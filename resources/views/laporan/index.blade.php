@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Riwayat Pengaduan</h2>
            <p class="text-sm text-gray-500">Pantau perkembangan status perbaikan fasilitas yang telah dilaporkan.</p>
        </div>
        @if(auth()->user()->role === 'mahasiswa')
        <a href="{{ route('laporan.create') }}" class="inline-flex items-center bg-blue-600 text-white px-4 py-2.5 rounded-lg text-sm font-semibold hover:bg-blue-700 shadow-sm transition">
            + Buat Pengaduan
        </a>
        @endif
    </div>

    <!-- Filter & Search UI -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
        <form action="{{ route('laporan.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-3">
            <!-- Search -->
            <div class="md:col-span-2 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul laporan atau lokasi..." 
                    class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none">
                <span class="absolute left-3 top-2.5 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
            </div>
            <!-- Filter Status -->
            <div>
                <select name="status" class="w-full border border-gray-300 rounded-lg p-2 text-sm bg-white focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">Semua Status</option>
                    <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>⌛ Pending</option>
                    <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>🔵 Diproses</option>
                    <option value="Dikerjakan" {{ request('status') == 'Dikerjakan' ? 'selected' : '' }}>⚙️ Dikerjakan</option>
                    <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>✅ Selesai</option>
                    <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
                </select>
            </div>
            <!-- Tombol Filter -->
            <button type="submit" class="bg-gray-800 text-white p-2 rounded-lg text-sm font-medium hover:bg-gray-900 transition">
                Terapkan Filter
            </button>
        </form>
    </div>

    <!-- Table / List Laporan -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                    <th class="p-4">Laporan</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">Lokasi</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                @forelse($laporans as $laporan)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">
                        <div class="font-semibold text-gray-800">{{ $laporan->judul }}</div>
                        <div class="text-xs text-gray-400 mt-0.5">Dilaporkan pada {{ $laporan->created_at->format('d M Y') }}</div>
                    </td>
                    <td class="p-4">
                        <span class="bg-gray-100 text-gray-700 px-2.5 py-1 rounded-md text-xs font-medium">
                            {{ $laporan->kategori->nama_kategori }}
                        </span>
                    </td>
                    <td class="p-4 text-gray-500">{{ $laporan->lokasi }}</td>
                    <td class="p-4">
                        <!-- Badge Status Manual tanpa Komponen -->
                        <span class="px-2.5 py-1 text-xs font-semibold border rounded-full 
                            {{ $laporan->status === 'Pending' ? 'bg-amber-100 text-amber-800 border-amber-300' : '' }}
                            {{ $laporan->status === 'Diproses' ? 'bg-blue-100 text-blue-800 border-blue-300' : '' }}
                            {{ $laporan->status === 'Dikerjakan' ? 'bg-purple-100 text-purple-800 border-purple-300' : '' }}
                            {{ $laporan->status === 'Selesai' ? 'bg-green-100 text-green-800 border-green-300' : '' }}
                            {{ $laporan->status === 'Ditolak' ? 'bg-red-100 text-red-800 border-red-300' : '' }}">
                            {{ $laporan->status }}
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <a href="{{ route('laporan.show', $laporan->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-xs bg-blue-50 px-3 py-1.5 rounded-md transition">
                            Lihat Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-400">
                        Tidak ada riwayat pengaduan yang ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection