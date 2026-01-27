@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <!-- Content -->
        <div class="w-full px-6 mt-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 2h6a2 2 0 0 1 2 2v2H7V4a2 2 0 0 1 2-2z" />
                        <path d="M7 6H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-2" />
                        <path d="M9 13l2 2 4-4" />
                    </svg>
                    <h1 class="text-lg font-semibold">Data Penilaian</h1>
                </div>
            </div>
        </div>

        <main class="mx-auto w-full max-w-[1280px] flex-1 grow space-y-6 p-6">
            <div class="rounded-box shadow-base-300/10 bg-base-100 w-full pb-2 shadow-md">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Jumlah Mapel</th>
                                <th>Jumlah Siswa</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>
                                    <button class="btn btn-sm btn-text flex items-center gap-1" aria-label="Lihat data">
                                        <span class="icon-[tabler--eye] size-5"></span>
                                        <span class="sm:inline">Lihat</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
