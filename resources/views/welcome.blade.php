@extends('layout.main')
@section('content')
    <main>
        <section id="home">
            <div
                class="gap-18 md:pt-45 flex flex-col justify-between bg-[url('../../img/free-layer-blur.png')] bg-cover bg-center bg-no-repeat py-8 sm:py-16 md:gap-24 lg:py-24">
                <div
                    class="mx-auto flex max-w-7xl flex-col items-center gap-6 justify-self-center px-4 text-center sm:px-6 lg:px-8">
                    <h1
                        class="text-base-content z-1 relative text-5xl font-bold leading-[1.15] max-md:text-2xl md:max-w-3xl">
                        <span>
                            Yayasan Darul Istiqlal
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="348" height="10" viewBox="0 0 348 10"
                            fill="none" class="-z-1 left-25 absolute -bottom-1.5 max-lg:left-4 max-md:hidden">
                            <path
                                d="M1.85645 8.23715C62.4821 3.49284 119.04 1.88864 180.031 1.88864C225.103 1.88864 275.146 1.32978 319.673 4.85546C328.6 5.24983 336.734 6.33887 346.695 7.60269"
                                stroke="url(#paint0_linear_17052_181397)" stroke-width="2" stroke-linecap="round" />
                            <defs>
                                <linearGradient id="paint0_linear_17052_181397" x1="29.7873" y1="1.85626" x2="45.2975"
                                    y2="69.7387" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="var(--color-primary)" />
                                    <stop offset="1" stop-color="var(--color-primary-content)" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </h1>
                    <p class="text-base-content/80 max-w-3xl">Yayasan Darul Istiqlal Madrasah Darussalam merupakan lembaga
                        dakwah berbasis pendidikan. Lebih dari setengah abad, Yayasan ini telah mempresentasikan sistem
                        sekolah sehari penuh sebagai terobosan pendidikan bagi Indonesia</p>
                </div>
                <img src="{{ asset('assets/img/smp.png') }}" alt="Dishes" class="min-h-67 w-full object-cover" />
            </div>
        </section>
        <section id="about-us">
            <div class="bg-base-200 py-8 sm:py-16 lg:py-24">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col gap-12 md:gap-16 lg:gap-24">
                        <!-- Header section -->
                        <div class="space-y-4 text-center">
                            <h2 class="text-base-content text-2xl font-semibold md:text-3xl lg:text-4xl">Tentang Kami
                            </h2>
                            <p class="text-base-content/80 text-xl">Our achievement story stands as a powerful
                                testament to teamwork and perseverance. United, we have faced challenges, celebrated
                                victories, and woven a narrative of growth and success.</p>
                            <a href="#" class="btn btn-primary btn-lg btn-gradient">
                                Read More
                                <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
                            </a>
                        </div>
                        <!-- Video player and stats -->
                        <div
                            class="lg:h-161 relative mb-8 h-full w-full rounded-xl max-lg:space-y-6 sm:mb-24 lg:mb-32 pb-28 lg:pb-36">
                            <img src="../assets/img/restaurant-about-us.png" alt="about-us"
                                class="h-full w-full rounded-xl object-cover" />
                            <!-- Stats card overlapping the video section -->
                            <div
                                class="bg-base-100 border-base-content/20 rounded-xl lg:-bottom-25 intersect:motion-preset-fade intersect:motion-opacity-0 intersect:motion-duration-800 grid gap-5 border px-10 py-14 sm:py-16 lg:absolute lg:left-1/2 lg:w-3/4 lg:-translate-x-1/2 lg:grid-cols-2 xl:w-max">

                                <!-- Visi -->
                                <div class="flex flex-col items-center justify-center gap-4 text-center">
                                    <h3 class="text-lg font-semibold text-base-content">Visi</h3>
                                    <p class="text-base-content/80 leading-relaxed max-w-xl">
                                        Terciptanya anak didik yang
                                        <span class="font-medium text-base-content">
                                            bertaqwa, berakhlakul karimah, cerdas, dan terampil
                                        </span>.
                                    </p>
                                </div>
                                <!-- Misi -->
                                <div class="flex flex-col items-center justify-center gap-4 text-center">
                                    <h3 class="text-lg font-semibold text-base-content">Misi</h3>
                                    <ol
                                        class="list-decimal list-inside space-y-2 text-base-content/80 leading-relaxed max-w-xl">
                                        <li>
                                            Melaksanakan pembelajaran aktif, kreatif, efektif, dan menyenangkan (PAKEM).
                                        </li>
                                        <li>
                                            Memberikan bimbingan dan pembinaan untuk mengembangkan potensi serta kreativitas
                                            anak didik.
                                        </li>
                                        <li>
                                            Meningkatkan penghayatan dan pengamalan nilai-nilai agama, moral, dan budaya.
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="prestasi">
            <div class="bg-base-100 py-8 sm:py-16 lg:py-24">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <!-- Section Header -->
                    <div class="mb-12 space-y-4 text-center sm:mb-16 lg:mb-24">
                        <h2 class="text-base-content text-2xl font-semibold md:text-3xl lg:text-4xl">Galeri Karya dan
                            Prestasi Siswa</h2>
                        <p class="text-base-content/80 text-xl">Menyinari Bakat dan Prestasi Siswa Kami, Melihat Karya
                            Hebat yang Mencerminkan Potensi Terbesar Generasi Masa Depan.</p>
                    </div>
                    <!-- Blog Grid -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Blog Card 1 -->
                        @foreach ($prestasi as $p)
                            <div class="card shadow-none h-full">
                                <div class="grid grid-cols-[auto,1fr] gap-4 p-4">

                                    <figure class="h-24 w-36 sm:h-28 sm:w-40 overflow-hidden rounded-xl bg-base-200">
                                        @if ($p->gambar)
                                            <img src="{{ asset('storage/' . $p->gambar) }}"
                                                class="h-full w-full object-cover">
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
                    </div>
                </div>
            </div>
        </section>
        <section id="berita">
            <div class="bg-base-100 relative h-full py-8 sm:py-16 lg:py-24">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <span
                        class="intersect:motion-preset-slide-right intersect:motion-duration-800 intersect:motion-opacity-0 intersect:motion-delay-600 absolute start-[15%]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="102" height="120" viewBox="0 0 102 120"
                            fill="none">
                            <g opacity="0.06">
                                <!-- Badan tanda seru -->
                                <path
                                    d="M54 14C60.5 14 66 19.5 66 26V68C66 74.5 60.5 80 54 80C47.5 80 42 74.5 42 68V26C42 19.5 47.5 14 54 14Z"
                                    fill="var(--color-primary)" fill-opacity="0.5" />
                                <!-- Titik tanda seru -->
                                <path
                                    d="M54 92C59.5228 92 64 96.4772 64 102C64 107.523 59.5228 112 54 112C48.4772 112 44 107.523 44 102C44 96.4772 48.4772 92 54 92Z"
                                    fill="var(--color-primary)" />
                            </g>
                        </svg>

                    </span>
                    <span
                        class="intersect:motion-preset-slide-right intersect:motion-duration-800 intersect:motion-opacity-0 intersect:motion-delay-1200 absolute end-[15%] sm:max-md:end-[5%]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="118" height="119" viewBox="0 0 118 119"
                            fill="none">
                            <g opacity="0.05">
                                <path
                                    d="M36.4391 42.706C36.2091 42.1358 33.0723 19.7058 60.7168 12.1988C79.3118 7.1492 100.433 13.8137 106.922 29.8927C111.431 41.0682 105.143 50.3678 95.1291 58.2748C91.6043 61.1299 92.769 64.3566 94.2875 68.1195L96.8646 74.5057L76.4101 80.0602L71.3941 67.6302C69.3693 62.6128 67.9605 58.4399 72.2047 53.6183C77.9718 47.1176 84.8999 44.8567 81.6326 36.7601C79.4237 31.2864 73.3964 28.6212 67.8178 30.1361C58.8925 32.5598 57.3147 40.5801 57.9297 45.854L36.4391 42.706ZM108.7 92.9284C111.6 100.113 107.624 107.645 99.6907 109.799C91.8806 111.92 83.2115 107.821 80.3124 100.637C77.3672 93.339 81.3425 85.8064 89.1526 83.6856C97.0862 81.5312 105.755 85.6303 108.7 92.9284Z"
                                    fill="var(--color-primary)" fill-opacity="0.5" />
                                <path d="M95.8779 81.1625L88.4385 83.2969L98.2235 108.915L105.663 106.78L95.8779 81.1625Z"
                                    fill="var(--color-primary)" fill-opacity="0.5" />
                                <path
                                    d="M43.8796 40.5732C43.6495 40.003 40.5127 17.573 68.1572 10.066C86.7523 5.01639 107.874 11.6809 114.362 27.7599C118.872 38.9354 112.583 48.235 102.569 56.1421C99.0444 58.9972 100.209 62.2239 101.728 65.9868L104.305 72.3729L83.8502 77.9275L78.8342 65.4975C76.8094 60.48 75.4007 56.3072 79.6448 51.4856C85.412 44.9848 92.3401 42.724 89.0727 34.6274C86.8639 29.1537 80.8365 26.4884 75.2579 28.0033C66.3327 30.427 64.7548 38.4474 65.3699 43.7212L43.8796 40.5732ZM116.141 90.7956C119.04 97.98 115.064 105.512 107.131 107.667C99.3207 109.788 90.6516 105.689 87.7525 98.5046C84.8073 91.2062 88.7826 83.6737 96.5927 81.5528C104.527 79.3983 113.196 83.4976 116.141 90.7956Z"
                                    fill="var(--color-primary)" />
                                <path d="M35.8188 44.1504L43.2582 42.0161L65.2665 44.5151L57.8274 46.6493L35.8188 44.1504Z"
                                    fill="var(--color-primary)" fill-opacity="0.4" />
                            </g>
                        </svg>
                    </span>
                    <div class="mb-12 space-y-4 text-wrap text-center sm:mb-16 lg:mb-24">
                        <h2 class="text-base-content text-2xl font-semibold md:text-3xl lg:text-4xl">Berita Terkini</h2>
                        <p class="text-base-content/80 text-xl">Berbagai Informasi Menarik seputar Pendidikan, Inovasi, dan
                            Perkembangan Terbaru di Sekolah Kami.</p>
                        <div class="card-action mt-10 text-center">
                            <a href="{{ route('berita.list') }}" class="btn btn-primary btn-gradient">
                                Show More
                            </a>
                        </div>
                    </div>
                    <div id="berita-carousel-1"
                        data-carousel='{ "loadingClasses": "opacity-0",  "slidesQty": { "xs": 1, "md": 2, "lg": 3 } }'
                        class="relative w-full">
                        <div class="flex gap-1">
                            <!-- Previous Slide -->
                            <button
                                class="btn btn-circle carousel-prev btn-outline btn-primary hover:bg-primary relative hover:text-white "
                                disabled="disabled">
                                <span class="icon-[tabler--arrow-left] size-5.5"></span>
                            </button>
                            <div class="carousel rounded-box">
                                <div class="carousel-body h-full gap-12 opacity-0">
                                    @foreach ($berita as $b)
                                        <div class="carousel-slide m-2">
                                            <div class="overflow-hidden h-full shadow-none">
                                                <figure class="relative h-40 overflow-hidden bg-base-200 rounded-xl">
                                                    @if ($b->gambar)
                                                        <img src="{{ asset('storage/' . $b->gambar) }}"
                                                            class="rounded-xl h-full w-full object-cover">
                                                    @endif
                                                </figure>

                                                <div class="card-body gap-3 p-5">
                                                    <h3
                                                        class="text-base-content text-lg font-medium leading-snug line-clamp-2">
                                                        <a href="{{ route('berita.show', $b->slug) }}"
                                                            class="group inline-block hover:text-primary transition">
                                                            <span
                                                                class="bg-gradient-to-r from-primary to-primary bg-[length:0%_2px] bg-left-bottom bg-no-repeat transition-all duration-300 group-hover:bg-[length:100%_2px]">
                                                                {{ $b->judul }}
                                                            </span>
                                                        </a>
                                                    </h3>

                                                    <p class="text-xs text-base-content/60">
                                                        {{ \Carbon\Carbon::parse($b->created_at)->translatedFormat('d F Y') }}
                                                    </p>
                                                    <p class="line-clamp-3 text-base-content/80">
                                                        {{ Str::limit(strip_tags($b->isi), 100) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Next Slide -->
                            <button
                                class="btn btn-circle carousel-next btn-primary btn-outline hover:bg-primary relative hover:text-white ">
                                <span class="icon-[tabler--arrow-right] size-5.5"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="bg-base-200 py-8 sm:py-16 lg:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div id="multi-slide" data-carousel='{ "loadingClasses": "opacity-0", "slidesQty": { "xs": 1, "md": 2 } }'
                    class="relative flex w-full gap-12 max-lg:flex-col md:gap-16 lg:items-center lg:gap-24">
                    <div>
                        <div class="space-y-4">
                            <h2 class="text-base-content text-2xl font-semibold md:text-3xl lg:text-4xl">Guru Kami</h2>
                            <p class="text-base-content/80 text-xl">Tenaga pendidik profesional di sekolah kami</p>
                            <div class="flex gap-4">
                                <button
                                    class="btn btn-square btn-sm carousel-prev btn-primary carousel-disabled:opacity-100 carousel-disabled:btn-outline relative hover:text-white"
                                    disabled="disabled">
                                    <span class="icon-[tabler--arrow-left] size-5"></span>
                                </button>
                                <button
                                    class="btn btn-square btn-sm carousel-next btn-primary carousel-disabled:opacity-100 carousel-disabled:btn-outline relative hover:text-white">
                                    <span class="icon-[tabler--arrow-right] size-5"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="carousel rounded-box">
                        <div class="carousel-body gap-6 opacity-0">
                            <!-- Slide 1 -->
                            @foreach ($guru as $g)
                                <div class="carousel-slide">
                                    <div
                                        class="card card-border hover:border-primary transition-border h-full shadow-none duration-300">
                                        <div class="card-body gap-5">
                                            <!-- User Info -->
                                            <div class="flex items-center gap-3">
                                                <div class="avatar">
                                                    <div class="size-10 rounded-full">
                                                        @if ($g->foto)
                                                            <img src="{{ asset('storage/' . $g->foto) }}"
                                                                alt="{{ $g->nama_guru }}"
                                                                class="h-full w-full object-cover">
                                                        @else
                                                            <div
                                                                class="flex h-full items-center justify-center text-base-content/40">
                                                                <span class="icon-[tabler--user] size-10"></span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="text-base-content font-medium">{{ $g->nama_guru }}</h4>
                                                    <p class="text-base-content/80 text-sm">
                                                        {{ ucfirst($g->jabatan ?? 'Guru') }}</p>
                                                </div>
                                            </div>
                                            <!-- Content -->
                                            <p class="text-base-content/80">Chef Marilyn’s signature curry is
                                                hands-down the best I’ve ever had. The flavors are bold and
                                                unforgettable!”</p>
                                            <div class="card-actions">
                                                <a href="{{ route('page.guru-show', $g->id) }}"
                                                    class="btn btn-primary btn-gradient">
                                                    Read More
                                                    <span class="icon-[tabler--arrow-right] size-4"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="contact-us">
            <div class="bg-base-200 py-8 sm:py-16 lg:py-24">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <!-- Heading Section -->
                    <div class="mb-12 text-center text-white sm:mb-16 lg:mb-24">
                        <h2 class="text-base-content mb-4 text-2xl font-semibold md:text-3xl lg:text-4xl">Kontak Kami</h2>
                        <p class="text-base-content/80 text-xl">Whether you're planning a casual dinner or a
                            special celebration, we're here to make your experience seamless.</p>
                    </div>
                    <div class="card shadow-md">
                        <div class="card-body grid gap-10 lg:grid-cols-7">
                            <!-- Form Section -->
                            <div class="lg:col-span-4">
                                <h2 class="text-base-content mb-6 text-3xl font-semibold">Kritik & Saran</h2>
                                <form class="space-y-6" onsubmit="return false;">
                                    <div class="flex gap-6 max-md:flex-col">
                                        <div class="w-full">
                                            <label class="label-text" for="username">Your Name</label>
                                            <div class="input input-lg">
                                                <input type="text" class="grow"
                                                    placeholder="Enter your name here..." id="username" />
                                                <span
                                                    class="icon-[tabler--user] text-base-content/80 size-5.5 my-auto ms-3 shrink-0"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="label-text" for="usermessage">Message</label>
                                        <div class="textarea">
                                            <textarea class="grow resize-none" aria-label="Textarea" placeholder="Enter your message" id="usermessage"></textarea>
                                            <span
                                                class="icon-[tabler--message-circle-2] text-base-content/80 mx-4 mt-2 size-6 shrink-0"></span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-gradient w-full">Send Your Message</button>
                                </form>
                            </div>
                            <!-- Contact Information -->
                            <div class="space-y-6 lg:col-span-3">
                                <div class="border-base-content/20 rounded-box border p-6 text-center">
                                    <h3 class="text-base-content mb-4 text-xl font-semibold">Email/Phone</h3>
                                    <p class="text-base-content/80 mb-2 break-all">johndoe@gmail.com</p>
                                    <p class="text-base-content/80">+148 589 2001 2466</p>
                                </div>
                                <div class="border-base-content/20 rounded-box border p-6 text-center">
                                    <h3 class="text-base-content mb-4 text-xl font-semibold">Our Location</h3>
                                    <p class="text-base-content/80">Office 149,</p>
                                    <p class="text-base-content/80">450 South Brand Brooklyn</p>
                                    <p class="text-base-content/80">San Diego County,</p>
                                    <p class="text-base-content/80">CA 91905, USA</p>
                                </div>
                                <p class="text-base-content text-center font-medium">
                                    Opening Hours
                                    <span class="text-primary">9AM - 11PM</span>
                                    Everyday
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
