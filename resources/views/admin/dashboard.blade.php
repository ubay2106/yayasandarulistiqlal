@extends('layout.app')
@section('content')
    <div class="lg:ps-75 flex grow flex-col">
        <!-- Content -->
        <main class="mx-auto w-full max-w-[1280px] flex-1 grow space-y-6 p-6">
            <!-- Stats -->
            <div class="shadow-base-300/10 rounded-box bg-base-100 flex gap-4 p-6 shadow-md max-xl:flex-col">
                <div class="flex flex-1 gap-4 max-sm:flex-col">
                    <div class="flex flex-1 flex-col gap-4">
                        <div class="text-base-content flex items-center gap-2">
                            <div class="avatar avatar-placeholder">
                                <div class="bg-base-200 rounded-field size-9">
                                    <span class="icon-[tabler--users] size-5"></span>
                                </div>
                            </div>
                            <h5 class="text-lg font-medium">Jumlah Siswa</h5>
                        </div>
                        <div>
                            <div class="text-base-content text-xl font-semibold">{{ $jumlahSiswa }}</div>
                        </div>
                    </div>
                    <div class="divider sm:divider-horizontal"></div>
                    <div class="flex flex-1 flex-col gap-4">
                        <div class="text-base-content flex items-center gap-2">
                            <div class="avatar avatar-placeholder">
                                <div class="bg-base-200 rounded-field size-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z" />
                                        <path d="M5 13v5c0 1 3 3 7 3s7-2 7-3v-5" />
                                    </svg>
                                </div>
                            </div>
                            <h5 class="text-lg font-medium">Jumlah Guru</h5>
                        </div>
                        <div>
                            <div class="text-base-content text-xl font-semibold">{{ $jumlahGuru }}</div>
                        </div>
                    </div>
                </div>
                <div class="divider xl:divider-horizontal"></div>
                <div class="flex flex-1 gap-4 max-sm:flex-col">
                    <div class="flex flex-1 flex-col gap-4">
                        <div class="text-base-content flex items-center gap-2">
                            <div class="avatar avatar-placeholder">
                                <div class="bg-base-200 rounded-field size-9">
                                    <span class="icon-[tabler--chart-bar] size-5"></span>
                                </div>
                            </div>
                            <h5 class="text-lg font-medium">Jumlah Kelas</h5>
                        </div>
                        <div>
                            <div class="text-base-content text-xl font-semibold">{{ $jumlahKelas }}</div>
                        </div>
                    </div>
                    <div class="divider sm:divider-horizontal"></div>
                    <div class="flex flex-1 flex-col gap-4">
                        <div class="text-base-content flex items-center gap-2">
                            <div class="avatar avatar-placeholder">
                                <div class="bg-base-200 rounded-field size-9">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M3 5h6a2 2 0 0 1 2 2v12H5a2 2 0 0 1-2-2V5z" />
                                        <path d="M13 7h6a2 2 0 0 1 2 2v10h-8V7z" />
                                        <path d="M13 7V5a2 2 0 0 1 2-2h4" />
                                    </svg>
                                </div>
                            </div>
                            <h5 class="text-lg font-medium">Jumlah Mapel</h5>
                        </div>
                        <div>
                            <div class="text-base-content text-xl font-semibold">{{ $jumlahMapel }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Payment Status Table -->
            <div class="rounded-box shadow-base-300/10 bg-base-100 w-full pb-2 shadow-md">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>johndoe@example.com</td>
                                <td><span class="badge badge-soft badge-success text-xs">Professional</span></td>
                                <td>March 1, 2024</td>
                                <td>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--pencil] size-5"></span></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>janesmith@example.com</td>
                                <td><span class="badge badge-soft badge-error text-xs">Rejected</span></td>
                                <td>March 2, 2024</td>
                                <td>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--pencil] size-5"></span></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Alice Johnson</td>
                                <td>alicejohnson@example.com</td>
                                <td><span class="badge badge-soft badge-info text-xs">Applied</span></td>
                                <td>March 3, 2024</td>
                                <td>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--pencil] size-5"></span></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Bob Brown</td>
                                <td>bobrown@example.com</td>
                                <td><span class="badge badge-soft badge-warning text-xs">Current</span></td>
                                <td>March 4, 2024</td>
                                <td>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--pencil] size-5"></span></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Alice Carter</td>
                                <td>alicecarter@example.com</td>
                                <td><span class="badge badge-soft badge-success text-xs">Professional</span></td>
                                <td>March 28, 2024</td>
                                <td>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--pencil] size-5"></span></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Tony Spark</td>
                                <td>tonyspark@example.com</td>
                                <td><span class="badge badge-soft badge-info text-xs">Applied</span></td>
                                <td>July 28, 2024</td>
                                <td>
                                    <button class="btn btn-circle btn-text btn-sm" aria-label="Action button"><span
                                            class="icon-[tabler--pencil] size-5"></span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- / Content -->

    </div>
@endsection
