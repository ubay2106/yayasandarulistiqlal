@extends('layout.main')

@section('content')
    <div class="mx-auto max-w-4xl p-4 sm:p-6 lg:p-8">
        <article class="card bg-base-100 shadow-md">
            @if ($berita->gambar)
                <figure class="h-64 overflow-hidden">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" class="h-full w-full object-cover">
                </figure>
            @endif

            <div class="card-body space-y-3">
                <p class="text-xs text-base-content/60">
                    {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                </p>

                <h1 class="text-2xl font-bold">
                    {{ $berita->judul }}
                </h1>

                <div class="prose max-w-none">
                    {!! nl2br(e($berita->isi)) !!}
                </div>

                <a href="{{ url('/') }}" class="btn btn-sm btn-ghost">← Kembali</a>
            </div>
        </article>
    </div>
@endsection
