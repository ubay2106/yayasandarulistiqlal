<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kelas' => 'required|string|max:50|unique:kelas,nama_kelas',
            ],
            [
                'nama_kelas.unique' => 'Nama kelas sudah ada',
            ],
        );

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return back()->with('success', 'Kelas berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama_kelas' => 'required|string|max:50|unique:kelas,nama_kelas,' . $kelas->id,
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return back()->with('success', 'Kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        try {
            $kelas = Kelas::findOrFail($id);
            $kelas->delete();

            return back()->with('success', 'Kelas berhasil dihapus');
        } catch (QueryException $e) {
            // Error MySQL foreign key restrict
            if ($e->getCode() == '23000') {
                return back()->withErrors([
                    'delete' => 'Kelas tidak bisa dihapus karena masih digunakan (siswa / wali kelas / pengajar)',
                ]);
            }

            // Error lain (jaga-jaga)
            return back()->withErrors([
                'delete' => 'Terjadi kesalahan saat menghapus data',
            ]);
        }
    }
}
