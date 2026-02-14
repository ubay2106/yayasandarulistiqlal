@extends('layout.main')

@section('content')
    {{-- Hero Section - RA Darussalam --}}
    <section class="bg-base-100 py-8 sm:py-12 lg:py-16">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6 lg:px-8">
            {{-- Gradient Card Container --}}
            <div class="from-primary/30 to-error/30 p-0.25 overflow-hidden rounded-3xl bg-gradient-to-r">
                <div class="bg-base-100 rounded-3xl p-0.5">
                    <div class="from-primary/6 to-error/6 relative rounded-3xl bg-gradient-to-r to-50% p-8 lg:p-16">
                        <div class="flex justify-between gap-8 max-md:flex-col max-sm:items-center max-sm:text-center md:items-center">
                            
                            {{-- Text Content --}}
                            <div class="max-w-xs space-y-4 lg:max-w-lg">
                                <h2 class="text-base-content text-xl font-bold md:text-3xl">
                                    RA DARUSSALAM
                                </h2>
                                
                                {{-- Logo - Mobile Only --}}
                                <img src="../assets/img/logo.png" 
                                     alt="Logo RA Darussalam"
                                     class="w-full max-w-[200px] mx-auto rounded-lg md:hidden" />
                                
                                <p class="text-base-content/80">
                                    Let us bring the flavors you love straight to your door. From classic comfort dishes 
                                    to chef-curated specials, every bite is made with care and delivered fresh. Skip the 
                                    wait — your next favorite meal is just a click away.
                                </p>
                            </div>
                            
                            {{-- Logo - Desktop Only --}}
                            <img src="../assets/img/logo.png" 
                                 alt="Logo RA Darussalam"
                                 class="intersect-once intersect:motion-preset-slide-down-lg intersect:motion-duration-800 
                                        intersect:motion-opacity-in-0 intersect:motion-delay-100 
                                        absolute end-0 top-0 h-full max-w-md rounded-br-3xl max-md:hidden" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Visi & Misi Section --}}
    <section class="bg-base-100 py-8 sm:py-12 lg:py-16">
        <div class="mx-auto max-w-[1280px] px-8 sm:px-6 lg:px-8">
            
            {{-- Section Title --}}
            <h2 class="text-base-content text-center text-2xl font-bold md:text-4xl mb-8 lg:mb-12">
                Visi & Misi RA Darussalam
            </h2>
            
            {{-- Visi Card --}}
            <div class="mb-6 lg:mb-8 px-4 sm:px-6 lg:px-8 
                        hero-animate opacity-0 translate-y-10 transition-all duration-700 ease-out" 
                 data-delay="100">
                <div class="bg-base-100 rounded-xl shadow-lg border border-base-300 overflow-hidden">
                    <div class="flex items-center gap-6 p-6 lg:p-8 max-md:flex-col">
                        
                        {{-- Visi Label --}}
                        <div class="flex-shrink-0">
                            <h3 class="text-primary text-3xl lg:text-4xl font-bold">
                                VISI
                            </h3>
                        </div>
                        
                        {{-- Visi Content --}}
                        <div class="flex-1 px-4">
                            <p class="text-base-content/80 text-sm lg:text-base">
                                Terwujudnya peserta didik berakhlak karimah, berprestasi optimal, dan berjiwa kompetitif
                                di tingkat global
                            </p>
                        </div>

                        {{-- Visi Image --}}
                        <div class="flex-shrink-0 max-md:w-full max-md:max-w-[200px] pr-4">
                            <img src="../assets/img/visi-image.png" 
                                 alt="Visi RA Darussalam"
                                 class="w-32 lg:w-40 max-md:mx-auto" />
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Misi Card --}}
            <div class="px-4 sm:px-6 lg:px-8
                        hero-animate opacity-0 translate-y-10 transition-all duration-700 ease-out" 
                 data-delay="300">
                <div class="bg-base-100 rounded-xl shadow-lg border border-base-300 overflow-hidden">
                    <div class="flex items-center gap-6 p-6 lg:p-8 max-md:flex-col">
                        
                        {{-- Misi Label --}}
                        <div class="flex-shrink-0">
                            <h3 class="text-success text-3xl lg:text-4xl font-bold">
                                MISI
                            </h3>
                        </div>
                        
                        {{-- Misi Content --}}
                        <div class="flex-1 px-4">
                            <p class="text-base-content/80 text-sm lg:text-base">
                                Melaksanakan proses pendidikan yang dapat menumbuhkembangkan peserta didik berakhlak
                                karimah. Melaksanakan kegiatan sekolah untuk mewujudkan peserta didik berprestasi
                                optimal. Melaksanakan proses pendidikan yang dapat mewujudkan peserta didik berjiwa
                                kompetitif di tingkat global
                            </p>
                        </div>
                        
                        {{-- Misi Image --}}
                        <div class="flex-shrink-0 max-md:w-full max-md:max-w-[200px] pr-4">
                            <img src="../assets/img/misi-image.png" 
                                 alt="Misi RA Darussalam"
                                 class="w-32 lg:w-40 max-md:mx-auto" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Program Unggulan Section --}}
    <section class="bg-base-200/50 py-8 sm:py-12 lg:py-16">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6 lg:px-8">
            
            {{-- Section Title --}}
            <h2 class="text-base-content text-center text-2xl font-bold md:text-4xl mb-8 lg:mb-12">
                Program Unggulan
            </h2>
            
            {{-- Programs Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                {{-- Program 1 --}}
                <div class="hero-animate opacity-0 translate-y-10 transition-all duration-700 ease-out" 
                     data-delay="100">
                    <div class="bg-base-100 rounded-xl shadow-lg border border-base-300 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6 space-y-4">
                            <div class="w-16 h-16 rounded-full bg-primary/10 flex items-center justify-center">
                                <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="text-base-content text-lg font-bold">
                                Tahfidz Al-Quran
                            </h3>
                            <p class="text-base-content/70 text-sm">
                                Program menghafal Al-Quran sejak dini dengan metode yang menyenangkan dan mudah dipahami anak
                            </p>
                        </div>
                    </div>
                </div>
                
                {{-- Program 2 --}}
                <div class="hero-animate opacity-0 translate-y-10 transition-all duration-700 ease-out" 
                     data-delay="200">
                    <div class="bg-base-100 rounded-xl shadow-lg border border-base-300 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6 space-y-4">
                            <div class="w-16 h-16 rounded-full bg-success/10 flex items-center justify-center">
                                <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                                </svg>
                            </div>
                            <h3 class="text-base-content text-lg font-bold">
                                Bilingual
                            </h3>
                            <p class="text-base-content/70 text-sm">
                                Pembelajaran Bahasa Arab dan Bahasa Inggris untuk mempersiapkan anak berkomunikasi global
                            </p>
                        </div>
                    </div>
                </div>
                
                {{-- Program 3 --}}
                <div class="hero-animate opacity-0 translate-y-10 transition-all duration-700 ease-out" 
                     data-delay="300">
                    <div class="bg-base-100 rounded-xl shadow-lg border border-base-300 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6 space-y-4">
                            <div class="w-16 h-16 rounded-full bg-warning/10 flex items-center justify-center">
                                <svg class="w-8 h-8 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                </svg>
                            </div>
                            <h3 class="text-base-content text-lg font-bold">
                                Kreativitas & Seni
                            </h3>
                            <p class="text-base-content/70 text-sm">
                                Mengembangkan kreativitas anak melalui seni, musik, dan berbagai kegiatan edukatif
                            </p>
                        </div>
                    </div>
                </div>
                
                {{-- Program 4 --}}
                <div class="hero-animate opacity-0 translate-y-10 transition-all duration-700 ease-out" 
                     data-delay="400">
                    <div class="bg-base-100 rounded-xl shadow-lg border border-base-300 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6 space-y-4">
                            <div class="w-16 h-16 rounded-full bg-error/10 flex items-center justify-center">
                                <svg class="w-8 h-8 text-error" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-base-content text-lg font-bold">
                                Pembentukan Karakter
                            </h3>
                            <p class="text-base-content/70 text-sm">
                                Membentuk akhlak mulia dan karakter Islami melalui pembiasaan sehari-hari
                            </p>
                        </div>
                    </div>
                </div>
                
                {{-- Program 5 --}}
                <div class="hero-animate opacity-0 translate-y-10 transition-all duration-700 ease-out" 
                     data-delay="500">
                    <div class="bg-base-100 rounded-xl shadow-lg border border-base-300 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6 space-y-4">
                            <div class="w-16 h-16 rounded-full bg-info/10 flex items-center justify-center">
                                <svg class="w-8 h-8 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                            <h3 class="text-base-content text-lg font-bold">
                                Stimulasi Motorik
                            </h3>
                            <p class="text-base-content/70 text-sm">
                                Mengoptimalkan perkembangan motorik halus dan kasar melalui permainan edukatif
                            </p>
                        </div>
                    </div>
                </div>
                
                {{-- Program 6 --}}
                <div class="hero-animate opacity-0 translate-y-10 transition-all duration-700 ease-out" 
                     data-delay="600">
                    <div class="bg-base-100 rounded-xl shadow-lg border border-base-300 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="p-6 space-y-4">
                            <div class="w-16 h-16 rounded-full bg-secondary/10 flex items-center justify-center">
                                <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-base-content text-lg font-bold">
                                Pembelajaran Sosial
                            </h3>
                            <p class="text-base-content/70 text-sm">
                                Melatih kemampuan bersosialisasi dan bekerja sama dengan teman sebaya
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Pendaftaran CTA Section --}}
    <section class="bg-gradient-to-r from-primary to-primary-focus py-12 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-6">
                <h2 class="text-white text-2xl md:text-4xl font-bold">
                    Daftarkan Putra-Putri Anda Sekarang!
                </h2>
                <p class="text-white/90 max-w-2xl mx-auto text-base md:text-lg">
                    Bergabunglah bersama kami untuk memberikan pendidikan terbaik dengan nilai-nilai Islami
                </p>
                <div class="flex gap-4 justify-center flex-wrap">
                    <a href="#" class="btn btn-primary btn-lg inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Formulir Pendaftaran
                    </a>
                    <a href="#" class="btn btn-outline btn-white btn-lg inline-flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Scroll Animation Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Konfigurasi Intersection Observer
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            // Callback untuk menghandle visibility changes
            const observerCallback = (entries, observer) => {
                entries.forEach(entry => {
                    const element = entry.target;
                    const delay = element.getAttribute('data-delay') || 0;

                    if (entry.isIntersecting) {
                        // Ketika elemen terlihat - jalankan animasi
                        setTimeout(() => {
                            element.classList.remove('opacity-0', 'translate-y-10');
                            element.classList.add('opacity-100', 'translate-y-0');
                        }, delay);
                    } else {
                        // Ketika elemen tidak terlihat - reset animasi
                        element.classList.remove('opacity-100', 'translate-y-0');
                        element.classList.add('opacity-0', 'translate-y-10');
                    }
                });
            };

            // Inisialisasi Observer
            const observer = new IntersectionObserver(observerCallback, observerOptions);

            // Observe semua elemen dengan class 'hero-animate'
            const animateElements = document.querySelectorAll('.hero-animate');
            animateElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
@endsection