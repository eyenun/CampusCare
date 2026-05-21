@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-100">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Buat Pengaduan Baru</h2>
        <p class="text-sm text-gray-500 mt-1">Laporkan kerusakan fasilitas kampus agar segera ditangani oleh teknisi.</p>
    </div>

    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Judul Kerusakan -->
        <div>
            <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">Judul Laporan</label>
            
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" 
                placeholder="Contoh: LCD Ruang IT-301 Tidak Menyala" 
                class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('judul') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Kategori -->
            <div>
                <label for="kategori_id" class="block text-sm font-semibold text-gray-700 mb-2">Kategori Fasilitas</label>
                <select name="kategori_id" id="kategori_id" class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-white">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('kategori_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Lokasi -->
            <div>
                <label for="lokasi" class="block text-sm font-semibold text-gray-700 mb-2">Lokasi / Gedung</label>
                <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi') }}" 
                    placeholder="Contoh: Gedung FIK, Lab Komputer 3" 
                    class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                @error('lokasi') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Kronologi Kerusakan</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" 
                placeholder="Jelaskan detail kerusakan (misal: kabel HDMI putus atau remote AC hilang)..." 
                class="w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">{{ old('deskripsi') }}</textarea>
            @error('deskripsi') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Upload Foto -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Bukti Kerusakan</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400 transition cursor-pointer relative bg-gray-50">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h16a4 4 0 004-4V12a4 4 0 00-4-4z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14 26l7-7 7 7M34 26l-4-4-4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <label for="foto" class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500">
                            <span>Unggah file gambar</span>
                            <input id="foto" name="foto" type="file" class="sr-only" accept="image/*">
                        </label>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, JPEG hingga 2MB</p>
                </div>
            </div>
            @error('foto') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
            <a href="{{ route('laporan.index') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition">Batal</a>
            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-sm transition">Kirim Laporan</button>
        </div>
    </form>
</div>
@endsection