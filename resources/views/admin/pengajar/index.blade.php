@extends('layout.app')

@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">

            <h1 class="text-xl font-semibold mb-4">Data Pengajar</h1>

            <form action="{{ route('admin.pengajar.store') }}" method="POST"
                class="grid grid-cols-1 sm:grid-cols-4 gap-3 mb-6">
                @csrf
                <select name="guru_id" class="select select-bordered" required>
                    <option value="">Guru</option>
                    @foreach ($guru as $g)
                        <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                    @endforeach
                </select>

                <select name="mapel_id" class="select select-bordered" required>
                    <option value="">Mapel</option>
                    @foreach ($mapel as $m)
                        <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                    @endforeach
                </select>

                <select name="kelas_id" class="select select-bordered" required>
                    <option value="">Kelas</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                    @endforeach
                </select>

                <button class="btn btn-primary">Tambah</button>
            </form>

            @if ($pengajar->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Guru</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengajar as $i => $p)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $p->guru->nama_guru }}</td>
                                    <td>{{ $p->mapel->nama_mapel }}</td>
                                    <td>{{ $p->kelas->nama_kelas }}</td>
                                    <td class="text-right space-x-2">
                                        <a href="{{ route('admin.pengajar.edit', $p->id) }}"
                                            class="btn btn-circle btn-text btn-sm tooltip mt-2" data-tip="Edit Pengajar">
                                            <span class="icon-[tabler--pencil] size-5"></span>
                                        </a>
                                        <form id="delete-form-{{ $p->id }}"
                                                action="{{ route('admin.pengajar.destroy', $p->id) }}" method="POST"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="hapus({{ $p->id }})"
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
                    <p class="text-sm mb-4">Belum ada data Pengajar</p>
                </div>
            @endif
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
