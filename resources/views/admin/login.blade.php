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
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

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

                    <h2 class="text-base-content text-xl font-bold">DARUSSALAM</h2>
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
