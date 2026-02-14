@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <div class="w-full px-6 mt-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="icon-[tabler--users] size-5"></span>
                    <h1 class="text-lg font-semibold">Prestasi</h1>
                </div>
            </div>
        </div>
        <main class="mx-auto w-full max-w-[1280px] flex-1 grow space-y-6 p-6">
            <div class="rounded-box shadow-base-300/10 bg-base-100 w-full pb-2 shadow-md">
                <div class="flex items-center justify-between px-6 py-4">
                    <a href="{{ route('admin.prestasi.create') }}"
                        class="btn btn-sm btn-primary inline-flex items-center gap-2">
                        <span class="icon-[tabler--plus] size-4"></span>
                        Tambah Prestasi
                    </a>
                </div>
                @if ($prestasi->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prestasi as $p)
                                    <tr>
                                        <td>{{ $p->judul }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $p->status === 'publish' ? 'badge-success' : 'badge-ghost' }}">
                                                {{ $p->status }}
                                            </span>
                                        </td>
                                        <td>{{ $p->tanggal ? \Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') : '-' }}
                                        </td>
                                        <td class="flex gap-1">
                                            <a href="{{ route('admin.prestasi.edit', $p->id) }}"
                                                class="btn btn-circle btn-text btn-sm" title="Edit">
                                                <span class="icon-[tabler--pencil] size-5"></span>
                                            </a>

                                            <form action="{{ route('admin.prestasi.destroy', $p->id) }}" method="POST"
                                                id="delete-form-{{ $p->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="hapus({{ $p->id }})"
                                                    class="btn btn-circle btn-text btn-sm">
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
                        <p class="text-sm mb-4">Belum ada Prestasi</p>
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
