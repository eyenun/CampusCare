@extends('layouts.app')

@section('content')

<div>

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-4xl font-bold text-secondary">
                Data Laporan
            </h1>

            <p class="text-gray-500">
                Daftar laporan fasilitas kampus
            </p>

        </div>

        <a href="/laporan/create"
           class="bg-primary text-white px-6 py-3 rounded-xl">

            Tambah Laporan

        </a>

    </div>

    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="text-left p-5">No</th>
                    <th class="text-left p-5">Fasilitas</th>
                    <th class="text-left p-5">Lokasi</th>
                    <th class="text-left p-5">Status</th>
                    <th class="text-left p-5">Aksi</th>

                </tr>

            </thead>

            <tbody>
                @foreach($laporans as $laporan)
                <tr class="border-t">
                    <td class="p-5">
                        {{ $loop->iteration }}
                    </td>
                    
                    <td class="p-5">
                        {{ $laporan->judul }}
                    </td>

                    <td class="p-5">
                        {{ $laporan->lokasi }}
                    </td>

                    <td class="p-5 font-semibold">
                        {{ $laporan->status }}
                    </td>
                    
                    <td class="p-5">
                        {{-- EDIT --}}
                        <a href="{{ route('laporan.edit', $laporan->id) }}"class="text-blue-600">
                            Edit
                        </a>

                        {{-- DETAIL --}}
                        <a href="{{ route('laporan.show', $laporan->id) }}"class="text-green-600 hover:underline">
                            Detail
                        </a>

                        {{-- HAPUS --}}
                        <form action="/laporan/{{ $laporan->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection