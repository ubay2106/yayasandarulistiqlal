<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajar;
use App\Models\Siswa;
use App\Models\PenilaianHarian;
use Illuminate\Database\QueryException;

class NilaiController extends Controller
{
    public function index()
    {
        $guru = Auth::user()->guru;

        $pengajar = Pengajar::with('kelas', 'mapel')->where('guru_id', $guru->id)->get();

        return view('guru.nilai.index', compact('pengajar'));
    }

    public function create(Pengajar $pengajar)
    {
        if ($pengajar->guru_id !== Auth::user()->guru->id) {
            abort(403);
        }

        $siswa = Siswa::where('kelas_id', $pengajar->kelas_id)->get();

        return view('guru.nilai.create', compact('pengajar', 'siswa'));
    }

    public function store(Request $request)
    {
        $guru = Auth::user()->guru;

        $request->validate([
            'pengajar_id' => 'required|exists:pengajar,id',
            'jenis_nilai' => 'required|in:harian,uts,uas',
            'nilai' => 'required|array',
            'nilai.*' => 'nullable|numeric|min:0|max:100',
        ]);

        $pengajar = Pengajar::with('mapel', 'kelas')->where('id', $request->pengajar_id)->where('guru_id', $guru->id)->firstOrFail();

        foreach ($request->nilai as $siswa_id => $nilai) {
            if ($nilai === null) {
                continue;
            }

            $exists = PenilaianHarian::where('guru_id', $guru->id)
                ->where('mapel_id', $pengajar->mapel_id)
                ->where('kelas_id', $pengajar->kelas_id)
                ->where('siswa_id', $siswa_id)
                ->where('tanggal', now()->toDateString())
                ->where('jenis_nilai', $request->jenis_nilai) // ⬅️ KUNCI UTAMA
                ->exists();

            if ($exists) {
                return back()->withErrors(['duplikat' => 'Nilai sudah diinput untuk jenis ini']);
            }

            PenilaianHarian::create([
                'guru_id' => $guru->id,
                'mapel_id' => $pengajar->mapel_id,
                'kelas_id' => $pengajar->kelas_id,
                'siswa_id' => $siswa_id,
                'nilai' => $nilai,
                'tanggal' => now()->toDateString(),
                'jenis_nilai' => $request->jenis_nilai,
            ]);
        }

        return redirect()->route('guru.nilai.index')->with('success', 'Nilai berhasil disimpan');
    }

    public function rekap(Request $request)
    {
        $guru = Auth::user()->guru;

        $pengajar = Pengajar::with('mapel', 'kelas')->where('guru_id', $guru->id)->get();

        $rekap = PenilaianHarian::with('siswa')
            ->where('guru_id', $guru->id)
            ->when($request->pengajar_id, function ($q) use ($request) {
                $pengajar = Pengajar::find($request->pengajar_id);

                $q->where('mapel_id', $pengajar->mapel_id)->where('kelas_id', $pengajar->kelas_id);
            })
            ->when($request->jenis_nilai, function ($q) use ($request) {
                $q->where('jenis_nilai', $request->jenis_nilai);
            })
            ->orderBy('tanggal')
            ->get()
            ->groupBy(['tanggal', 'jenis_nilai']);

        return view('guru.nilai.rekap', compact('pengajar', 'rekap'));
    }

    public function edit(PenilaianHarian $penilaian)
    {
        $guru = Auth::user()->guru;

        if ($penilaian->guru_id !== $guru->id) {
            abort(403);
        }

        return view('guru.nilai.edit', compact('penilaian'));
    }

    public function update(Request $request, PenilaianHarian $penilaian)
    {
        $guru = Auth::user()->guru;

        if ($penilaian->guru_id !== $guru->id) {
            abort(403);
        }

        $request->validate([
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        $penilaian->update([
            'nilai' => $request->nilai,
        ]);

        return redirect()
            ->route('guru.nilai.rekap', request()->query())
            ->with('success', 'Nilai berhasil diperbarui');
    }

    public function destroy(PenilaianHarian $penilaian)
    {
        $guru = Auth::user()->guru;

        if ($penilaian->guru_id !== $guru->id) {
            abort(403);
        }

        $penilaian->delete();

        return back()->with('success', 'Nilai berhasil dihapus');
    }
}
