@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">

        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">

            <div class="mb-6 flex items-center gap-2">
                <span class="icon-[tabler--user-plus] size-6 text-primary"></span>
                <h1 class="text-xl font-semibold">Tambah Guru</h1>
            </div>

            <div class="rounded-box bg-base-100 shadow-md">

                <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6 p-4 sm:p-6 lg:p-8">
                    @csrf

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Foto Guru</span>
                        </label>

                        <label
                            class="relative flex w-full cursor-pointer flex-col items-center justify-center gap-3
                            rounded-xl border-2 border-dashed border-base-content/30
                            bg-base-100 p-8 text-center
                            hover:border-primary hover:bg-base-200 transition">

                            <div id="upload-placeholder" class="flex flex-col items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-base-content/60"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12V4m0 0l-4 4m4-4l4 4" />
                                </svg>

                                <p class="text-sm text-base-content/70">
                                    Klik untuk upload foto
                                </p>

                                <p class="text-xs text-base-content/50">
                                    JPG / PNG, maksimal 2MB
                                </p>
                            </div>

                            <img id="preview-foto" class="hidden h-12 w-12 rounded-xl object-cover border"
                                alt="Preview Foto">

                            <input type="file" accept="image/*" class="hidden"
                                onchange="previewFoto(event)">
                            <input type="hidden" name="foto_cropped" id="foto_cropped">

                        </label>
                    </div>


                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">NIP</span>
                        </label>
                        <input type="text" name="nip" class="input input-bordered w-full" placeholder="NIP Guru"
                            required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama Lengkap</span>
                        </label>
                        <input type="text" name="nama_guru" class="input input-bordered w-full"
                            placeholder="Nama Lengkap Guru" required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Tanggal Lahir</span>
                        </label>
                        <input type="date" name="tanggal_lahir" class="input input-bordered w-full"
                            value="{{ old('tanggal_lahir') }}" required>
                    </div>


                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input type="text" name="username" class="input input-bordered w-full" placeholder="Username"
                            required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" class="input input-bordered w-full" placeholder="......"
                            required>
                    </div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Jabatan</span>
                        </label>
                        <select id="jabatan" name="jabatan" class="select select-bordered w-full">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="wali kelas">Wali Kelas</option>
                            <option value="guru mapel">Guru Mapel</option>
                            <option value="guru kelas">Guru Kelas</option>
                        </select>
                    </div>

                    <div id="wali-kelas-wrapper" style="display:none;" class="form-control">
                        <label class="label">
                            <span class="label-text">Wali Kelas</span>
                        </label>
                        <select name="wali_kelas_id" class="select select-bordered w-full">
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" @selected(old('wali_kelas_id') == $k->id)>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-3 pt-4 sm:flex-row sm:justify-end">
                        <a href="{{ route('admin.guru.index') }}" class="btn btn-ghost sm:btn-sm">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const jabatan = document.getElementById('jabatan');
            const wali = document.getElementById('wali-kelas-wrapper');

            if (jabatan && wali) {
                const toggleWaliKelas = () => {
                    const value = jabatan.value.trim().toLowerCase();

                    if (value === 'wali kelas') {
                        wali.style.display = 'block';
                    } else {
                        wali.style.display = 'none';
                        const select = wali.querySelector('select');
                        if (select) select.value = '';
                    }
                };

                jabatan.addEventListener('change', toggleWaliKelas);
                jabatan.addEventListener('input', toggleWaliKelas);

                toggleWaliKelas();
            }

        });

        function previewFoto(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {

                    const SIZE = 300;
                    const minSize = Math.min(img.width, img.height);
                    const sx = (img.width - minSize) / 2;
                    const sy = (img.height - minSize) / 2;

                    const canvas = document.createElement('canvas');
                    canvas.width = SIZE;
                    canvas.height = SIZE;
                    const ctx = canvas.getContext('2d');

                    ctx.drawImage(img, sx, sy, minSize, minSize, 0, 0, SIZE, SIZE);

                    const croppedBase64 = canvas.toDataURL('image/jpeg', 0.9);

                    const preview = document.getElementById('preview-foto');
                    preview.src = croppedBase64;
                    preview.classList.remove('hidden');

                    document.getElementById('upload-placeholder').classList.add('hidden');
                    document.getElementById('foto_cropped').value = croppedBase64;
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    </script>
@endsection
