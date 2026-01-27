@extends('layout.app')

@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">

            <div class="mb-6 flex items-center gap-2">
                <span class="icon-[tabler--chart-bar] size-6 text-primary"></span>
                <h1 class="text-xl font-semibold">{{ $pengajar->mapel->nama_mapel }} –
                    Kelas {{ $pengajar->kelas->nama_kelas }}</h1>
            </div>

            <div class="rounded-box bg-base-100 shadow-md p-4 sm:p-6 lg:p-8 space-y-6">
                <form action="{{ route('guru.nilai.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="pengajar_id" value="{{ $pengajar->id }}">
                    <div class="form-control mb-4 max-w-xs">
                        <label class="label">
                            <span class="label-text font-medium">Jenis Penilaian</span>
                        </label>

                        <select name="jenis_nilai" class="select select-bordered w-full" required>
                            <option value="harian">Nilai Harian</option>
                            <option value="uts">UTS</option>
                            <option value="uas">UAS</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama SIswa</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $i => $s)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $s->nama_siswa }}</td>
                                        <td>
                                            <input type="number" name="nilai[{{ $s->id }}]"
                                                class="input input-bordered input-sm w-24" min="0" max="100">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pt-4 flex justify-end gap-2">
                        <a href="{{ route('guru.nilai.index') }}" class="btn btn-ghost">
                            Kembali
                        </a>
                        <button class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    @if ($errors->has('duplikat'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Nilai Sudah Ada',
                text: '{{ $errors->first('duplikat') }}',
                confirmButtonText: 'OK',
                width: '90%',
            });
        </script>
    @endif
@endsection
