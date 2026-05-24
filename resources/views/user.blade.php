<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — PeakScore</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts: DM Serif Display + DM Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style type="text/tailwindcss">
        @theme {
            --color-ink:        #0e0f13;
            --color-ink-soft:   #3a3d47;
            --color-ink-muted:  #8a8d99;
            --color-paper:      #F8FAFC;
            --color-paper-dark: #eceae4;
            --color-accent:     #2a52be;
            --color-accent-mid: #3a6aee;
            --color-gold:       #c8972a;
            --color-emerald:    #1a7a4a;
        }
    </style>

    <style>
        * { font-family: 'DM Sans', sans-serif; }
        .serif { font-family: 'DM Serif Display', serif; }
        [x-cloak] { display: none !important; }

        /* Staggered entrance animation */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.5s ease both; }
        .delay-1 { animation-delay: 0.05s; }
        .delay-2 { animation-delay: 0.12s; }
        .delay-3 { animation-delay: 0.19s; }
        .delay-4 { animation-delay: 0.26s; }
        .delay-5 { animation-delay: 0.33s; }
        .delay-6 { animation-delay: 0.40s; }

        /* Grain texture overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
            opacity: 0.025;
            pointer-events: none;
            z-index: 9999;
        }

        /* Test card hover lift */
        .test-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .test-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(14,15,19,0.12);
        }

        /* Progress ring */
        .progress-ring-circle {
            transition: stroke-dashoffset 1s ease;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }

        /* Sidebar nav active underline */
        .nav-link {
            position: relative;
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0; right: 0;
            height: 2px;
            background: var(--color-accent);
            border-radius: 1px;
        }

        /* Countdown pulse */
        @keyframes pulseDot {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }
        .pulse-dot { animation: pulseDot 1.5s ease infinite; }
    </style>
</head>

<body class="bg-paper min-h-screen">

<!-- ================================================================
     TOP NAV
================================================================ -->
<header class="sticky top-0 z-50 bg-paper/90 backdrop-blur-md border-b border-ink/8 fade-up">
    <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">

        <!-- Logo -->
        <div class="flex items-center gap-2.5">
                <img 
                    src="{{ asset('logo.svg') }}"
                    alt="PeakScore Logo"
                    class="w-14 h-10 object-contain"
                >
            <span class="text-ink text-[20px] font-bold tracking-tight">
                PeakScore
            </span>
        </div>

        

        <!-- Nav links -->
        <nav class="hidden md:flex items-center gap-6 text-sm text-ink-muted font-medium">
            <a href="#" class="nav-link active text-ink pb-0.5">Dashboard</a>
            <a href="#" class="nav-link hover:text-ink transition pb-0.5">My Tests</a>
            <a href="#" class="nav-link hover:text-ink transition pb-0.5">Results</a>
        </nav>

        <!-- User menu -->
        <div x-data="{ open: false }" @click.outside="open = false" class="relative">
            <button @click="open = !open"
                class="flex items-center gap-2.5 hover:opacity-80 transition">
                <div class="w-8 h-8 rounded-full bg-ink text-paper flex items-center justify-center text-sm font-semibold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <span class="hidden md:block text-sm font-medium text-ink-soft">{{ Auth::user()->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    class="w-4 h-4 text-ink-muted transition" :class="open ? 'rotate-180' : ''">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div x-show="open" x-cloak
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                class="absolute right-0 top-full mt-2 w-52 bg-white border border-ink/10 rounded-xl shadow-xl overflow-hidden z-50">

                <div class="px-4 py-3 border-b border-ink/8">
                    <p class="text-xs text-ink-muted">Signed in as</p>
                    <p class="text-sm font-semibold text-ink truncate">{{ Auth::user()->email }}</p>
                </div>

                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-ink-soft hover:bg-paper transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-ink-muted">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    My Profile
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-ink-soft hover:bg-paper transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-ink-muted">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Settings
                </a>

                <div class="border-t border-ink/8">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-3 w-full px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                            </svg>
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- ================================================================
     MAIN CONTENT
================================================================ -->
<main class="max-w-6xl mx-auto px-6 py-10">

    <!-- ── HERO GREETING ── -->
    <section class="mb-10 fade-up delay-1">
        <div class="bg-ink rounded-2xl px-8 py-8 relative overflow-hidden">

            <!-- Background decoration -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/4 pointer-events-none"></div>
            <div class="absolute bottom-0 left-1/3 w-48 h-48 bg-accent/20 rounded-full translate-y-1/2 pointer-events-none blur-2xl"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <p class="text-white/50 text-sm font-light tracking-wide mb-1">
                        {{ now()->format('l, d F Y') }}
                    </p>
                    <h1 class="serif text-white text-3xl md:text-4xl leading-tight mb-2">
                        Good {{ now()->hour < 12 ? 'morning' : (now()->hour < 17 ? 'afternoon' : 'evening') }},<br>
                        <span class="italic text-white/80">{{ explode(' ', Auth::user()->name)[0] }}.</span>
                    </h1>
                    <p class="text-white/60 text-sm max-w-sm">
                        Your academic journey continues. Stay focused and give your best effort today.
                    </p>
                </div>

                <!-- Quick stat chips -->
                <div class="flex flex-col gap-2 shrink-0">
                    <div class="flex items-center gap-2.5 bg-white/10 rounded-lg px-4 py-2.5 border border-white/15">
                        <div class="w-2 h-2 rounded-full bg-emerald-400 pulse-dot"></div>
                        <span class="text-white/80 text-sm">Test session open</span>
                    </div>
                    <div class="flex items-center gap-2.5 bg-white/10 rounded-lg px-4 py-2.5 border border-white/15">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gold shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                        </svg>
                        <span class="text-white/80 text-sm">
                            @php
                                $participant = Auth::user()->participant ?? null;
                            @endphp
                            {{ $participant?->participant_code ?? 'Not enrolled yet' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ── STATS ROW ── -->
    <section class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">

        <!-- Tests Taken -->
        <div class="fade-up delay-2 bg-white border border-ink/8 rounded-xl p-5 flex flex-col gap-1">
            <div class="flex items-center justify-between mb-2">
                <div class="w-9 h-9 rounded-lg bg-paper-dark flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4.5 h-4.5 text-ink-soft">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-ink">0</p>
            <p class="text-xs text-ink-muted font-medium">Tests Taken</p>
        </div>

        <!-- Avg Score -->
        <div class="fade-up delay-2 bg-white border border-ink/8 rounded-xl p-5 flex flex-col gap-1">
            <div class="flex items-center justify-between mb-2">
                <div class="w-9 h-9 rounded-lg bg-paper-dark flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4.5 h-4.5 text-ink-soft">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-ink">—</p>
            <p class="text-xs text-ink-muted font-medium">Average Score</p>
        </div>

        <!-- Best Score -->
        <div class="fade-up delay-3 bg-white border border-ink/8 rounded-xl p-5 flex flex-col gap-1">
            <div class="flex items-center justify-between mb-2">
                <div class="w-9 h-9 rounded-lg bg-amber-50 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4.5 h-4.5 text-amber-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-ink">—</p>
            <p class="text-xs text-ink-muted font-medium">Best Score</p>
        </div>

        <!-- Status -->
        <div class="fade-up delay-3 bg-white border border-ink/8 rounded-xl p-5 flex flex-col gap-1">
            <div class="flex items-center justify-between mb-2">
                <div class="w-9 h-9 rounded-lg bg-emerald-50 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4.5 h-4.5 text-emerald-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-ink capitalize">
                {{ $participant?->status ?? 'Active' }}
            </p>
            <p class="text-xs text-ink-muted font-medium">Account Status</p>
        </div>

    </section>


    <!-- ── MAIN GRID ── -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- ─ LEFT COLUMN (2/3 width) ─ -->
        <div class="md:col-span-2 flex flex-col gap-6">

            <!-- Available Tests -->
            <div class="fade-up delay-4">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="serif text-xl text-ink">Available Tests</h2>
                    <a href="#" class="text-xs font-medium text-accent hover:underline">View all →</a>
                </div>

                <!-- Test cards -->
                <div class="flex flex-col gap-3">

                    <!-- Test 1: Verbal -->
                    <div class="test-card bg-white border border-ink/8 rounded-xl p-5 flex items-center gap-5">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5.5 h-5.5 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h3 class="font-semibold text-ink text-sm">Verbal Reasoning</h3>
                                    <p class="text-xs text-ink-muted mt-0.5">Vocabulary, comprehension & analogies</p>
                                </div>
                                <span class="shrink-0 text-xs bg-blue-50 text-blue-700 border border-blue-100 px-2.5 py-1 rounded-full font-medium">
                                    40 min
                                </span>
                            </div>
                            <div class="flex items-center gap-3 mt-3">
                                <div class="flex-1 h-1.5 bg-paper-dark rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-400 rounded-full" style="width: 0%"></div>
                                </div>
                                <span class="text-xs text-ink-muted shrink-0">Not started</span>
                            </div>
                        </div>
                        <a href="#"
                           class="shrink-0 bg-ink hover:bg-ink-soft text-paper text-xs font-semibold px-4 py-2 rounded-lg transition">
                            Start
                        </a>
                    </div>

                    <!-- Test 2: Numeric -->
                    <div class="test-card bg-white border border-ink/8 rounded-xl p-5 flex items-center gap-5">
                        <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5.5 h-5.5 text-amber-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h3 class="font-semibold text-ink text-sm">Numerical Reasoning</h3>
                                    <p class="text-xs text-ink-muted mt-0.5">Arithmetic, sequences & data analysis</p>
                                </div>
                                <span class="shrink-0 text-xs bg-amber-50 text-amber-700 border border-amber-100 px-2.5 py-1 rounded-full font-medium">
                                    45 min
                                </span>
                            </div>
                            <div class="flex items-center gap-3 mt-3">
                                <div class="flex-1 h-1.5 bg-paper-dark rounded-full overflow-hidden">
                                    <div class="h-full bg-amber-400 rounded-full" style="width: 0%"></div>
                                </div>
                                <span class="text-xs text-ink-muted shrink-0">Not started</span>
                            </div>
                        </div>
                        <a href="#"
                           class="shrink-0 bg-ink hover:bg-ink-soft text-paper text-xs font-semibold px-4 py-2 rounded-lg transition">
                            Start
                        </a>
                    </div>

                    <!-- Test 3: Logic -->
                    <div class="test-card bg-white border border-ink/8 rounded-xl p-5 flex items-center gap-5">
                        <div class="w-12 h-12 rounded-xl bg-violet-50 border border-violet-100 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5.5 h-5.5 text-violet-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h3 class="font-semibold text-ink text-sm">Logical Reasoning</h3>
                                    <p class="text-xs text-ink-muted mt-0.5">Patterns, deduction & critical thinking</p>
                                </div>
                                <span class="shrink-0 text-xs bg-violet-50 text-violet-700 border border-violet-100 px-2.5 py-1 rounded-full font-medium">
                                    35 min
                                </span>
                            </div>
                            <div class="flex items-center gap-3 mt-3">
                                <div class="flex-1 h-1.5 bg-paper-dark rounded-full overflow-hidden">
                                    <div class="h-full bg-violet-400 rounded-full" style="width: 0%"></div>
                                </div>
                                <span class="text-xs text-ink-muted shrink-0">Not started</span>
                            </div>
                        </div>
                        <a href="#"
                           class="shrink-0 bg-ink hover:bg-ink-soft text-paper text-xs font-semibold px-4 py-2 rounded-lg transition">
                            Start
                        </a>
                    </div>

                    <!-- Test 4: Spatial -->
                    <div class="test-card bg-white border border-ink/8 rounded-xl p-5 flex items-center gap-5">
                        <div class="w-12 h-12 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5.5 h-5.5 text-emerald-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                            </svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-3">
                                <div>
                                    <h3 class="font-semibold text-ink text-sm">Spatial Reasoning</h3>
                                    <p class="text-xs text-ink-muted mt-0.5">Visual patterns, shapes & rotations</p>
                                </div>
                                <span class="shrink-0 text-xs bg-emerald-50 text-emerald-700 border border-emerald-100 px-2.5 py-1 rounded-full font-medium">
                                    30 min
                                </span>
                            </div>
                            <div class="flex items-center gap-3 mt-3">
                                <div class="flex-1 h-1.5 bg-paper-dark rounded-full overflow-hidden">
                                    <div class="h-full bg-emerald-400 rounded-full" style="width: 0%"></div>
                                </div>
                                <span class="text-xs text-ink-muted shrink-0">Not started</span>
                            </div>
                        </div>
                        <a href="#"
                           class="shrink-0 bg-ink hover:bg-ink-soft text-paper text-xs font-semibold px-4 py-2 rounded-lg transition">
                            Start
                        </a>
                    </div>

                </div>
            </div>

            <!-- Recent Results -->
            <div class="fade-up delay-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="serif text-xl text-ink">Recent Results</h2>
                    <a href="#" class="text-xs font-medium text-accent hover:underline">View all →</a>
                </div>

                <div class="bg-white border border-ink/8 rounded-xl overflow-hidden">
                    <!-- Empty state -->
                    <div class="flex flex-col items-center justify-center py-12 text-center px-6">
                        <div class="w-14 h-14 rounded-full bg-paper-dark flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-7 h-7 text-ink-muted">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                        </div>
                        <p class="text-sm font-semibold text-ink-soft">No results yet</p>
                        <p class="text-xs text-ink-muted mt-1 max-w-xs">
                            Complete your first test to see your performance results and analytics here.
                        </p>
                    </div>
                </div>
            </div>

        </div>


        <!-- ─ RIGHT COLUMN (1/3 width) ─ -->
        <div class="flex flex-col gap-6">

            <!-- Profile Card -->
            <div class="fade-up delay-2 bg-white border border-ink/8 rounded-xl p-5">
                <h2 class="serif text-base text-ink mb-4">My Profile</h2>

                <!-- Avatar -->
                <div class="flex flex-col items-center pb-4 border-b border-ink/6 mb-4">
                    <div class="w-16 h-16 rounded-full bg-ink text-paper flex items-center justify-center text-2xl font-bold mb-2.5">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <p class="font-semibold text-ink text-sm">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-ink-muted">{{ Auth::user()->email }}</p>

                    @if($participant)
                    <span class="mt-2 inline-flex items-center gap-1 text-xs bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-0.5 rounded-full font-medium">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        {{ ucfirst($participant->status) }}
                    </span>
                    @endif
                </div>

                <!-- Profile detail list -->
                <div class="space-y-2.5 text-xs">

                    @if($participant?->participant_code)
                    <div class="flex justify-between items-center">
                        <span class="text-ink-muted">Participant ID</span>
                        <span class="font-mono font-semibold text-ink bg-paper-dark px-2 py-0.5 rounded">
                            {{ $participant->participant_code }}
                        </span>
                    </div>
                    @endif

                    @if($participant?->institution)
                    <div class="flex justify-between items-start gap-2">
                        <span class="text-ink-muted shrink-0">Institution</span>
                        <span class="text-ink font-medium text-right">{{ $participant->institution }}</span>
                    </div>
                    @endif

                    @if($participant?->gender)
                    <div class="flex justify-between items-center">
                        <span class="text-ink-muted">Gender</span>
                        <span class="text-ink font-medium capitalize">{{ $participant->gender }}</span>
                    </div>
                    @endif

                    @if($participant?->phone)
                    <div class="flex justify-between items-center">
                        <span class="text-ink-muted">Phone</span>
                        <span class="text-ink font-medium">{{ $participant->phone }}</span>
                    </div>
                    @endif

                    @if(!$participant)
                    <p class="text-ink-muted text-center py-2">
                        Profile not yet set up by admin.
                    </p>
                    @endif
                </div>

                <a href="#"
                   class="mt-4 block w-full text-center border border-ink/15 hover:bg-paper-dark text-ink-soft text-xs font-medium py-2 rounded-lg transition">
                    Edit Profile
                </a>
            </div>


            <!-- Preparation Tips -->
            <div class="fade-up delay-5 bg-white border border-ink/8 rounded-xl p-5">
                <h2 class="serif text-base text-ink mb-4">Preparation Tips</h2>
                <div class="space-y-3">

                    <div class="flex gap-3">
                        <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">1</div>
                        <p class="text-xs text-ink-soft leading-relaxed">Read each question carefully before answering.</p>
                    </div>

                    <div class="flex gap-3">
                        <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">2</div>
                        <p class="text-xs text-ink-soft leading-relaxed">Manage your time — skip hard questions and return later.</p>
                    </div>

                    <div class="flex gap-3">
                        <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">3</div>
                        <p class="text-xs text-ink-soft leading-relaxed">Stay calm. Take a deep breath before starting.</p>
                    </div>

                    <div class="flex gap-3">
                        <div class="w-6 h-6 rounded-full bg-violet-100 text-violet-600 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">4</div>
                        <p class="text-xs text-ink-soft leading-relaxed">Eliminate obviously wrong answers to improve guessing odds.</p>
                    </div>

                </div>
            </div>


            <!-- Need Help -->
            <div class="fade-up delay-6 bg-ink rounded-xl p-5 relative overflow-hidden">
                <div class="absolute -top-4 -right-4 w-20 h-20 bg-white/5 rounded-full pointer-events-none"></div>
                <h2 class="text-white font-semibold text-sm mb-1.5">Need help?</h2>
                <p class="text-white/60 text-xs mb-4 leading-relaxed">
                    Having trouble with your account or test access? Contact your administrator.
                </p>
                <a href="mailto:admin@peakscore.id"
                   class="block w-full text-center bg-white/10 hover:bg-white/20 border border-white/20 text-white text-xs font-medium py-2 rounded-lg transition">
                    Contact Admin
                </a>
            </div>

        </div>

    </div>
</main>


<!-- ================================================================
     FOOTER
================================================================ -->
<footer class="mt-16 border-t border-ink/8 bg-white">
    <div class="max-w-6xl mx-auto px-6 py-5 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="text-ink text-[15px] font-bold tracking-tight">PeakScore</span>
            <span class="text-ink-muted text-xs">— Academic Potential Test</span>
        </div>
        <p class="text-xs text-ink-muted">© {{ date('Y') }} PeakScore. All rights reserved.</p>
    </div>
</footer>

</body>
</html>