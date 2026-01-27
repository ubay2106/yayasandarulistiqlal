@extends('layout.app')

@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">

            <div class="card bg-base-100 shadow">
                <div class="card-body space-y-4">

                    <h2 class="text-lg font-semibold">Edit Nilai</h2>

                    <div class="text-sm">
                        <p><strong>Siswa:</strong> {{ $penilaian->siswa->nama_siswa }}</p>
                        <p><strong>Mapel:</strong> {{ $penilaian->mapel->nama_mapel }}</p>
                        <p><strong>Jenis:</strong> {{ strtoupper($penilaian->jenis_nilai) }}</p>
                        <p><strong>Tanggal:</strong>
                            {{ \Carbon\Carbon::parse($penilaian->tanggal)->translatedFormat('d F Y') }}</p>
                    </div>

                    <form method="POST" action="{{ route('guru.nilai.update', $penilaian->id) }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Nilai</span>
                            </label>
                            <input type="number" name="nilai" value="{{ $penilaian->nilai }}"
                                class="input input-bordered" min="0" max="100" required>
                        </div>

                        {{-- SECTION TOMBOL --}}
                        <div class="pt-6 flex justify-end gap-2">
                            <a href="{{ url()->previous() }}" class="btn btn-ghost btn-sm">
                                Batal
                            </a>
                            <button class="btn btn-primary btn-sm">
                                Simpan
                            </button>
                        </div>
                    </form>


                </div>
            </div>

        </main>
    </div>
@endsection
