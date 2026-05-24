@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')

{{-- ── Heading ── --}}
<div class="mb-8">
    <h1 class="text-2xl font-bold text-brand-dark mb-1 tracking-tight">Create Your Account</h1>
    <p class="text-brand-muted text-sm">Join PeakScore and start your academic journey</p>
</div>

{{-- ── Validation errors ── --}}
@if($errors->any())
<div class="mb-5 p-3.5 bg-red-50 border border-red-200 rounded-xl">
    @foreach($errors->all() as $error)
    <div class="flex items-center gap-2 text-red-700 text-sm {{ !$loop->first ? 'mt-1' : '' }}">
        <span class="text-xs">●</span> {{ $error }}
    </div>
    @endforeach
</div>
@endif

{{-- ── Form ── --}}
<form method="POST" action="{{ route('register.post') }}" x-data="{ loading: false, showPw: false, showConfirm: false }" @submit="loading = true">
    @csrf

    {{-- Nama lengkap --}}
    <div class="mb-4">
        <label for="name" class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">
            FULL NAME
        </label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-brand-muted pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0"/>
                </svg>
            </span>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
                autocomplete="name"
                placeholder="Enter your full name"
                class="w-full pl-10 pr-4 py-3 border-2 rounded-lg text-sm bg-white text-brand-dark placeholder:text-brand-muted/60 transition-colors
                       {{ $errors->has('name') ? 'border-red-400' : 'border-gray-200 focus:border-brand-dark' }}"
            >
        </div>
    </div>

    {{-- Username --}}
    <div class="mb-4">
        <label for="username" class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">
            Username
        </label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-brand-muted pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z" clip-rule="evenodd" />
                </svg>
            </span>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                required
                autocomplete="username"
                placeholder="letters, numbers, _ or -"
                class="w-full pl-10 pr-4 py-3 border-2 rounded-lg text-sm bg-white text-brand-dark placeholder:text-brand-muted/60 transition-colors
                       {{ $errors->has('username') ? 'border-red-400' : 'border-gray-200 focus:border-brand-dark' }}"
            >
        </div>
        <p class="mt-1 text-xs text-brand-muted">Only letters, numbers, hyphens, and underscores are allowed.</p>
    </div>

    {{-- Email --}}
    <div class="mb-4">
        <label for="email" class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">
            Email
        </label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-brand-muted pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path d="M3 4a2 2 0 0 0-2 2v1.161l8.441 4.221a1.25 1.25 0 0 0 1.118 0L19 7.162V6a2 2 0 0 0-2-2H3Z" />
                    <path d="m19 8.839-7.77 3.885a2.75 2.75 0 0 1-2.46 0L1 8.839V14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.839Z" />
                </svg>
            </span>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="email"
                placeholder="Enter your email address"
                class="w-full pl-10 pr-4 py-3 border-2 rounded-lg text-sm bg-white text-brand-dark placeholder:text-brand-muted/60 transition-colors
                       {{ $errors->has('email') ? 'border-red-400' : 'border-gray-200 focus:border-brand-dark' }}"
            >
        </div>
    </div>

    {{-- Password --}}
    <div class="mb-4">
        <label for="password" class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">
            Password
        </label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-brand-muted pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z" clip-rule="evenodd" />
                </svg>
            </span>
            <input
                :type="showPw ? 'text' : 'password'"
                id="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Minimum 8 characters"
                class="w-full pl-10 pr-11 py-3 border-2 rounded-lg text-sm bg-white text-brand-dark placeholder:text-brand-muted/60 transition-colors
                       {{ $errors->has('password') ? 'border-red-400' : 'border-gray-200 focus:border-brand-dark' }}"
            >
            <button type="button" @click="showPw = !showPw"
                class="absolute right-3.5 top-1/2 -translate-y-1/2 text-brand-muted hover:text-brand-dark transition-colors">
                <svg x-show="!showPw" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" clip-rule="evenodd" />
                </svg>
                <svg x-show="showPw" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06l-1.745-1.745a10.029 10.029 0 0 0 3.3-4.38 1.651 1.651 0 0 0 0-1.185A10.004 10.004 0 0 0 9.999 3a9.956 9.956 0 0 0-4.744 1.194L3.28 2.22ZM7.752 6.69l1.092 1.092a2.5 2.5 0 0 1 3.374 3.373l1.091 1.092a4 4 0 0 0-5.557-5.557Z" clip-rule="evenodd" />
                    <path d="m10.748 13.93 2.523 2.523a9.987 9.987 0 0 1-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 0 1 0-1.186A10.007 10.007 0 0 1 2.839 6.02L6.07 9.252a4 4 0 0 0 4.678 4.678Z" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Konfirmasi password --}}
    <div class="mb-6">
        <label for="password_confirmation" class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">
            Confirm Password
        </label>
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-brand-muted pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z" clip-rule="evenodd" />
                </svg>
            </span>
            <input
                :type="showConfirm ? 'text' : 'password'"
                id="password_confirmation"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Re-enter your password"
                class="w-full pl-10 pr-11 py-3 border-2 rounded-lg text-sm bg-white text-brand-dark placeholder:text-brand-muted/60 transition-colors
                       border-gray-200 focus:border-brand-dark"
            >
            <button type="button" @click="showConfirm = !showConfirm"
                class="absolute right-3.5 top-1/2 -translate-y-1/2 text-brand-muted hover:text-brand-dark transition-colors">
                <svg x-show="!showConfirm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" clip-rule="evenodd" />
                </svg>
                <svg x-show="showConfirm" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M3.28 2.22a.75.75 0 0 0-1.06 1.06l14.5 14.5a.75.75 0 1 0 1.06-1.06l-1.745-1.745a10.029 10.029 0 0 0 3.3-4.38 1.651 1.651 0 0 0 0-1.185A10.004 10.004 0 0 0 9.999 3a9.956 9.956 0 0 0-4.744 1.194L3.28 2.22ZM7.752 6.69l1.092 1.092a2.5 2.5 0 0 1 3.374 3.373l1.091 1.092a4 4 0 0 0-5.557-5.557Z" clip-rule="evenodd" />
                    <path d="m10.748 13.93 2.523 2.523a9.987 9.987 0 0 1-3.27.547c-4.258 0-7.894-2.66-9.337-6.41a1.651 1.651 0 0 1 0-1.186A10.007 10.007 0 0 1 2.839 6.02L6.07 9.252a4 4 0 0 0 4.678 4.678Z" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Submit --}}
    <button
        type="submit"
        class="w-full flex items-center justify-center gap-2 bg-zinc-900 hover:bg-zinc-800 active:scale-[0.98]
               text-white font-semibold py-3.5 rounded-lg text-sm transition-all duration-150 shadow-sm"
        :disabled="loading"
        :class="loading ? 'opacity-70 cursor-not-allowed' : ''"
    >
        <span x-show="!loading">Create Account</span>
        <span x-show="loading" x-cloak class="flex items-center gap-2">
            <svg class="animate-spin size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
            </svg>
            Processing...
        </span>
    </button>
</form>

{{-- ── Link ke login ── --}}
<p class="mt-6 text-center text-sm text-brand-muted">
    Already have an account? 
    <a href="{{ route('login') }}"
       class="font-semibold text-brand-dark hover:underline transition-colors">
        Sign in here!
    </a>
</p>

@endsection