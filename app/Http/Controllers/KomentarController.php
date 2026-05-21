<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class KomentarController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'komentar' => 'required'
        ]);

        Komentar::create([
            'laporan_id' => $id,
            'user_id' => auth()->id(),
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
}
