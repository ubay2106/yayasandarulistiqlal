<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajar;
use App\Models\PenilaianHarian;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'jumlahSiswa' => Siswa::count(),
            'jumlahGuru' => Guru::count(),
            'jumlahKelas' => Kelas::count(),
            'jumlahMapel' => MataPelajaran::count(),
        ]);
    }

    public function guru(Request $request)
    {
        $user = Auth::user();

        if (!$user->guru) {
            abort(403, 'Akses ditolak');
        }

        $guru = $user->guru;

        $pengajar = Pengajar::with('mapel', 'kelas')->where('guru_id', $guru->id)->get();

        $grafikQuery = PenilaianHarian::where('guru_id', $guru->id);

        if ($request->pengajar_id) {
            $p = $pengajar->firstWhere('id', $request->pengajar_id);

            if ($p) {
                $grafikQuery->where('mapel_id', $p->mapel_id)->where('kelas_id', $p->kelas_id);
            }
        }

        if ($request->jenis_nilai) {
            $grafikQuery->where('jenis_nilai', $request->jenis_nilai);
        }

        $grafik = $grafikQuery->selectRaw('DATE(tanggal) as tanggal, AVG(nilai) as rata_nilai')->groupByRaw('DATE(tanggal)')->orderBy('tanggal')->get();

        $kelasIds = $pengajar->pluck('kelas_id')->unique();
        $mapelIds = $pengajar->pluck('mapel_id')->unique();

        return view('guru.dashboard', [
            'guru' => $guru,
            'grafik' => $grafik,
            'pengajar' => $pengajar,
            'siswaCount' => Siswa::whereIn('kelas_id', $kelasIds)->count(),
            'kelasCount' => $kelasIds->count(),
            'mapelCount' => $mapelIds->count(),
            'nilaiCount' => PenilaianHarian::where('guru_id', $guru->id)->count(),
        ]);
    }
}
