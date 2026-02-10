<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PengajarController extends Controller
{
    public function index()
    {
        return view('admin.pengajar.index', [
            'pengajar' => Pengajar::with(['guru', 'mapel', 'kelas'])->get(),
            'guru' => Guru::orderBy('nama_guru')->get(),
            'mapel' => MataPelajaran::orderBy('nama_mapel')->get(),
            'kelas' => Kelas::orderBy('nama_kelas')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        try {
            Pengajar::create($request->only('guru_id', 'mapel_id', 'kelas_id'));
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return back()
                    ->withErrors([
                        'pengajar' => 'Guru sudah terdaftar mengajar mapel ini di kelas tersebut',
                    ])
                    ->withInput();
            }

            throw $e;
        }

        return back()->with('success', 'Pengajar berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin.pengajar.edit', [
            'pengajar' => Pengajar::findOrFail($id),
            'guru' => Guru::orderBy('nama_guru')->get(),
            'mapel' => MataPelajaran::orderBy('nama_mapel')->get(),
            'kelas' => Kelas::orderBy('nama_kelas')->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $pengajar = Pengajar::findOrFail($id);

        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $exists = Pengajar::where('id', '!=', $pengajar->id)
            ->where([
                'guru_id' => $request->guru_id,
                'mapel_id' => $request->mapel_id,
                'kelas_id' => $request->kelas_id,
            ])
            ->exists();

        if ($exists) {
            return back()->withErrors([
                'pengajar' => 'Pengajar dengan kombinasi ini sudah ada',
            ]);
        }

        $pengajar->update($request->only('guru_id', 'mapel_id', 'kelas_id'));

        return redirect()->route('admin.pengajar.index')->with('success', 'Pengajar berhasil diupdate');
    }

    public function destroy($id)
    {
        try {
            Pengajar::findOrFail($id)->delete();
            return back()->with('success', 'Pengajar berhasil dihapus');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return back()->withErrors([
                    'delete' => 'Pengajar tidak bisa dihapus karena masih digunakan',
                ]);
            }
            return back()->withErrors([
                'delete' => 'Terjadi kesalahan saat menghapus data',
            ]);
        }
    }
}
