@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">

        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">

            <div class="mb-6 flex items-center gap-2">
                <span class="icon-[tabler--user-plus] size-6 text-primary"></span>
                <h1 class="text-xl font-semibold">Tambah Siswa</h1>
            </div>

            <div class="rounded-box bg-base-100 shadow-md">

                <form action="{{ route('admin.siswa.store') }}" method="POST" class="space-y-6 p-4 sm:p-6 lg:p-8">
                    @csrf

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">NIS</span>
                        </label>
                        <input type="text" name="nis" class="input input-bordered w-full" placeholder="NIS Siswa"
                            required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Lengkap</span>
                        </label>
                        <input type="text" name="nama_siswa" class="input input-bordered w-full"
                            placeholder="Nama Lengkap Siswa" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Kelas</span>
                        </label>
                        <select name="kelas_id" class="select select-bordered w-full" required>
                            <option value="">-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-3 pt-4 sm:flex-row sm:justify-end">
                        <a href="{{ route('admin.siswa.index') }}" class="btn btn-ghost sm:btn-sm">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-primary sm:btn-sm">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>
        </main>
    </div>
@endsection
