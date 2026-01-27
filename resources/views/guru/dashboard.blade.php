@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <!-- Content -->
        <main class="mx-auto w-full max-w-[1280px] flex-1 grow space-y-6 p-6">
            <div class="shadow-base-300/10 rounded-box bg-base-100 flex gap-4 p-6 shadow-md max-xl:flex-col">
                <div class="flex flex-1 gap-4 max-sm:flex-col">
                    <div class="flex flex-1 flex-col gap-4">
                        <div class="text-base-content flex items-center gap-2">
                            <div class="avatar avatar-placeholder">
                                <div class="bg-base-200 rounded-field size-9">
                                    <span class="icon-[tabler--users] size-5"></span>
                                </div>
                            </div>
                            <h5 class="text-lg font-medium">Siswa yang diajar</h5>
                        </div>
                        <div class="text-base-content text-xl font-semibold">
                            {{ $siswaCount }}
                        </div>
                    </div>

                    <div class="divider sm:divider-horizontal"></div>
                    <div class="flex flex-1 flex-col gap-4">
                        <div class="text-base-content flex items-center gap-2">
                            <div class="avatar avatar-placeholder">
                                <div class="bg-base-200 rounded-field size-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
                                        <path d="M5 13v5c0 1 3 3 7 3s7-2 7-3v-5" />
                                    </svg>
                                </div>
                            </div>
                            <h5 class="text-lg font-medium">Kelas yang diajar</h5>
                        </div>
                        <div class="text-base-content text-xl font-semibold">
                            {{ $kelasCount }}
                        </div>
                    </div>
                </div>

                <div class="divider xl:divider-horizontal"></div>

                <div class="flex flex-1 gap-4 max-sm:flex-col">
                    <div class="flex flex-1 flex-col gap-4">
                        <div class="text-base-content flex items-center gap-2">
                            <div class="avatar avatar-placeholder">
                                <div class="bg-base-200 rounded-field size-9">
                                    <span class="icon-[tabler--chart-bar] size-5"></span>
                                </div>
                            </div>
                            <h5 class="text-lg font-medium">Mata Pelajaran</h5>
                        </div>
                        <div class="text-base-content text-xl font-semibold">
                            {{ $mapelCount }}
                        </div>
                    </div>

                    <div class="divider sm:divider-horizontal"></div>

                    <div class="flex flex-1 flex-col gap-4">
                        <div class="text-base-content flex items-center gap-2">
                            <div class="avatar avatar-placeholder">
                                <div class="bg-base-200 rounded-field size-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M3 5h6a2 2 0 0 1 2 2v12H5a2 2 0 0 1-2-2V5z" />
                                        <path d="M13 7h6a2 2 0 0 1 2 2v10h-8V7z" />
                                        <path d="M13 7V5a2 2 0 0 1 2-2h4" />
                                    </svg>
                                </div>
                            </div>
                            <h5 class="text-lg font-medium">Penilaian Diinput</h5>
                        </div>
                        <div class="text-base-content text-xl font-semibold">
                            {{ $nilaiCount }}
                        </div>
                    </div>

                </div>
            </div>

            <form method="GET" class="flex flex-wrap gap-2 mb-4">

                <select name="pengajar_id" class="select select-bordered select-sm" onchange="this.form.submit()">

                    <option value="">Semua Mapel & Kelas</option>
                    @foreach ($pengajar as $p)
                        <option value="{{ $p->id }}" @selected(request('pengajar_id') == $p->id)>
                            {{ $p->mapel->nama_mapel }} - {{ $p->kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>

                <select name="jenis_nilai" class="select select-bordered select-sm" onchange="this.form.submit()">

                    <option value="">Semua Jenis</option>
                    <option value="harian" @selected(request('jenis_nilai') == 'harian')>
                        Harian
                    </option>
                    <option value="uts" @selected(request('jenis_nilai') == 'uts')>
                        UTS
                    </option>
                    <option value="uas" @selected(request('jenis_nilai') == 'uas')>
                        UAS
                    </option>
                </select>

            </form>

            <div class="card bg-base-100 shadow mt-6">
                <div class="card-body">
                    <h3 class="font-semibold mb-3">
                        Grafik Rata-rata Nilai
                        @if (request('pengajar_id'))
                            <span class="text-sm text-gray-500">
                                ({{ $pengajar->firstWhere('id', request('pengajar_id'))->mapel->nama_mapel }}
                                - {{ $pengajar->firstWhere('id', request('pengajar_id'))->kelas->nama_kelas }})
                            </span>
                        @endif
                    </h3>


                    @if ($grafik->count())
                        <div class="relative h-[300px]">
                            <canvas id="grafikNilai"></canvas>
                        </div>
                    @else
                        <p class="text-sm text-gray-500 text-center">
                            Belum ada data nilai
                        </p>
                    @endif
                </div>
            </div>

        </main>
        <!-- / Content -->

    </div>
    @if ($grafik->count())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const canvas = document.getElementById('grafikNilai');
                if (!canvas) return;

                new Chart(canvas, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($grafik->pluck('tanggal')) !!},
                        datasets: [{
                            label: 'Rata-rata Nilai',
                            data: {!! json_encode($grafik->pluck('rata_nilai')) !!},
                            borderColor: '#2563eb',
                            backgroundColor: 'rgba(37,99,235,0.2)',
                            tension: 0.4,
                            fill: true,
                            pointRadius: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                min: 0,
                                max: 100
                            }
                        }
                    }
                });
            });
        </script>
    @endif
@endsection
