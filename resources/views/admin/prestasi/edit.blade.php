@extends('layout.app')

@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">
            <div class="mb-6 flex items-center gap-2">
                <span class="icon-[tabler--user-plus] size-6 text-primary"></span>
                <h1 class="text-xl font-semibold">Edit Berita</h1>
            </div>
            <div class="rounded-box bg-base-100 shadow-md">
                <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6 p-4 sm:p-6 lg:p-8">
                    @csrf
                    @method('PUT')

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Gambar</span>
                        </label>
                        <div>
                            @if ($prestasi->gambar)
                                <img src="{{ asset('storage/' . $prestasi->gambar) }}" class="h-32 rounded">
                            @endif
                            <input type="file" name="gambar" class="file-input file-input-bordered w-full">
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Judul</span>
                        </label>
                        <input type="text" name="judul" class="input input-bordered w-full"
                            value="{{ old('judul', $prestasi->judul) }}" required>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Tanggal</span>
                        </label>
                        <input type="date" name="tanggal" class="input input-bordered w-full"
                            value="{{ old('tanggal', $prestasi->tanggal) }}" required>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Deskripsi</span>
                        </label>
                        <textarea name="deskripsi" class="textarea textarea-bordered w-full" rows="5" required>{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Status</span>
                        </label>
                        <select name="status" class="select select-bordered w-full">
                            <option value="publish" @selected($prestasi->status === 'publish')>Publish</option>
                            <option value="draft" @selected($prestasi->status === 'draft')>Draft</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-ghost">Batal</a>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
