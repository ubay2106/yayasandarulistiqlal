@extends('layout.app')

@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <main class="mx-auto w-full max-w-7xl flex-1 p-4 sm:p-6 lg:p-8">

            <div class="mb-6 flex items-center gap-2">
                <span class="icon-[tabler--book] size-6 text-primary"></span>
                <h1 class="text-xl font-semibold">Data Mata Pelajaran</h1>
            </div>

            <div class="rounded-box bg-base-100 shadow-md p-4 sm:p-6 lg:p-8 space-y-6">

                <form action="{{ route('admin.mapel.store') }}" method="POST" class="flex gap-3 max-w-md">
                    @csrf

                    <input type="text" name="nama_mapel" class="input input-bordered w-full"
                        placeholder="Nama Mata Pelajaran" value="{{ old('nama_mapel') }}" required>

                    <button class="btn btn-primary">Tambah</button>
                </form>
                @if ($mapel->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mata Pelajaran</th>
                                    <th class="text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mapel as $i => $m)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $m->nama_mapel }}</td>
                                        <td class="text-right space-x-2">

                                            <form action="{{ route('admin.mapel.update', $m->id) }}" method="POST"
                                                class="inline-flex items-center gap-2">
                                                @csrf
                                                @method('PUT')

                                                <input type="text" name="nama_mapel"
                                                    class="input input-bordered input-sm" value="{{ $m->nama_mapel }}"
                                                    required>

                                                <button type="submit" class="btn btn-circle btn-text btn-sm"
                                                    title="Update">
                                                    <span class="icon-[tabler--pencil] size-5"></span>
                                                </button>
                                            </form>

                                            <form id="delete-mapel-{{ $m->id }}"
                                                action="{{ route('admin.mapel.destroy', $m->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn btn-circle btn-text btn-sm"
                                                    onclick="hapusMapel({{ $m->id }})" title="Hapus">
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
                    <div class="text-center text-base-content/60 py-10">
                        <span class="icon-[tabler--database-off] size-10 mx-auto mb-3 block"></span>
                        <p class="text-sm">Belum ada mata pelajaran</p>
                    </div>
                @endif   
            </div>
        </main>
    </div>

    {{-- SWEETALERT HAPUS --}}
    <script>
        function hapusMapel(id) {
            Swal.fire({
                title: 'Yakin?',
                text: 'Mata pelajaran akan dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                width: '80%',
                heightAuto: false
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-mapel-' + id).submit();
                }
            });
        }
    </script>
@endsection
