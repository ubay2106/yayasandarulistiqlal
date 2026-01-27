@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">

        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">

            <div class="mb-6 flex items-center gap-2">
                <span class="icon-[tabler--user-plus] size-6 text-primary"></span>
                <h1 class="text-xl font-semibold">Edit Pengajar</h1>
            </div>

            <div class="rounded-box bg-base-100 shadow-md">

                <form action="{{ route('admin.pengajar.update', $pengajar->id) }}" method="POST"
                    class="space-y-6 p-4 sm:p-6 lg:p-8">
                    @csrf
                    @method('PUT')

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Guru</span>
                        </label>
                        <select name="guru_id" class="select select-bordered select-sm">
                            @foreach ($guru as $g)
                                <option value="{{ $g->id }}" @selected($g->id == $pengajar->guru_id)>
                                    {{ $g->nama_guru }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Mata Pelajaran</span>
                        </label>
                        <select name="mapel_id" class="select select-bordered select-sm">
                            @foreach ($mapel as $m)
                                <option value="{{ $m->id }}" @selected($m->id == $pengajar->mapel_id)>
                                    {{ $m->nama_mapel }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Kelas</span>
                        </label>
                        <select name="kelas_id" class="select select-bordered select-sm">
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" @selected($k->id == $pengajar->kelas_id)>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-3 pt-4 sm:flex-row sm:justify-end">
                        <a href="{{ route('admin.pengajar.index') }}" class="btn btn-ghost sm:btn-sm">
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
