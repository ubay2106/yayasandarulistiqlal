<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajar;
use App\Models\Siswa;
use App\Models\PenilaianHarian;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    public function rekapKelas()
    {
        $kelas = Kelas::withCount('siswa')
            ->withCount([
                'pengajar as mapel_count' => function ($q) {
                    $q->select(DB::raw('COUNT(DISTINCT mapel_id)'));
                },
            ])
            ->get();

        return view('admin.rekap.rekap-kelas', compact('kelas'));
    }

    public function rekapMapel($kelasId)
    {
        $kelas = Kelas::findOrFail($kelasId);

        $mapel = Pengajar::with(['mapel', 'guru'])
            ->where('kelas_id', $kelasId)
            ->get();

        $semesterList = PenilaianHarian::where('kelas_id', $kelas->id)
            ->selectRaw(
                "
        YEAR(tanggal) as tahun,
        CASE
            WHEN MONTH(tanggal) <= 6 THEN 2
            ELSE 1
        END as semester
    ",
            )
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->orderBy('semester')
            ->get()
            ->map(
                fn($item) => [
                    'value' => $item->tahun . '-' . $item->semester,
                    'label' => 'Semester ' . $item->semester . ' - ' . $item->tahun,
                ],
            );

        return view('admin.rekap.rekap-mapel', compact('kelas', 'semesterList', 'mapel'));
    }

    public function rekapNilai(Request $request, $pengajarId)
    {
        $pengajar = Pengajar::with(['kelas', 'mapel'])->findOrFail($pengajarId);

        $siswa = Siswa::where('kelas_id', $pengajar->kelas_id)->get();

        $query = PenilaianHarian::where('kelas_id', $pengajar->kelas_id)->where('mapel_id', $pengajar->mapel_id);

        $semesterList = PenilaianHarian::selectRaw(
            "
        YEAR(tanggal) as tahun,
        CASE
            WHEN MONTH(tanggal) <= 6 THEN 2
            ELSE 1
        END as semester
    ",
        )
            ->where('kelas_id', $pengajar->kelas_id)
            ->where('mapel_id', $pengajar->mapel_id)
            ->groupBy('tahun', 'semester')
            ->orderBy('tahun', 'desc')
            ->orderBy('semester')
            ->get()
            ->map(function ($item) {
                return [
                    'value' => $item->tahun . '-' . $item->semester,
                    'label' => 'Semester ' . $item->semester . ' - ' . $item->tahun,
                ];
            });

        $semesterInput = request('semester');

        if ($semesterInput && str_contains($semesterInput, '-')) {
            [$tahun, $semester] = explode('-', $semesterInput);

            if ($semester == 1) {
                $query->whereBetween('tanggal', ["$tahun-07-01", "$tahun-12-31"]);
            } elseif ($semester == 2) {
                $query->whereBetween('tanggal', ["$tahun-01-01", "$tahun-06-30"]);
            }
        }

        $nilai = $query->get()->groupBy(['siswa_id', 'jenis_nilai']);

        return view('admin.rekap.nilai', compact('pengajar', 'siswa', 'semesterList', 'nilai'));
    }

    public function exportPerKelas(Request $request, Kelas $kelas)
    {

        $semester = $request->semester;

        $query = PenilaianHarian::with(['siswa', 'mapel'])->where('kelas_id', $kelas->id);

        if ($semester) {
            [$tahun, $smt] = explode('-', $semester);

            if ($smt == 2) {
                $tanggalAwal = "{$tahun}-01-01";
                $tanggalAkhir = "{$tahun}-06-30";
            } else {
                $tanggalAwal = "{$tahun}-07-01";
                $tanggalAkhir = "{$tahun}-12-31";
            }

            $query->whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir]);
        }

        $nilai = $query->get();

        $data = [];
        foreach ($nilai as $n) {
            $sid = $n->siswa_id;
            $mid = $n->mapel_id;

            $data[$sid]['siswa'] = $n->siswa;
            $data[$sid]['mapel'][$mid]['nama'] = $n->mapel->nama_mapel;
            $data[$sid]['mapel'][$mid][$n->jenis_nilai] = $n->nilai;
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->fromArray([['No', 'NIS', 'Nama Siswa', 'Mata Pelajaran', 'Harian', 'UTS', 'UAS', 'Rata-rata']]);

        $row = 2;
        $no = 1;

        foreach ($data as $item) {
            foreach ($item['mapel'] as $mapel) {
                $harian = $mapel['harian'] ?? null;
                $uts = $mapel['uts'] ?? null;
                $uas = $mapel['uas'] ?? null;

                $nilaiArr = array_filter([$harian, $uts, $uas]);
                $rata = count($nilaiArr) ? array_sum($nilaiArr) / count($nilaiArr) : null;

                $sheet->fromArray([$no++, $item['siswa']->nis, $item['siswa']->nama_siswa, $mapel['nama'], $harian, $uts, $uas, $rata ? round($rata, 2) : '-'], null, "A{$row}");

                $row++;
            }
        }

        $writer = new Xlsx($spreadsheet);

        $namaSemester = $semester ? str_replace('-', '_', $semester) : 'SEMUA';

        return new StreamedResponse(fn() => $writer->save('php://output'), 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=Rekap_Kelas_{$kelas->nama_kelas}_{$namaSemester}.xlsx",
            'Cache-Control' => 'max-age=0',
        ]);
    }
}
