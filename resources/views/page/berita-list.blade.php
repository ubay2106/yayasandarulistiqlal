@extends('layout.main')
@section('content')
    <section id="berita">
        <div class="bg-base-100 py-8 sm:py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="mb-12 space-y-4 text-center sm:mb-16 lg:mb-24">
                    <h2 class="text-base-content text-2xl font-semibold md:text-3xl lg:text-4xl">Berita Kami</h2>
                    <p class="text-base-content/80 text-xl">Berbagai Informasi Menarik seputar Pendidikan, Inovasi, dan Perkembangan Terbaru di Sekolah Kami.</p>
                </div>
                <!-- Blog Grid -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($berita as $b)
                        <div class="card shadow-none h-full">
                            <div class="grid grid-cols-[auto,1fr] gap-4 p-4">

                                <figure class="h-24 w-36 sm:h-28 sm:w-40 overflow-hidden rounded-xl bg-base-200">
                                    @if ($b->gambar)
                                        <img src="{{ asset('storage/' . $b->gambar) }}" class="h-full w-full object-cover">
                                    @endif
                                </figure>

                                <div class="grid grid-rows-[auto,auto,1fr] gap-2 min-h-[140px]">

                                    <h5 class="text-lg font-semibold leading-snug line-clamp-2">
                                        <a href="{{ route('berita.show', $b->slug) }}"
                                            class="group inline-block hover:text-primary transition">
                                            <span
                                                class="bg-gradient-to-r from-primary to-primary
                                   bg-[length:0%_2px] bg-left-bottom bg-no-repeat
                                   transition-all duration-300 group-hover:bg-[length:100%_2px]">
                                                {{ $b->judul }}
                                            </span>
                                        </a>
                                    </h5>

                                    <p class="text-sm text-base-content/60">
                                        {{ \Carbon\Carbon::parse($b->created_at)->translatedFormat('d F Y') }}
                                    </p>

                                    <p class="text-sm text-base-content/80 line-clamp-3">
                                        {{ Str::limit(strip_tags($b->isi), 120) }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
