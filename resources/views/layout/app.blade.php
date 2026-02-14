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
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/cropperjs@1.6.2/dist/cropper.min.css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('asset/dist/libs/apexcharts/dist/apexcharts.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/dist/libs/flyonui/src/vendor/apexcharts.css') }}" />

    <!-- build:css -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/output.css') }}" />

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
                    'dashboard-free': {
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
    <!-- Layout wrapper -->
    <div class="bg-base-200 flex min-h-screen flex-col">
        @php
            $dataMasterActive = request()->routeIs(
                'admin.siswa.*',
                'admin.guru.*',
                'admin.kelas.*',
                'admin.mapel.*',
                'admin.pengajar.*',
            );
            $penilaianActive = request()->routeIs('guru.nilai.*');
        @endphp

        <!-- ---------- HEADER ---------- -->
        <div class="bg-base-100 border-base-content/20 lg:ps-75 sticky top-0 z-50 flex border-b">
            <div class="mx-auto w-full max-w-7xl">
                <nav class="navbar py-2">
                    <!-- LEFT -->
                    <div class="navbar-start items-center gap-2">
                        <button type="button" class="btn btn-soft btn-square btn-sm lg:hidden" aria-haspopup="dialog"
                            aria-expanded="false" aria-controls="layout-sidebar" data-overlay="#layout-sidebar">
                            <span class="icon-[tabler--menu-2] size-4.5"></span>
                        </button>

                        <div class="flex items-center gap-3">
                            <img src="{{ asset('asset/img/logo.png') }}" alt="Logo Darussalam"
                                style="height:45px; width:auto; display:block; max-height:45px;">
                            <div class="flex flex-col leading-none">
                                <span class="text-xs font-medium uppercase leading-none">
                                    YAYASAN
                                </span>
                                <span class="text-sm sm:text-lg font-bold leading-none whitespace-nowrap">
                                    DARUL ISTIQLAL
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="navbar-end gap-6">
                        <!-- PROFILE DROPDOWN -->
                        <div class="dropdown relative inline-flex [--offset:21]">
                            <button id="profile-dropdown" type="button" class="dropdown-toggle avatar"
                                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">

                                <!-- AVATAR NAVBAR -->
                                <span class="size-8 rounded-full overflow-hidden">
                                    @if (auth()->user()->role === 'guru' && auth()->user()->guru && auth()->user()->guru->foto)
                                        <img src="{{ asset('storage/' . auth()->user()->guru->foto) }}" alt="Foto Guru"
                                            class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-full h-full text-primary" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12 2.25a4.5 4.5 0 100 9
                                           4.5 4.5 0 000-9zM4.5 20.25a7.5
                                           7.5 0 1115 0v-.75H4.5v.75z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </span>
                            </button>

                            <!-- DROPDOWN MENU -->
                            <ul class="dropdown-menu dropdown-open:opacity-100 max-w-75 hidden w-full space-y-0.5"
                                role="menu" aria-orientation="vertical" aria-labelledby="profile-dropdown">

                                <!-- HEADER -->
                                <li class="dropdown-header pt-4.5 mb-1 gap-4 px-5 pb-3.5">
                                    <div class="avatar avatar-online-top">
                                        <div class="size-10 rounded-full overflow-hidden">
                                            @if (auth()->user()->role === 'guru' && auth()->user()->guru && auth()->user()->guru->foto)
                                                <img src="{{ asset('storage/' . auth()->user()->guru->foto) }}"
                                                    alt="Foto Guru" class="w-full h-full object-cover">
                                            @else
                                                <svg class="w-full h-full text-primary"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd" d="M12 2.25a4.5 4.5 0 100 9
                                                   4.5 4.5 0 000-9zM4.5 20.25a7.5
                                                   7.5 0 1115 0v-.75H4.5v.75z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </div>
                                    </div>

                                    <div>
                                        <h6 class="text-base-content mb-0.5 font-semibold">
                                            @if (auth()->user()->role === 'guru' && auth()->user()->guru)
                                                {{ auth()->user()->guru->nama_guru }}
                                            @else
                                                {{ auth()->user()->username }}
                                            @endif
                                        </h6>
                                    </div>
                                </li>

                                <!-- SETTING -->
                                <li>
                                    <a class="dropdown-item px-3" href="#">
                                        <span class="icon-[tabler--settings] size-5"></span>
                                        Setting
                                    </a>
                                </li>

                                <!-- LOGOUT -->
                                <li class="dropdown-footer p-2 pt-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-text btn-error btn-block h-11 justify-start px-3 font-normal">
                                            <span class="icon-[tabler--logout] size-5"></span>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- ---------- END HEADER ---------- -->

        <!-- Layout Menu -->

        <!-- Menu -->
        <aside id="layout-sidebar"
            class="overlay overlay-open:translate-x-0 drawer drawer-start sm:w-75 inset-y-0 start-0 hidden h-full [--auto-close:lg] lg:z-50 lg:block lg:translate-x-0 lg:shadow-none"
            aria-label="Sidebar" tabindex="-1">
            <div class="drawer-body border-base-content/20 h-full border-e p-0">
                <div class="flex h-full max-h-full flex-col">
                    <button type="button" class="btn btn-text btn-circle btn-sm absolute end-3 top-3 lg:hidden"
                        aria-label="Close" data-overlay="#layout-sidebar">
                        <span class="icon-[tabler--x] size-4.5"></span>
                    </button>
                    <div
                        class="text-base-content border-base-content/20 flex flex-col items-center gap-4 border-b px-4 py-6">
                        <div class="avatar">
                            <div class="size-17 rounded-full overflow-hidden">
                                @if (auth()->user()->role === 'guru' && auth()->user()->guru && auth()->user()->guru->foto)
                                    <img src="{{ asset('storage/' . auth()->user()->guru->foto) }}" alt="Foto Guru"
                                        class="w-full h-full object-cover">
                                @else
                                    <svg class="w-14 h-14 text-primary mb-3 mx-auto"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M12 2.25a4.5 4.5 0 100 9 4.5 4.5 0 000-9zM4.5 20.25a7.5 7.5 0 1115 0v-.75H4.5v.75z"
                                            clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </div>
                        </div>

                        <div class="text-center">
                            <h3 class="text-base-content text-lg font-semibold">
                                @if (auth()->user()->role === 'guru' && auth()->user()->guru)
                                    {{ auth()->user()->guru->nama_guru }}
                                @else
                                    {{ auth()->user()->username }}
                                @endif
                            </h3>
                        </div>
                    </div>
                    <div class="h-full overflow-y-auto">
                        @role('admin')
                            <ul class="accordion menu menu-sm gap-1 p-3">
                                <!-- Accordion Menu Item (Level 0) -->
                                <li>
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="inline-flex w-full items-center p-2 text-sm font-normal hover:bg-neutral/10 {{ request()->routeIs('admin.dashboard') ? 'menu-active' : '' }}">
                                        <span class="icon-[tabler--dashboard] size-4.5"></span>
                                        <span class="ms-2 grow">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.berita.index') }}"
                                        class="inline-flex w-full items-center gap-2 p-2 text-sm font-normal hover:bg-neutral/10 {{ request()->routeIs('admin.berita.*') ? 'menu-active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 shrink-0"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                                            <rect x="6" y="7" width="4" height="4"></rect>
                                            <path d="M12 8h6"></path>
                                            <path d="M12 12h6"></path>
                                            <path d="M6 14h12"></path>
                                        </svg>
                                        <span class="ms-2 grow">Berita</span>
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('admin.prestasi.index') }}"
                                        class="inline-flex w-full items-center gap-2 p-2 text-sm font-normal hover:bg-neutral/10 {{ request()->routeIs('admin.prestasi.*') ? 'menu-active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="size-5">
                                            <path
                                                d="M18 4h2a1 1 0 0 1 1 1c0 3.866-2.239 7-5 7h-.071A6.002 6.002 0 0 1 13 14.91V17h2a1 1 0 1 1 0 2H9a1 1 0 1 1 0-2h2v-2.09A6.002 6.002 0 0 1 8.071 12H8c-2.761 0-5-3.134-5-7a1 1 0 0 1 1-1h2V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v1Zm-2 0H8v4a4 4 0 0 0 8 0V4ZM6 6H4.07C4.372 8.307 5.64 10 8 10V8a6.01 6.01 0 0 1-2-2Zm12 0a6.01 6.01 0 0 1-2 2v2c2.36 0 3.628-1.693 3.93-4H18Z" />
                                        </svg>

                                        <span class="ms-2 grow">Prestasi</span>
                                    </a>

                                </li>
                                <li class="accordion-item" id="">
                                    <button
                                        class="accordion-toggle inline-flex w-full items-center p-2 text-start text-sm font-normal"
                                        aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path
                                                d="M3 7a2 2 0 0 1 2-2h5l2 2h7a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z" />
                                            <path d="M8 11h3" />
                                            <path d="M8 15h3" />
                                            <path d="M14 11h3" />
                                            <path d="M14 15h3" />
                                        </svg>
                                        <span class="ms-2 grow">Data Master</span>
                                        <span
                                            class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4.5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                    </button>
                                    <div id="account-settings-collapse-account-settings"
                                        class="accordion-content mt-1 w-full overflow-hidden transition-[height] duration-300 {{ $dataMasterActive ? '' : 'hidden' }}"
                                        aria-labelledby="" role="region">
                                        <ul class="space-y-1">
                                            <!-- Simple Link Item (for nested items) -->
                                            <li>
                                                <a href="{{ route('admin.siswa.index') }}"
                                                    class="inline-flex w-full items-center px-2 {{ request()->routeIs('admin.siswa.*') ? 'menu-active' : '' }}">
                                                    <span>Data Siswa</span>
                                                </a>
                                            </li>

                                            <!-- Simple Link Item (for nested items) -->
                                            <li>
                                                <a href="{{ route('admin.guru.index') }}"
                                                    class="inline-flex w-full items-center px-2 {{ request()->routeIs('admin.guru.*') ? 'menu-active' : '' }}">
                                                    <span>Data Guru</span>
                                                </a>
                                            </li>

                                            <!-- Simple Link Item (for nested items) -->
                                            <li>
                                                <a href="{{ route('admin.kelas.index') }}"
                                                    class="inline-flex w-full items-center px-2 {{ request()->routeIs('admin.kelas.*') ? 'menu-active' : '' }}">
                                                    <span>Data Kelas</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.mapel.index') }}"
                                                    class="inline-flex w-full items-center px-2 {{ request()->routeIs('admin.mapel.*') ? 'menu-active' : '' }}">
                                                    <span>Data Mapel</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.pengajar.index') }}"
                                                    class="inline-flex w-full items-center px-2 {{ request()->routeIs('admin.pengajar.*') ? 'menu-active' : '' }}">
                                                    <span>Data Pengajar</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <a href="{{ route('admin.rekap.rekap-kelas') }}"
                                        class="inline-flex w-full items-center p-2 text-sm font-normal hover:bg-neutral/10 {{ request()->routeIs('admin.rekap.*') ? 'menu-active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M9 2h6a2 2 0 0 1 2 2v2H7V4a2 2 0 0 1 2-2z" />
                                            <path
                                                d="M7 6H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-2" />
                                            <path d="M9 13l2 2 4-4" />
                                        </svg>
                                        <span class="ms-2 grow">Data Penilaian</span>
                                    </a>
                                </li>
                            </ul>
                        @endrole

                        @role('guru')
                            <ul class="accordion menu menu-sm gap-1 p-3">
                                <!-- Accordion Menu Item (Level 0) -->
                                <li>
                                    <a href="{{ route('guru.dashboard') }}"
                                        class="inline-flex w-full items-center p-2 text-sm font-normal hover:bg-neutral/10 {{ request()->routeIs('guru.dashboard') ? 'menu-active' : '' }}">
                                        <span class="icon-[tabler--dashboard] size-4.5"></span>
                                        <span class="ms-2 grow">Dashboard</span>
                                    </a>
                                </li>
                                <li class="accordion-item" id="">
                                    <button
                                        class="accordion-toggle inline-flex w-full items-center p-2 text-start text-sm font-normal"
                                        aria-expanded="true">
                                        <span class="icon-[tabler--chart-bar] size-4.5"></span>
                                        <span class="ms-2 grow">Penilaian</span>
                                        <span
                                            class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4.5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
                                    </button>
                                    <div id="account-settings-collapse-account-settings"
                                        class="accordion-content mt-1 w-full overflow-hidden transition-[height] duration-300 {{ $penilaianActive ? '' : 'hidden' }}"
                                        aria-labelledby="" role="region">
                                        <ul class="space-y-1">
                                            <!-- Simple Link Item (for nested items) -->
                                            <li>
                                                <a href="{{ route('guru.nilai.index') }}"
                                                    class="inline-flex w-full items-center px-2 {{ request()->routeIs('guru.nilai.index') ? 'menu-active' : '' }}">
                                                    <span>Input Nilai</span>
                                                </a>
                                            </li>

                                            <!-- Simple Link Item (for nested items) -->
                                            <li>
                                                <a href="{{ route('guru.nilai.rekap') }}"
                                                    class="inline-flex w-full items-center px-2 {{ request()->routeIs('guru.nilai.rekap') ? 'menu-active' : '' }}">
                                                    <span>Rekap Nilai</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        @endrole
                    </div>
                </div>
            </div>
        </aside>
        <!-- / Menu -->

        <!-- Layout Container -->
        @yield('content')
        <!-- / Layout Container -->

    </div>
    <!-- / Layout Wrapper -->

    <!-- Vendors JS -->
    <script src="{{ asset('asset/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('asset/dist/libs/flyonui/dist/helper-apexcharts.js') }}"></script>

    <!-- FlyonUI JS -->
    <script src="{{ asset('asset/dist/libs/flyonui/flyonui.js') }}"></script>

    <!-- Theme Utils JS -->
    <script src="{{ asset('asset/dist/js/theme-utils.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('asset/dist/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    toast: true,
                    position: 'top',
                    timer: 2500,
                    showConfirmButton: false,
                    width: '60%',
                    padding: '0.75rem'
                });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    html: `
            <div style="text-align:center;">
                <ul style="
                    display: inline-block;
                    text-align: left;
                    padding-left: 18px;
                    margin: 0;
                ">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        `,
                    width: '90%',
                    maxWidth: '420px',
                    confirmButtonText: 'Perbaiki',
                    heightAuto: false
                });
            });
        </script>
    @endif

    @if ($errors->has('delete'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Tidak Bisa Dihapus',
                    text: '{{ $errors->first('delete') }}',
                    confirmButtonText: 'Mengerti',
                    confirmButtonColor: '#dc2626',
                    width: '85%',
                    heightAuto: false
                });
            });
        </script>
    @endif


    <script src="https://unpkg.com/cropperjs@1.6.2/dist/cropper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('asset/dist/js//common-dashboard-free.js') }}"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

    <button id="scrollToTopBtn"
        class="btn btn-circle btn-soft btn-secondary/20 bottom-15 end-15 motion-preset-slide-right motion-duration-800 motion-delay-100 fixed absolute z-3 hidden"
        aria-label="Circle Soft Icon Button"><span class="icon-[tabler--chevron-up] size-5 shrink-0"></span>
    </button>
</body>

</html>
