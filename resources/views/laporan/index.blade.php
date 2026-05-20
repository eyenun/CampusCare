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

                </tr>

            </thead>

            <tbody>

                <tr class="border-t">

                    <td class="p-5">1</td>
                    <td class="p-5">Proyektor Rusak</td>
                    <td class="p-5">Lab Komputer</td>
                    <td class="p-5 text-red-500 font-semibold">
                        Pending
                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection