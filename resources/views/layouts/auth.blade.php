<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Charset --}}
    <meta charset="UTF-8">

    {{-- Responsive --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSRF Laravel --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>@yield('title', 'Authentication') — PeakScore</title>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Tailwind --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- Alpine JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Theme --}}
    <style type="text/tailwindcss">
        @theme {
            --color-primary: #2563EB;
            --color-primary-dark: #1D4ED8;

            --color-soft-bg: #EFF6FF;

            --color-text-main: #0F172A;
            --color-text-muted: #64748B;
        }
    </style>

    {{-- Custom CSS --}}
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        body {
            background: #f0f0f7;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-up {
            animation: slideUp 0.4s ease-out both;
        }

        input:focus {
            outline: none;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-5 py-10">

    {{-- Main Card --}}
    <div class="w-full max-w-5xl bg-white rounded-[28px] shadow-[0_8px_40px_rgba(15,23,42,0.08)] overflow-hidden flex">

        {{-- ================================================= --}}
        {{-- LEFT PANEL --}}
        {{-- ================================================= --}}
        <div class="hidden lg:flex w-[340px] m-2 rounded-[24px] overflow-hidden relative flex-col justify-between p-8 text-white
                     bg-gradient-to-br from-neutral-700 via-neutral-800 to-neutral-950">

            {{-- Decorative Blur --}}
            <div class="absolute inset-0 overflow-hidden">

                <div class="absolute top-[-80px] right-[-40px] w-72 h-72 bg-white/20 rounded-full blur-3xl"></div>

                <div class="absolute bottom-[-80px] left-[-40px] w-72 h-72 bg-white/5 rounded-full blur-3xl"></div>

            </div>

            {{-- Logo --}}
            <div>
                <img 
                    src="{{ asset('logo.svg') }}"
                    alt="PeakScore Logo"
                    class="w-14 h-14 object-contain"
                >
            </div>

            {{-- Text --}}
            <div class="relative z-10">

                <p class="text-sm text-white/70 mb-3">
                    Welcome to
                </p>

                <h2 class="text-3xl font-bold leading-tight mb-4">
                    PeakScore
                </h2>

                <p class="text-sm text-white/80 leading-relaxed">
                    A modern platform for academic testing, intelligent analytics, and seamless participant access.
                </p>

                <div class="mt-10 space-y-4">

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-sm">Question Bank</h4>
                            <p class="text-xs text-white/70">Verbal, Numerical, Logical</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-sm">Student Access</h4>
                            <p class="text-xs text-white/70">Secure and seamless test participation</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-sm">Analytics</h4>
                            <p class="text-xs text-white/70">Detailed performance reports</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        {{-- ================================================= --}}
        {{-- RIGHT PANEL --}}
        {{-- ================================================= --}}
        <div class="flex-1 flex items-center justify-center px-8 py-12">

            <div class="w-full max-w-md animate-slide-up">

                {{-- Mobile Logo --}}
                <div class="flex items-center gap-3 mb-8 lg:hidden">

                    <div class="w-10 h-10 rounded-xl bg-indigo-600 text-white flex items-center justify-center text-xl font-bold">
                        *
                    </div>

                    <div>
                        <h2 class="font-bold text-lg text-text-main">
                            PeakScore
                        </h2>

                        <p class="text-xs text-text-muted">
                            Academic Testing Platform
                        </p>
                    </div>

                </div>

                {{-- LOGIN / REGISTER CONTENT --}}
                @yield('content')

            </div>

        </div>

    </div>

</body>
</html>