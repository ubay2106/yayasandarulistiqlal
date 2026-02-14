@extends('layout.main')

@section('content')
    <div class="bg-base-100 py-10 sm:py-16">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

            <article class="card bg-base-100 shadow-xl overflow-hidden">
                @if ($prestasi->gambar)
                    <!-- Framed Image (tidak full layar) -->
                    <figure class="relative mx-auto mt-6 w-full max-w-3xl overflow-hidden rounded-2xl shadow-lg">
                        <div class="relative h-[220px] sm:h-[280px] md:h-[340px]">
                            <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="{{ $prestasi->judul }}"
                                class="h-full w-full object-cover object-center transition-transform duration-700 ease-out hover:scale-105" />
                        </div>

                        <!-- Date Badge -->
                        <div
                            class="absolute bottom-3 left-3 rounded-full bg-base-100/90 px-4 py-1 text-xs font-medium shadow backdrop-blur">
                            {{ \Carbon\Carbon::parse($prestasi->tanggal ?? $prestasi->created_at)->translatedFormat('d F Y') }}
                        </div>
                    </figure>
                @endif


                <div class="card-body space-y-4">
                    <h1 class="text-2xl sm:text-3xl font-bold">
                        {{ $prestasi->judul }}
                    </h1>
                    <p class="text-xs text-base-content/60">
                        {{ \Carbon\Carbon::parse($prestasi->tanggal ?? $prestasi->created_at)->translatedFormat('d F Y') }}
                    </p>
                    <div class="prose max-w-none">
                        {!! nl2br(e($prestasi->deskripsi)) !!}
                    </div>

                    <div class="mt-6 flex flex-wrap items-center justify-between gap-4 border-t pt-6">
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-ghost">
                            ← Kembali
                        </a>
                        <span class="text-xs text-base-content/60">
                        Dipublikasikan oleh Admin
                    </span>
                    </div>
                </div>
            </article>

        </div>
    </div>
@endsection
