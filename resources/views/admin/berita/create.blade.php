@extends('layout.app')

@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">
            <div class="mb-6 flex items-center gap-2">
                <span class="icon-[tabler--user-plus] size-6 text-primary"></span>
                <h1 class="text-xl font-semibold">Tambah Berita</h1>
            </div>
            <div class="rounded-box bg-base-100 shadow-md">
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6 p-4 sm:p-6 lg:p-8">
                    @csrf
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Gambar</span>
                        </label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Judul</span>
                        </label>
                        <input type="text" name="judul" class="input input-bordered w-full" placeholder="Judul"
                            required>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Isi Berita</span>
                        </label>
                        <textarea name="isi" class="textarea textarea-bordered w-full" rows="6" placeholder="Isi Berita" required></textarea>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Status</span>
                        </label>
                        <select id="status" name="status" class="select select-bordered w-full">
                            <option value="">-- Status --</option>
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>

                    <button class="btn btn-success">Simpan</button>

                </form>
            </div>
        </main>
    </div>
@endsection
