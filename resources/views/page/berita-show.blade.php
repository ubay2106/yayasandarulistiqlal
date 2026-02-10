@extends('layout.main')

@section('content')
        <div class="mx-auto max-w-5xl p-6 sm:p-8 lg:p-10">
            <article class="card bg-base-100 shadow-xl overflow-hidden">

                @if ($berita->gambar)
                    <figure class="p-2 sm:p-4">
                        <div class="relative overflow-hidden rounded-2xl">
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                class="h-[280px] w-full object-cover transition-transform duration-300 hover:scale-105"
                                alt="{{ $berita->judul }}">
                        </div>
                    </figure>
                @endif

                <div class="card-body space-y-4 pt-0">

                    <div class="flex flex-wrap items-center gap-3 text-xs text-base-content/60">
                        <span class="badge badge-outline">
                            {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                        </span>
                        <span class="badge badge-outline">Berita</span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-bold leading-tight">
                        {{ $berita->judul }}
                    </h1>

                    <div class="divider my-2"></div>

                    <div class="prose prose-base max-w-none">
                        {!! nl2br(e($berita->isi)) !!}
                    </div>

                    <div class="pt-4">
                        <a href="{{ url('/') }}" class="btn btn-sm btn-ghost gap-2">
                            <span class="icon-[tabler--arrow-left] size-4"></span>
                            Kembali
                        </a>
                    </div>
                </div>
            </article>
        </div>
@endsection
