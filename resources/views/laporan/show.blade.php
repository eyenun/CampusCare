@extends('layouts.app')

@section('content')

<a href="/laporan"
   class="inline-block mb-4 text-blue-600 hover:underline">
    ← Kembali ke daftar laporan
</a>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif


<div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- Sisi Kiri: Detail Laporan -->
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-4">
            <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                <div>
                    <span class="text-xs font-semibold text-gray-400 uppercase">ID Laporan #{{ $laporan->id }}</span>
                    <h2 class="text-xl font-bold text-gray-800 mt-1">{{ $laporan->judul }}</h2>
                </div>
                <!-- Badge Status Manual tanpa Komponen -->
                <span class="px-2.5 py-1 text-xs font-semibold border rounded-full 
                    {{ $laporan->status === 'Pending' ? 'bg-amber-100 text-amber-800 border-amber-300' : '' }}
                    {{ $laporan->status === 'Diproses' ? 'bg-blue-100 text-blue-800 border-blue-300' : '' }}
                    {{ $laporan->status === 'Dikerjakan' ? 'bg-purple-100 text-purple-800 border-purple-300' : '' }}
                    {{ $laporan->status === 'Selesai' ? 'bg-green-100 text-green-800 border-green-300' : '' }}
                    {{ $laporan->status === 'Ditolak' ? 'bg-red-100 text-red-800 border-red-300' : '' }}">
                    {{ $laporan->status }}
                </span>
            </div>

            <!-- Info Metadata -->
            <div class="grid grid-cols-2 gap-4 text-sm bg-gray-50 p-4 rounded-lg">
                <div>
                    <span class="block text-xs text-gray-400">Pelapor:</span>
                    <span class="font-medium text-gray-700">{{ $laporan->user->name }}</span>
                </div>
                <div>
                    <span class="block text-xs text-gray-400">Lokasi Tempat:</span>
                    <span class="font-medium text-gray-700">{{ $laporan->lokasi }}</span>
                </div>
                <div>
                    <span class="block text-xs text-gray-400">Kategori Fasilitas:</span>
                    <span class="font-medium text-gray-700">{{ $laporan->kategori->nama_kategori ?? '-' }}
                    </span>
                </div>
                <div>
                    <span class="block text-xs text-gray-400">Teknisi Pengampu:</span>
                    <span class="font-medium text-blue-600">{{ $laporan->teknisi->name ?? 'Belum Ditunjuk' }}</span>
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <h4 class="text-sm font-semibold text-gray-800 mb-1">Deskripsi Kerusakan:</h4>
                <p class="text-sm text-gray-600 leading-relaxed bg-white border border-gray-200 p-3 rounded-lg">
                    {{ $laporan->deskripsi }}
                </p>
            </div>

            <!-- Bukti Gambar -->
            @if($laporan->foto)
            <div>
                <h4 class="text-sm font-semibold text-gray-800 mb-2">Foto Lampiran:</h4>
                <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Kerusakan" class="w-full h-64 object-cover rounded-xl border border-gray-200">
            </div>
            @endif
        </div>
    </div>

    <!-- Sisi Kanan: Alur Progress / Catatan Komentar -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between h-fit space-y-6">
        <div>
            <h3 class="text-md font-bold text-gray-800 border-b border-gray-100 pb-3 mb-4">Aktivitas & Progress</h3>
            
            <!-- Timeline Log Komentar -->
            <div class="flow-root">
                <ul class="-mb-8">
                    @forelse($laporan->komentars ?? [] as $komentar)
                    <li>
                        <div class="relative pb-8">
                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                            <div class="relative flex space-x-3">
                                <div>
                                    <span class="h-8 w-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xs font-bold border border-blue-200">
                                        {{ strtoupper(substr($komentar->user->name, 0, 2)) }}
                                    </span>
                                </div>
                                <div class="flex-1 min-w-0 pt-1.5">
                                    <p class="text-xs font-semibold text-gray-800">{{ $komentar->user->name }} <span class="font-normal text-gray-400">({{ $komentar->user->role }})</span></p>
                                    <p class="text-sm text-gray-600 mt-1 bg-gray-50 p-2 rounded">{{ $komentar->komentar }}</p>
                                    <span class="text-[10px] text-gray-400 block mt-1">{{ $komentar->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @empty
                    <p class="text-xs text-center text-gray-400 py-4">Belum ada pembaruan log aktivitas untuk pengaduan ini.</p>
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Kolom input Tambah Komentar (Untuk Admin/Teknisi) -->
        <div class="border-t border-gray-100 pt-4">
            <form action="{{ route('laporan.komentar.store', $laporan->id) }}" method="POST" class="space-y-2">
                @csrf
                <textarea name="komentar" rows="2" placeholder="Tulis catatan progress / komentar baru..." class="w-full border border-gray-300 rounded-lg p-2.5 text-xs outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                
                <div class="flex gap-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-xs font-semibold hover:bg-blue-700">
                        Kirim Update
                    </button>
                </div>
            </form>
        </div>
    </div>

            <a href="/laporan"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-xs font-semibold">
                Kembali
            </a>
        </div>
            </form>
        </div>
    </div>

</div>
@endsection