@extends('layout.app')

@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">
            <div class="mb-6 flex items-center gap-2">
                <span class="icon-[tabler--user-plus] size-6 text-primary"></span>
                <h1 class="text-xl font-semibold">Edit Berita</h1>
            </div>
            <div class="rounded-box bg-base-100 shadow-md">
                <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6 p-4 sm:p-6 lg:p-8">
                    @csrf
                    @method('PUT')

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Gambar</span>
                        </label>
                        <div>
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" class="h-32 rounded mb-2">
                            @endif
                            <input type="file" name="gambar" class="file-input file-input-bordered w-full">
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Judul</span>
                        </label>
                        <input type="text" name="judul" class="input input-bordered w-full"
                            value="{{ old('judul', $berita->judul) }}" required>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Judul</span>
                        </label>
                        <textarea name="isi" class="textarea textarea-bordered w-full" rows="6" required>{{ old('isi', $berita->isi) }}</textarea>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Status</span>
                        </label>
                        <select name="status" class="select select-bordered w-full">
                            <option value="publish" @selected($berita->status === 'publish')>Publish</option>
                            <option value="draft" @selected($berita->status === 'draft')>Draft</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-ghost">Batal</a>
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
