@extends('layout.main')

@section('content')
    <div class="bg-base-100 py-8 sm:py-16 lg:py-10">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6 lg:px-8">
            <div class="mb-8 text-center">
                <h1 class="text-2xl sm:text-3xl font-bold">Semua Prestasi</h1>
                <p class="text-base-content/70 mt-2">
                    Kumpulan prestasi siswa dan sekolah kami
                </p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($prestasi as $p)
                    <div class="card shadow-none h-full">
                        <div class="grid grid-cols-[auto,1fr] gap-4 p-4">

                            <figure class="h-24 w-36 sm:h-28 sm:w-40 overflow-hidden rounded-xl bg-base-200">
                                @if ($p->gambar)
                                    <img src="{{ asset('storage/' . $p->gambar) }}" class="h-full w-full object-cover">
                                @endif
                            </figure>

                            <div class="grid grid-rows-[auto,auto,1fr] gap-2 min-h-[140px]">

                                <h5 class="text-lg font-semibold leading-snug line-clamp-2">
                                    <a href="{{ route('prestasi.show', $p->id) }}"
                                        class="group inline-block hover:text-primary transition">
                                        <span
                                            class="bg-gradient-to-r from-primary to-primary
                                   bg-[length:0%_2px] bg-left-bottom bg-no-repeat
                                   transition-all duration-300 group-hover:bg-[length:100%_2px]">
                                            {{ $p->judul }}
                                        </span>
                                    </a>
                                </h5>

                                <p class="text-sm text-base-content/60">
                                    {{ \Carbon\Carbon::parse($p->tanggal)->translatedFormat('d F Y') }}
                                </p>

                                <p class="text-sm text-base-content/80 line-clamp-3">
                                    {{ Str::limit(strip_tags($p->deskripsi), 80) }}
                                </p>

                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="mt-10">
                    {{ $prestasi->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
