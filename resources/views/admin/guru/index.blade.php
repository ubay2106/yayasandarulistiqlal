@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <!-- Content -->
        <div class="w-full px-6 mt-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="icon-[tabler--users] size-5"></span>
                    <h1 class="text-lg font-semibold">Data Guru</h1>
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
                    <a href="{{ route('admin.guru.create') }}"
                        class="btn btn-sm btn-primary inline-flex items-center gap-2">
                        <span class="icon-[tabler--plus] size-4"></span>
                        Tambah Guru
                    </a>
                </div>
                @if ($guru->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Username</th>
                                    <th>Jabatan</th>
                                    <th>Wali Kelas</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru as $i => $g)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>
                                            @if ($g->foto)
                                                <img src="{{ asset('storage/' . $g->foto) }}"
                                                    class="h-11 w-11 rounded-lg object-cover cursor-pointer hover:ring-2 hover:ring-primary border"
                                                    onclick="window.open(this.src, '_blank')">
                                            @else
                                                <div
                                                    class="h-11 w-11 rounded-full bg-base-300 flex items-center justify-center">
                                                    <span class="icon-[tabler--user] size-6 text-base-content/40"></span>
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $g->nip }}</td>
                                        <td>{{ $g->nama_guru }}</td>
                                        <td>
                                            {{ $g->tanggal_lahir ? \Carbon\Carbon::parse($g->tanggal_lahir)->format('d-m-Y') : '-' }}
                                        </td>
                                        <td>{{ $g->user->username }}</td>
                                        <td>{{ $g->jabatan }}</td>
                                        <td>{{ optional($g->waliKelas)->nama_kelas ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('admin.guru.edit', $g->id) }}"
                                                class="btn btn-circle btn-text btn-sm tooltip mt-2" data-tip="Edit Siswa">
                                                <span class="icon-[tabler--pencil] size-5"></span>
                                            </a>
                                            <form id="delete-form-{{ $g->id }}"
                                                action="{{ route('admin.guru.destroy', $g->id) }}" method="POST"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="hapus({{ $g->id }})"
                                                    class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                                        class="icon-[tabler--trash] size-5"></span></button>
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
                        <p class="text-sm mb-4">Belum ada data Guru</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
    <script>
        function hapus(id) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Data guru akan dihapus!',
                icon: 'warning',

                width: '80%', // mobile friendly
                padding: '1.25rem',
                heightAuto: false,

                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',

                buttonsStyling: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',

                focusCancel: true,

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
