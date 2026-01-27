@extends('layout.app')

@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">
            <div class="p-6 space-y-4">

                <h2 class="text-xl font-semibold">Rekap Nilai</h2>

                <form method="GET" id="filter-form" class="flex flex-col gap-3 sm:flex-row sm:items-end">

                    <select name="pengajar_id"
                        class="select select-bordered select-sm sm:select-md w-full sm:w-auto auto-submit">
                        <option value="">Semua Mapel</option>
                        @foreach ($pengajar as $p)
                            <option value="{{ $p->id }}" @selected(request('pengajar_id') == $p->id)>
                                {{ $p->mapel->nama_mapel }} - {{ $p->kelas->nama_kelas }}
                            </option>
                        @endforeach
                    </select>

                    <select name="jenis_nilai"
                        class="select select-bordered select-sm sm:select-md w-full sm:w-auto auto-submit">
                        <option value="">Semua Jenis</option>
                        <option value="harian" @selected(request('jenis_nilai') === 'harian')>Harian</option>
                        <option value="uts" @selected(request('jenis_nilai') === 'uts')>UTS</option>
                        <option value="uas" @selected(request('jenis_nilai') === 'uas')>UAS</option>
                    </select>

                </form>

                @php
                    use Carbon\Carbon;
                @endphp

                @if ($rekap->isEmpty())
                    {{-- CARD KOSONG --}}
                    <div class="card bg-base-100 shadow">
                        <div class="card-body items-center text-center">
                            <span class="icon-[tabler--clipboard-x] size-10 text-base-content/40"></span>
                            <h3 class="font-semibold mt-2">Belum Ada Nilai</h3>
                            <p class="text-sm text-base-content/60">
                                Nilai belum diinput untuk filter yang dipilih
                            </p>
                        </div>
                    </div>
                @else
                    {{-- CARD BERISI NILAI --}}
                    @foreach ($rekap as $tanggal => $jenis)
                        @foreach ($jenis as $tipe => $nilai)
                            <div class="card bg-base-100 shadow">
                                <div class="card-body">
                                    <h3 class="font-semibold">
                                        {{ Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                                        - {{ strtoupper($tipe) }}
                                    </h3>

                                    <table class="table table-zebra">
                                        <thead>
                                            <tr>
                                                <th>Siswa</th>
                                                <th class="text-center">Nilai</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($nilai as $n)
                                                <tr>
                                                    <td>{{ $n->siswa->nama_siswa }}</td>
                                                    <td class="text-center font-semibold">{{ $n->nilai }}</td>
                                                    <td class="text-center space-x-1">
                                                        <a href="{{ route('guru.nilai.edit', $n->id) }}"
                                                            class="btn btn-circle btn-text btn-sm" title="Edit">
                                                            <span class="icon-[tabler--pencil] size-5"></span>
                                                        </a>

                                                        <form action="{{ route('guru.nilai.destroy', $n->id) }}"
                                                            method="POST" class="inline"
                                                            id="hapus-nilai-{{ $n->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-circle btn-text btn-sm"
                                                                onclick="hapusNilai({{ $n->id }})" title="Hapus">
                                                                <span class="icon-[tabler--trash] size-5"></span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endif


            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('filter-form');

            document.querySelectorAll('.auto-submit').forEach(el => {
                el.addEventListener('change', () => {
                    form.submit();
                });
            });
        });

        function hapusNilai(id) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Nilai ini akan dihapus',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#dc2626',
                focusCancel: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('hapus-nilai-' + id).submit();
                }
            });
        }
    </script>

@endsection
