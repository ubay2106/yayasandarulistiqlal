<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mapel = MataPelajaran::orderBy('nama_mapel')->get();
        return view('admin.mapel.index', compact('mapel'));
    }

    public function store(Request $request)
    {
        // VALIDASI DASAR
        $request->validate([
            'nama_mapel' => 'required|string|max:100',
        ]);

        // CEGAH DUPLIKAT (TANPA UNIQUE DB)
        $sudahAda = MataPelajaran::where('nama_mapel', $request->nama_mapel)->exists();

        if ($sudahAda) {
            return back()
                ->withErrors(['nama_mapel' => 'Mata pelajaran sudah ada'])
                ->withInput();
        }

        MataPelajaran::create([
            'nama_mapel' => $request->nama_mapel,
        ]);

        return back()->with('success', 'Mata pelajaran berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $request->validate([
            'nama_mapel' => 'required|string|max:100',
        ]);

        // CEGAH DUPLIKAT SAAT EDIT
        $sudahAda = MataPelajaran::where('nama_mapel', $request->nama_mapel)->where('id', '!=', $mapel->id)->exists();

        if ($sudahAda) {
            return back()
                ->withErrors(['nama_mapel' => 'Mata pelajaran sudah ada'])
                ->withInput();
        }

        $mapel->update([
            'nama_mapel' => $request->nama_mapel,
        ]);

        return back()->with('success', 'Mata pelajaran berhasil diperbarui');
    }

    public function destroy($id)
    {
        try {
            MataPelajaran::findOrFail($id)->delete();
            return back()->with('success', 'Mata pelajaran berhasil dihapus');
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return back()->withErrors([
                    'delete' => 'Mata pelajaran tidak bisa dihapus karena masih digunakan',
                ]);
            }

            return back()->withErrors([
                'delete' => 'Terjadi kesalahan saat menghapus data',
            ]);
        }
    }
}
