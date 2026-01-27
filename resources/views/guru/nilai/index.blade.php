@extends('layout.app')

@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">

            <div class="mb-6 flex items-center gap-2">
                <span class="icon-[tabler--chart-bar] size-6 text-primary"></span>
                <h1 class="text-xl font-semibold">Input Nilai Harian</h1>
            </div>

            <div class="rounded-box bg-base-100 shadow-md p-4 sm:p-6 lg:p-8 space-y-6">

                {{-- TABEL --}}
                @if ($pengajar->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajar as $p)
                                    <tr>
                                        <td>{{ $p->mapel->nama_mapel }}</td>
                                        <td>{{ $p->kelas->nama_kelas }}</td>
                                        <td><a href="{{ route('guru.nilai.create', $p->id) }}"><span
                                                    class="icon-[tabler--pencil] size-5"></span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center text-base-content/60 py-10">
                        <span class="icon-[tabler--database-off] size-10 mx-auto mb-3 block"></span>
                        <p class="text-sm">Tidak ada kelas yang diajar</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
@endsection
