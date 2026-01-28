@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold">Rekap Mapel Perkelas</h2>

                <a href="{{ route('admin.rekap.rekap-kelas') }}" class="btn btn-sm btn-outline">
                    Kembali
                </a>
            </div>
            <div class="rounded-box shadow-base-300/10 bg-base-100 w-full pb-2 shadow-md">
                <div class="overflow-x-auto">
                    <table class="table table-zebra">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata pelajaran</th>
                                <th>Nama Guru</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($mapel as $i => $p)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $p->mapel->nama_mapel }}</td>
                                    <td>{{ $p->guru->nama_guru }}</td>
                                    <td>
                                        <a href="{{ route('admin.rekap.nilai', $p->id) }}" class="btn btn-sm btn-primary">
                                            Nilai
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
