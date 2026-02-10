@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <div class="w-full px-6 mt-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="icon-[tabler--users] size-5"></span>
                    <h1 class="text-lg font-semibold">Berita</h1>
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
                    <a href="{{ route('admin.berita.create') }}"
                        class="btn btn-sm btn-primary inline-flex items-center gap-2">
                        <span class="icon-[tabler--plus] size-4"></span>
                        Tambah Berita
                    </a>
                </div>
                @if ($berita->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($berita as $b)
                                    <tr>
                                        <td>{{ $b->judul }}</td>
                                        <td>{{ $b->status }}</td>
                                        <td>{{ $b->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="flex flex-col items-center justify-center py-16 text-base-content/60">
                        <span class="icon-[tabler--users-off] size-12 mb-3"></span>
                        <p class="text-sm mb-4">Belum ada Berita</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
@endsection
