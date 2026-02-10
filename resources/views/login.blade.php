<!doctype html>

<html lang="en" data-theme="light" data-assets-path="../assets/" dir="ltr" class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Darussalam</title>

    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Core CSS -->
    <!-- endbuild -->

    <!-- Vendor CSS -->

    <!-- build:css -->
    <link rel="stylesheet" href="../assets/dist/css/output.css" />

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
    <!-- Content -->

    <div class="flex min-h-screen justify-center px-4 sm:px-6 pt-32 sm:pt-40" style="margin-top: 80px">
        <div
            class="bg-base-100 shadow-base-300/20 w-full max-w-sm rounded-xl px-6 py-8 sm:px-8 sm:py-6 space-y-6 shadow-md mt-48 sm:mt-32">
            <div class="flex items-center gap-3 justify-center sm:justify-start">
                <a href="" class="flex items-center gap-3">
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
            </div>
            <div>
                <h3 class="text-base-content text-2xl font-semibold sm:text-left">
                    Login
                </h3>
            </div>
            @if ($errors->any())
                <p style="color:red">{{ $errors->first() }}</p>
            @endif
            <div class="space-y-4">
                <form class="mb-4 space-y-4" action="/login" method="POST">
                    @csrf
                    <div>
                        <label class="label-text" for="username">Username</label>
                        <input type="text" name="username" placeholder="Enter your username" class="input" id="username"
                            required/>
                    </div>
                    <div>
                        <label class="label-text" for="userPassword">Password</label>
                        <div class="input input-bordered flex items-center">
                            <input id="password" name="password" type="password" class="grow" placeholder="············"
                                required />

                            <button type="button" onclick="togglePassword()"
                                class="cursor-pointer text-base-content/60 hover:text-base-content flex items-center"
                                aria-label="Toggle password">

                                <!-- Eye Open -->
                                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="hidden" width="22"
                                    height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>

                                <!-- Eye Closed -->
                                <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17.94 17.94A10.94 10.94 0 0 1 12 20
                 C5 20 1 12 1 12a21.8 21.8 0 0 1 5.17-6.88" />
                                    <path d="M1 1l22 22" />
                                    <path d="M9.53 9.53A3.5 3.5 0 0 0 12 15.5
                 A3.5 3.5 0 0 0 15.5 12
                 a3.5 3.5 0 0 0-5.97-2.47" />
                                </svg>

                            </button>

                        </div>
                    </div>


                    <div class="flex items-center justify-between gap-y-2">
                        <div class="flex items-center gap-2">
                        </div>
                        <a href="auth-forgot-password-1.html"
                            class="link link-animated link-primary font-normal">Forgot Password?</a>
                    </div>
                    <button class="btn btn-lg btn-primary btn-gradient btn-block" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- Vendors JS -->

    <!-- FlyonUI JS -->
    <script src="{{ asset('assets/dist/libs/flyonui/flyonui.js') }}"></script>

    <!-- Theme Utils JS -->
    <script src="{{ asset('assets/dist/js/theme-utils.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/dist/js/main.js') }}"></script>

    <!-- Page JS -->
    <script>
        function togglePassword() {
            const input = document.getElementById("password");
            const eyeOpen = document.getElementById("eyeOpen");
            const eyeClosed = document.getElementById("eyeClosed");

            if (input.type === "password") {
                input.type = "text";
                eyeOpen.classList.remove("hidden");
                eyeClosed.classList.add("hidden");
            } else {
                input.type = "password";
                eyeOpen.classList.add("hidden");
                eyeClosed.classList.remove("hidden");
            }
        }
    </script>


</body>

</html>
