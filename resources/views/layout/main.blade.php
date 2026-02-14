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
        <header id="site-header" class="border-base-content/20 bg-base-100 py-px fixed top-0 z-10 w-full border-b">
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
                            <a href="{{ url('/') }}" class="hover:text-primary nav-link">Home</a>
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
                                    <a href="{{ route('pendidikan.ra') }}"
                                        class="px-4 py-2 hover:text-primary lg:hover:bg-base-200 rounded whitespace-nowrap">
                                        RA Darussalam
                                    </a>
                                    <a href=""
                                        class="px-4 py-2 hover:text-primary lg:hover:bg-base-200 rounded whitespace-nowrap">
                                        MI Darussalam
                                    </a>
                                    <a href=""
                                        class="px-4 py-2 hover:text-primary lg:hover:bg-base-200 rounded whitespace-nowrap">
                                        MTs Darussalam
                                    </a>
                                </div>
                            </details>
                            <a href="{{ route('prestasi.list') }}" class="hover:text-primary nav-link">Prestasi</a>
                            <a href="{{ route('berita.list') }}" class="hover:text-primary nav-link">Berita</a>
                            <a href="#galeri" class="hover:text-primary nav-link">Galeri</a>
                        </div>
                    </div>
                    <div class="navbar-end max-lg:hidden">

                        @guest
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

        <div id="page-content" class="w-full">
            <div class="mx-auto w-full max-w-none px-[10vw]">
                @yield('content')
            </div>
        </div>

        <footer>
            <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8">
                <div class="flex items-center justify-center gap-3">
                    <a href="https://discord.com/invite/kBHkY7DekX" target="_blank" rel="noopener noreferrer"
                        aria-label="Discord">
                        <span class="icon-[tabler--brand-discord] size-5"></span>
                    </a>
                    <a href="https://x.com/flyonui" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                        <span class="icon-[tabler--brand-x] size-5"></span>
                    </a>
                    <a href="https://github.com/themeselection/flyonui" target="_blank" rel="noopener noreferrer"
                        aria-label="Github">
                        <span class="icon-[tabler--brand-github] size-5"></span>
                    </a>
                </div>
            </div>

            <div class="divider"></div>

            <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                <div class="text-base-content text-center text-base">
                    &copy;2026
                    <a href="" class="text-primary">Yayasan Darul Istiqlal</a>
                    <br class="md:hidden" />
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
    <script>
        function offsetContentByHeader() {
            const header = document.getElementById('site-header');
            const content = document.getElementById('page-content');

            if (!header || !content) return;

            const height = header.offsetHeight;
            content.style.paddingTop = height + 'px';
        }

        window.addEventListener('load', offsetContentByHeader);
        window.addEventListener('resize', offsetContentByHeader);

        document.addEventListener('click', function(e) {
            if (e.target.closest('[data-collapse]')) {
                setTimeout(offsetContentByHeader, 300);
            }
        });
    </script>
</body>

</html>
