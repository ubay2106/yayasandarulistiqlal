@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <!-- Content -->
        <div class="w-full px-6 mt-12">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 5h6a2 2 0 0 1 2 2v12H5a2 2 0 0 1-2-2V5z" />
                        <path d="M13 7h6a2 2 0 0 1 2 2v10h-8V7z" />
                        <path d="M13 7V5a2 2 0 0 1 2-2h4" />
                    </svg>
                    <h1 class="text-lg font-semibold">Data Mata Pelajaran</h1>
                </div>

                <div class="flex items-center gap-2">
                    <a href="" class="btn btn-sm btn-primary inline-flex items-center gap-2">
                        <span class="icon-[tabler--plus] size-4"></span>
                        Tambah Mapel
                    </a>
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
                                <th>Mata Pelajaran</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Coding</td>
                                <td>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--pencil] size-5"></span></button>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--trash] size-5"></span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
