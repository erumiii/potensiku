<!DOCTYPE html>
<html lang="id">

<head>

    <!-- Encoding karakter -->
    <meta charset="UTF-8">

    <!-- Responsive viewport -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token Laravel -->
    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <!-- Title halaman -->
    <title>
        @yield('title', 'Auth')
        — PeakScore
    </title>

    <!-- ===================================================== -->
    <!-- TAILWIND CSS CDN -->
    <!-- ===================================================== -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Alpine.js -->
    <script defer
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    </script>

    <!-- ===================================================== -->
    <!-- CUSTOM THEME COLOR -->
    <!-- ===================================================== -->
    <style type="text/tailwindcss">
        @theme {

            /* Warna utama */
            --color-brand-dark: #343434;

            /* Abu muted */
            --color-brand-muted: #8E8B82;

            /* Beige */
            --color-brand-beige: #E9DCBE;

            /* Background terang */
            --color-brand-light: #F3F3F3;
        }
    </style>

    <!-- ===================================================== -->
    <!-- CUSTOM CSS -->
    <!-- ===================================================== -->
    <style>

        /**
         * Menyembunyikan elemen Alpine
         * sebelum JS selesai load
         */
        [x-cloak] {
            display: none !important;
        }

        /**
         * Background dot grid
         * panel kiri
         */
        .bg-dot-grid {
            background-image:
                radial-gradient(
                    circle,
                    rgba(255,255,255,0.12) 1px,
                    transparent 1px
                );

            background-size: 28px 28px;
        }

        /**
         * Animasi card form
         */
        @keyframes slideUp {

            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /**
         * Class animasi
         */
        .animate-slide-up {
            animation: slideUp 0.35s ease-out both;
        }

        /**
         * Hilangkan outline input default
         */
        input:focus {
            outline: none;
        }

    </style>

</head>

<body class="min-h-screen flex bg-brand-light antialiased">

    <!-- ===================================================== -->
    <!-- PANEL KIRI -->
    <!-- Branding / Informasi -->
    <!-- ===================================================== -->
    <div class="hidden lg:flex
                w-[420px]
                flex-shrink-0
                bg-brand-dark
                flex-col
                justify-between
                relative
                overflow-hidden">

        <!-- Dot Grid Background -->
        <div class="absolute inset-0
                    bg-dot-grid
                    pointer-events-none">
        </div>

        <!-- Blob gradient dekorasi -->
        <div class="absolute
                    -bottom-20
                    -right-20
                    w-72
                    h-72
                    bg-white/5
                    rounded-full
                    blur-3xl
                    pointer-events-none">
        </div>

        <div class="absolute
                    top-1/3
                    -left-10
                    w-48
                    h-48
                    bg-white/5
                    rounded-full
                    blur-2xl
                    pointer-events-none">
        </div>

        <!-- ================================================= -->
        <!-- LOGO & TAGLINE -->
        <!-- ================================================= -->
        <div class="relative z-10 p-10">

            <!-- Logo -->
            <div class="flex items-center gap-3 mb-14">

                <img src="{{ asset('logo.svg') }}"
                     alt="PeakScore"
                     class="w-9 h-9">

                <div>

                    <div class="text-white
                                font-bold
                                text-lg
                                leading-tight
                                tracking-tight">

                        PeakScore
                    </div>

                    <div class="text-white/50 text-xs">
                        Management Console
                    </div>

                </div>
            </div>

            <!-- Heading -->
            <h2 class="text-white text-[2rem] font-bold leading-snug mb-4">
                Unlock Your Academic Potential with
                <span class="text-white/60">PeakScore</span>
            </h2>

            <p class="text-white/40 text-sm leading-relaxed max-w-xs">
                A modern platform for academic testing, participant access, and intelligent performance analysis.
            </p>

        </div>

        <!-- ================================================= -->
        <!-- FEATURE LIST -->
        <!-- ================================================= -->
        <div class="relative z-10 p-10 space-y-3">

            @foreach([
                [
                    'icon'  => '📚',
                    'title' => 'Question Bank',
                    'desc'  => 'Verbal, Numerical, Logical'
                ],

                [
                    'icon'  => '👥',
                    'title' => 'Student Access',
                    'desc'  => 'Secure and seamless test participation'
                ],

                [
                    'icon'  => '📊',
                    'title' => 'Analytics',
                    'desc'  => 'Detailed performance reports'
                ],
            ] as $f)

            <!-- Card Feature -->
            <div class="flex items-center
                        gap-3
                        p-3
                        bg-white/5
                        rounded-xl
                        border
                        border-white/10
                        backdrop-blur-sm">

                <!-- Icon -->
                <div class="w-9
                            h-9
                            bg-white/10
                            rounded-lg
                            flex
                            items-center
                            justify-center
                            text-base
                            flex-shrink-0">

                    {{ $f['icon'] }}

                </div>

                <!-- Text -->
                <div>

                    <div class="text-white
                                text-sm
                                font-semibold">

                        {{ $f['title'] }}

                    </div>

                    <div class="text-white/40 text-xs">

                        {{ $f['desc'] }}

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- PANEL KANAN -->
    <!-- Form Login / Register -->
    <!-- ===================================================== -->
    <div class="flex-1
                flex
                items-center
                justify-center
                px-6
                py-12
                overflow-y-auto">

        <!-- Container form -->
        <div class="w-full
                    max-w-md
                    animate-slide-up">

            <!-- Logo mobile -->
            <div class="flex items-center
                        gap-2
                        mb-8
                        lg:hidden">

                <img src="{{ asset('logo.svg') }}"
                     alt="PeakScore"
                     class="w-7 h-7">

                <span class="font-bold text-brand-dark">
                    PeakScore
                </span>

            </div>

            <!-- ================================================= -->
            <!-- CONTENT LOGIN / REGISTER -->
            <!-- ================================================= -->
            @yield('content')

        </div>

    </div>

</body>
</html>