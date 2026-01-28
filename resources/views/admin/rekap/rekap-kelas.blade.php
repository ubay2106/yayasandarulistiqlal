@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">
            <h2 class="text-xl font-semibold mb-4">Rekap Nilai Perkelas</h2>
            <div class="rounded-box shadow-base-300/10 bg-base-100 w-full pb-2 shadow-md">
                <div class="overflow-x-auto">
                    <table class="table table-zebra">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Jumlah Mapel</th>
                                <th>Jumlah Siswa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($kelas as $i => $k)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $k->nama_kelas }}</td>
                                    <td>{{ $k->mapel_count }}</td>
                                    <td>{{ $k->siswa_count }}</td>
                                    <td>
                                        <a href="{{ route('admin.rekap.rekap-mapel', $k->id) }}"
                                            class="btn btn-sm btn-primary">
                                            Lihat
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
