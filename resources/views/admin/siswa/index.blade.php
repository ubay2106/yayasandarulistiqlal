@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <!-- Content -->
        <div class="w-full px-6 mt-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="icon-[tabler--users] size-5"></span>
                    <h1 class="text-lg font-semibold">Data Siswa</h1>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-sm text-base-content/70">Filter Kelas:</span>
                    <select class="select select-sm select-bordered w-140px">
                        <option>Semua</option>
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
            </div>
        </div>

        <main class="mx-auto w-full max-w-[1280px] flex-1 grow space-y-6 p-6">

            <div class="rounded-box shadow-base-300/10 bg-base-100 w-full pb-2 shadow-md">

                <div class="flex items-center justify-between px-6 py-4">
                    <a href="{{ route('admin.siswa.create') }}"
                        class="btn btn-sm btn-primary inline-flex items-center gap-2">
                        <span class="icon-[tabler--plus] size-4"></span>
                        Tambah Siswa
                    </a>
                </div>

                @if ($siswa->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $i => $s)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $s->nis }}</td>
                                        <td>{{ $s->nama_siswa }}</td>
                                        <td>{{ $s->kelas->nama_kelas }}</td>
                                        <td class="flex items-center gap-2">
                                            <a href="{{ route('admin.siswa.edit', $s->id) }}"
                                                class="btn btn-circle btn-text btn-sm tooltip" data-tip="Edit Siswa">
                                                <span class="icon-[tabler--pencil] size-5"></span>
                                            </a>

                                            <form id="delete-form-{{ $s->id }}"
                                                action="{{ route('admin.siswa.destroy', $s->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="hapus({{ $s->id }})"
                                                    class="btn btn-circle btn-text btn-sm tooltip" data-tip="Hapus">
                                                    <span class="icon-[tabler--trash] size-5"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-16 text-base-content/60">
                        <span class="icon-[tabler--users-off] size-12 mb-3"></span>
                        <p class="text-sm mb-4">Belum ada data siswa</p>
                    </div>
                @endif

            </div>

        </main>
    </div>
    <script>
        function hapus(id) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Data siswa akan dihapus!',
                icon: 'warning',

                // 🔥 RESPONSIVE SETTINGS
                width: '80%', // mobile friendly
                padding: '1.25rem',
                heightAuto: false,

                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',

                // tombol besar & mudah disentuh
                buttonsStyling: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',

                // fokus ke tombol aman
                focusCancel: true,

                // animasi ringan (mobile smooth)
                showClass: {
                    popup: 'swal2-show'
                },
                hideClass: {
                    popup: 'swal2-hide'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
