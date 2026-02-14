@extends('layout.main')

@section('content')
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="md:col-span-1">
                <div class="card bg-base-100 shadow-md">
                    <figure class="p-5">
                        @if ($guru->foto)
                            <img src="{{ asset('storage/' . $guru->foto) }}"
                                 class="mx-auto h-48 w-48 rounded-xl object-cover shadow">
                        @else
                            <div class="mx-auto flex h-48 w-48 items-center justify-center rounded-2xl bg-base-200">
                                <span class="icon-[tabler--user] size-16 text-base-content/40"></span>
                            </div>
                        @endif
                    </figure>

                    <div class="card-body text-center space-y-1 pt-0">
                        <h1 class="text-xl font-bold">{{ $guru->nama_guru }}</h1>
                        <p class="text-sm text-base-content/70">
                            {{ ucfirst($guru->jabatan ?? 'Guru') }}
                        </p>

                        @if ($guru->waliKelas)
                            <span class="badge badge-outline badge-primary mt-2">
                                Wali Kelas {{ $guru->waliKelas->nama_kelas }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- KANAN: DETAIL LENGKAP --}}
            <div class="md:col-span-2">
                <div class="card bg-base-100 shadow-md">
                    <div class="card-body space-y-4">

                        <h2 class="text-lg font-semibold border-b pb-2">
                            Informasi Guru
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-base-content/60">NIP</p>
                                <p class="font-medium">{{ $guru->nip ?? '-' }}</p>
                            </div>

                            <div>
                                <p class="text-base-content/60">Tanggal Lahir</p>
                                <p class="font-medium">
                                    {{ $guru->tanggal_lahir
                                        ? \Carbon\Carbon::parse($guru->tanggal_lahir)->translatedFormat('d F Y')
                                        : '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-base-content/60">Jabatan</p>
                                <p class="font-medium">{{ ucfirst($guru->jabatan) }}</p>
                            </div>

                            <div>
                                <p class="text-base-content/60">Wali Kelas</p>
                                <p class="font-medium">
                                    {{ $guru->waliKelas->nama_kelas ?? 'Tidak' }}
                                </p>
                            </div>
                        </div>

                        {{-- (Opsional) Mapel yang Diajar --}}
                        @if (method_exists($guru, 'pengajar') && $guru->pengajar->isNotEmpty())
                            <div>
                                <p class="text-base-content/60 mb-1">Mata Pelajaran</p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($guru->pengajar as $p)
                                        <span class="badge badge-ghost">
                                            {{ $p->mapel->nama_mapel }} ({{ $p->kelas->nama_kelas }})
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="pt-4">
                            <a href="{{ url('/') }}" class="btn btn-sm btn-outline">
                                <span class="icon-[tabler--arrow-left] size-4"></span>
                                Kembali
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
