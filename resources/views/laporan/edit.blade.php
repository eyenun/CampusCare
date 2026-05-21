@extends('layouts.app')

@section('content')

<div class="p-6 bg-white rounded-xl">

    <h1 class="text-2xl font-bold mb-6">Edit Laporan</h1>

    <form method="POST" action="{{ route('laporan.update', $laporan->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="judul" value="{{ $laporan->judul }}"
            class="border p-2 w-full mb-3">

        <input type="text" name="lokasi" value="{{ $laporan->lokasi }}"
            class="border p-2 w-full mb-3">

        {{-- 🔥 INI YANG KAMU TAMBAH --}}
        <select name="kategori_id" class="border p-2 w-full mb-3">
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}"
                    {{ $laporan->kategori_id == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>

        <textarea name="deskripsi"
            class="border p-2 w-full mb-3">{{ $laporan->deskripsi }}</textarea>

        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            Update
        </button>

    </form>

</div>

@endsection