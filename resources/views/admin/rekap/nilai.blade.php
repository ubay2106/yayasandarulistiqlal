@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Rekap Nilai Perkelas</h2>

                <a href="{{ route('admin.rekap.rekap-kelas') }}" class="btn btn-sm btn-outline">
                    Kembali
                </a>
            </div>
            <div class="flex items-center mb-4">
                <form method="GET" id="filter-form" class="flex gap-2">
                    <select name="semester" class="select select-bordered" onchange="this.form.submit()">
                        <option value="">Semua Semester</option>

                        @foreach ($semesterList as $s)
                            <option value="{{ $s['value'] }}" @selected(request('semester') == $s['value'])>
                                {{ $s['label'] }}
                            </option>
                        @endforeach
                    </select>

                </form>
            </div>
            <div class="rounded-box shadow-base-300/10 bg-base-100 w-full pb-2 shadow-md">
                <div class="overflow-x-auto">
                    <table class="table table-zebra">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Harian</th>
                                <th>UTS</th>
                                <th>UAS</th>
                                <th>Rata-rata</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($siswa as $i => $s)
                                @php
                                    $harian = optional($nilai->get($s->id)?->get('harian'))->avg('nilai');
                                    $uts = optional($nilai->get($s->id)?->get('uts'))->avg('nilai');
                                    $uas = optional($nilai->get($s->id)?->get('uas'))->avg('nilai');

                                    $avg = collect([$harian, $uts, $uas])
                                        ->filter()
                                        ->avg();
                                @endphp

                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $s->nama_siswa }}</td>
                                    <td>{{ $harian ? number_format($harian, 1) : '-' }}</td>
                                    <td>{{ $uts ? number_format($uts, 1) : '-' }}</td>
                                    <td>{{ $uas ? number_format($uas, 1) : '-' }}</td>
                                    <td>{{ $avg ? number_format($avg, 1) : '-' }}</td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
