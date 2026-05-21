<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Kategori;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::where('user_id', auth()->id())->latest()->get();

        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('laporan.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $fotoPath = null;
        if ($request->hasFile('foto')){
        $fotoPath = $request->file('foto')->store('laporan', 'public');
        }
        Laporan::create([
            'user_id' => auth()->id(),
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'status' => 'pending',
            ]);
            return redirect('/laporan');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        return redirect('/laporan');
    }

    public function show($id)
    {
        $laporan = Laporan::with('kategori')->findOrFail($id);
        return view('laporan.show', compact('laporan'));
    }

    public function edit($id)
    {
        $laporan = Laporan::with('kategori')->findOrFail($id);
        $kategoris = Kategori::all();
        return view('laporan.edit', compact('laporan', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::with('kategori')->findOrFail($id);

        $fotoPath = $laporan->foto;
        if ($request->hasFile('foto')){
            $fotoPath = $request->file('foto')->store('laporan', 'public');
        }
        $laporan->update([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
        ]);
        return redirect('/laporan');
    }

    public function storeKomentar(Request $request, $id)
    {
        $request->validate([
            'komentar' => 'required'
        ]);

        Komentar::create([
            'laporan_id' => $id,
            'user_id' => auth()->id(),
            'komentar' => $request->komentar,
        ]);

        return back();
    }
}