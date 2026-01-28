<!doctype html>

<html lang="en" data-theme="light" dir="ltr" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Yayasan Darul Istiqlal</title>

    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Core CSS -->
    <!-- endbuild -->

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dist/libs/flatpickr/dist/flatpickr.css') }}" />

    <!-- build:css -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/output.css') }}" />

    <!-- Page CSS -->

    <!-- Theme JS -->
    <script type="text/javascript">
        (function() {
            try {
                const root = document.documentElement;
                const layoutPath = root.getAttribute('data-layout-path')?.replace('/', '') || 'dashboard-default';
                const localStorageKey = `${layoutPath}-theme`;

                // Theme configuration loaded from page-config.json at build time
                window.THEME_CONFIG = {
                    'free-landing-page': {
                        default: 'light',
                        light: 'light',
                        dark: 'dark',
                        system: {
                            light: 'light',
                            dark: 'dark'
                        }
                    }
                };

                // Get current system theme preference
                const getSystemPreference = () => window.matchMedia('(prefers-color-scheme: dark)').matches;

                // Resolve theme based on user selection and layout configuration
                const resolveTheme = (selectedTheme, layoutPath) => {
                    const layoutConfig = window.THEME_CONFIG[layoutPath];
                    if (!layoutConfig) return selectedTheme === 'system' ? (getSystemPreference() ? 'dark' :
                        'light') : selectedTheme;

                    if (selectedTheme === 'system') {
                        const systemConfig = layoutConfig.system;
                        const prefersDark = getSystemPreference();
                        return prefersDark ? systemConfig.dark : systemConfig.light;
                    }

                    return layoutConfig[selectedTheme] || selectedTheme || layoutConfig.default || 'light';
                };

                const savedTheme = localStorage.getItem(localStorageKey) || 'system';
                const resolvedTheme = resolveTheme(savedTheme, layoutPath);

                root.setAttribute('data-theme', resolvedTheme);
            } catch (e) {
                console.warn('Early theme script error:', e);
            }
        })();
    </script>
</head>

<body>

    <div class="bg-base-100">
        <!-- Navbar -->
        <header class="border-base-content/20 bg-base-100 py-px fixed top-0 z-10 w-full border-b">
            <nav class="navbar mx-auto max-w-7xl rounded-b-xl px-4 sm:px-6 lg:px-8">
                <div class="w-full lg:flex lg:items-center lg:gap-2">
                    <div class="navbar-start items-center justify-between max-lg:w-full">
                        <a class="text-base-content flex items-center gap-3 text-xl font-semibold" href="#">
                            <span class="text-primary">
                                <img src="{{ asset('asset/img/logo.png') }}" alt="Logo Darussalam"
                                    style="height:45px; width:auto; display:block; max-height:45px;">
                            </span>
                            <div class="flex flex-col leading-none">
                                <span class="text-xs font-medium uppercase leading-none">
                                    YAYASAN
                                </span>
                                <span class="text-sm sm:text-lg font-bold leading-none whitespace-nowrap">
                                    DARUL ISTIQLAL
                                </span>
                            </div>
                        </a>
                        <div class="flex items-center gap-5 lg:hidden">

                            @guest
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                                    Login
                                </a>
                            @endguest

                            @auth
                                {{-- SUDAH LOGIN --}}
                                <a href="
                            @if (auth()->user()->role === 'admin') {{ route('admin.dashboard') }}
                            @elseif(auth()->user()->role === 'guru') {{ route('guru.dashboard') }}
                            @else
                           # @endif "
                                    class="btn btn-primary btn-sm">
                                    Dashboard
                                </a>
                            @endauth

                            <button type="button" class="collapse-toggle btn btn-outline btn-secondary btn-square"
                                data-collapse="#navbar-block-4" aria-controls="navbar-block-4"
                                aria-label="Toggle navigation">
                                <span class="icon-[tabler--menu-2] collapse-open:hidden size-5.5"></span>
                                <span class="icon-[tabler--x] collapse-open:block size-5.5 hidden"></span>
                            </button>

                        </div>

                    </div>
                    <div id="navbar-block-4"
                        class="lg:navbar-center transition-height collapse hidden grow overflow-visible font-medium duration-300 lg:flex">
                        <div class="text-base-content flex gap-6 text-base max-lg:mt-4 max-lg:flex-col lg:items-center">
                            <a href="#home" class="hover:text-primary nav-link">Home</a>
                            <details class="relative">
                                <summary
                                    class="nav-link cursor-pointer flex items-center gap-1 list-none hover:text-primary">
                                    Pendidikan
                                    <svg class="size-4 transition-transform group-open:rotate-180"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </summary>
                                <div
                                    class="mt-2 flex flex-col gap-1 lg:absolute lg:left-0 lg:top-full lg:z-50 lg:min-w-[160px] lg:rounded-lg lg:bg-base-100 lg:shadow-lg lg:mt-2">
                                    <a href="" class="px-4 py-2 hover:text-primary lg:hover:bg-base-200 rounded whitespace-nowrap">
                                        RA Darussalam
                                    </a>
                                    <a href="" class="px-4 py-2 hover:text-primary lg:hover:bg-base-200 rounded whitespace-nowrap">
                                        MI Darussalam
                                    </a>
                                    <a href="" class="px-4 py-2 hover:text-primary lg:hover:bg-base-200 rounded whitespace-nowrap">
                                        MTs Darussalam
                                    </a>
                                </div>
                            </details>
                            <a href="" class="hover:text-primary nav-link">Berita</a>
                            <a href="#" class="hover:text-primary nav-link">Prestasi</a>
                            <a href="#" class="hover:text-primary nav-link">Galeri</a>
                            <a href="#" class="hover:text-primary nav-link">About Us</a>
                        </div>
                    </div>
                    <div class="navbar-end max-lg:hidden">

                        @guest
                            {{-- BELUM LOGIN --}}
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                Login
                            </a>
                        @endguest

                        @auth
                            {{-- SUDAH LOGIN --}}
                            <a href="
            @if (auth()->user()->role === 'admin') {{ route('admin.dashboard') }}
            @elseif(auth()->user()->role === 'guru')
                {{ route('guru.dashboard') }}
            @else
                # @endif
        "
                                class="btn btn-primary">
                                Dashboard
                            </a>
                        @endauth

                    </div>

                </div>
            </nav>
        </header>

        @yield('content')

        <footer>
            <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
                <div class="flex items-center justify-between gap-3 max-md:flex-col">
                    <a href="index.html" class="text-base-content flex items-center gap-3 text-xl font-semibold">
                        <span class="text-primary">
                            <svg width="32" height="32" viewBox="0 0 34 34" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_18078_104881)">
                                    <mask id="mask0_18078_104881" style="mask-type:luminance" maskUnits="userSpaceOnUse"
                                        x="0" y="0" width="34" height="34">
                                        <path
                                            d="M25.5 0H8.5C3.80558 0 0 3.80558 0 8.5V25.5C0 30.1944 3.80558 34 8.5 34H25.5C30.1944 34 34 30.1944 34 25.5V8.5C34 3.80558 30.1944 0 25.5 0Z"
                                            fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_18078_104881)">
                                        <path
                                            d="M25.5 0H8.5C3.80558 0 0 3.80558 0 8.5V25.5C0 30.1944 3.80558 34 8.5 34H25.5C30.1944 34 34 30.1944 34 25.5V8.5C34 3.80558 30.1944 0 25.5 0Z"
                                            fill="url(#paint0_linear_18078_104881)" />
                                        <path
                                            d="M16.1238 20.1522C16.511 19.662 17.2479 19.6428 17.66 20.1122L20.5526 23.41C21.1194 24.0563 20.6611 25.0689 19.8016 25.0692H14.3055C13.47 25.0692 13.0026 24.1059 13.5203 23.4501L16.1238 20.1522ZM16.1326 8.45497C16.5308 7.95801 17.286 7.95453 17.6883 8.44813L27.5164 20.5077C28.0488 21.161 27.5838 22.1395 26.741 22.1395H24.4442C24.1428 22.1395 23.8577 22.0034 23.6678 21.7694L17.7029 14.4188C17.2962 13.9175 16.5285 13.927 16.1346 14.4384L10.7303 21.454C10.5411 21.6996 10.2484 21.8435 9.9383 21.8436H7.4881C6.64925 21.8436 6.18332 20.8733 6.70783 20.2186L16.1326 8.45497Z"
                                            fill="url(#paint1_linear_18078_104881)" />
                                    </g>
                                    <path
                                        d="M25.5002 0.707886H8.50017C4.19695 0.707886 0.708496 4.19634 0.708496 8.49956V25.4996C0.708496 29.8028 4.19695 33.2912 8.50017 33.2912H25.5002C29.8034 33.2912 33.2918 29.8028 33.2918 25.4996V8.49956C33.2918 4.19634 29.8034 0.707886 25.5002 0.707886Z"
                                        stroke="url(#paint2_linear_18078_104881)" stroke-width="2" />
                                </g>
                                <defs>
                                    <linearGradient id="paint0_linear_18078_104881" x1="30.2812" y1="2.65625"
                                        x2="4.25" y2="32.4063" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="currentColor" />
                                        <stop offset="1" stop-color="currentColor" />
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_18078_104881" x1="17.1147" y1="8.08008"
                                        x2="17.1147" y2="25.0692" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="white" />
                                        <stop offset="1" stop-color="white" stop-opacity="0.6" />
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_18078_104881" x1="17.0002" y1="-0.000447931"
                                        x2="17.0002" y2="33.9996" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="white" stop-opacity="0.28" />
                                        <stop offset="1" stop-color="white" stop-opacity="0.04" />
                                    </linearGradient>
                                    <clipPath id="clip0_18078_104881">
                                        <rect width="34" height="34" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>

                        <span>Darussalam</span>
                    </a>
                    <nav class="flex items-center gap-6">
                        <a href="#about-us" class="link link-animated text-base-content/80 font-medium">About</a>
                        <a href="#services" class="link link-animated text-base-content/80 font-medium">Services</a>
                        <a href="#team" class="link link-animated text-base-content/80 font-medium">Team</a>
                        <a href="#faq" class="link link-animated text-base-content/80 font-medium">FAQ</a>
                    </nav>
                    <div class="text-base-content flex h-5 gap-4">
                        <a href="https://discord.com/invite/kBHkY7DekX" target="_blank" rel="noopener noreferrer"
                            aria-label="Discord">
                            <span class="icon-[tabler--brand-discord] size-5"></span>
                        </a>
                        <a href="https://x.com/flyonui" target="_blank" rel="noopener noreferrer"
                            aria-label="Twitter">
                            <span class="icon-[tabler--brand-x] size-5"></span>
                        </a>
                        <a href="https://github.com/themeselection/flyonui" target="_blank" rel="noopener noreferrer"
                            aria-label="Github">
                            <span class="icon-[tabler--brand-github] size-5"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                <div class="text-base-content text-center text-base">
                    &copy;2026
                    <a href="" class="text-primary">DARUSSALAM</a>
                    ,
                    <br class="md:hidden" />
                    Made With Masby
                </div>
            </div>
        </footer>
    </div>

    <!-- Vendors JS -->
    <script src="../assets/dist/libs/tailwindcss-intersect/dist/observer.min.js"></script>
    <script src="../assets/dist/libs/flatpickr/dist/flatpickr.js"></script>

    <!-- FlyonUI JS -->
    <script src="../assets/dist/libs/flyonui/flyonui.js"></script>

    <!-- Theme Utils JS -->
    <script src="../assets/dist/js/theme-utils.js"></script>

    <!-- Main JS -->
    <script src="../assets/dist/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/dist/js/landing-page-free.js"></script>

    <button id="scrollToTopBtn"
        class="btn btn-circle btn-soft btn-secondary/20 bottom-15 end-15 motion-preset-slide-right motion-duration-800 motion-delay-100 absolute z-3 hidden"
        aria-label="Circle Soft Icon Button"><span class="icon-[tabler--chevron-up] size-5 shrink-0"></span></button>
</body>

</html>
