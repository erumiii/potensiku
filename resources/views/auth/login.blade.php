{{-- ========================================================= --}}
{{-- Menggunakan layout auth utama --}}
{{-- File: resources/views/layouts/auth.blade.php --}}
{{-- ========================================================= --}}
@extends('layouts.auth')

{{-- ========================================================= --}}
{{-- Title halaman --}}
{{-- Akan muncul di <title> browser --}}
{{-- ========================================================= --}}
@section('title', 'Login')

{{-- ========================================================= --}}
{{-- Isi utama halaman --}}
{{-- Akan dimasukkan ke @yield('content') --}}
{{-- di layout auth.blade.php --}}
{{-- ========================================================= --}}
@section('content')

{{-- ========================================================= --}}
{{-- FLASH SUCCESS MESSAGE --}}
{{-- Misalnya setelah logout berhasil --}}
{{-- ========================================================= --}}
@if(session('success'))

<div
    x-data="{ show: true }"
    x-show="show"
    x-init="setTimeout(() => show = false, 4000)"

    class="mb-5 flex items-start gap-3
        p-3.5
        bg-emerald-50
        border
        border-emerald-200
        rounded-xl
        text-emerald-700
        text-sm
    "
>
    {{-- Icon checklist --}}
    <span class="mt-0.5 text-base">
        ✓
    </span>

    {{-- Isi pesan --}}
    <span>
        {{ session('success') }}
    </span>
</div>
@endif

{{-- ========================================================= --}}
{{-- FLASH ERROR MESSAGE --}}
{{-- Misalnya akses ditolak --}}
{{-- ========================================================= --}}
@if(session('error'))

<div
    class="
        mb-5
        flex
        items-start
        gap-3
        p-3.5
        bg-red-50
        border
        border-red-200
        rounded-xl
        text-red-700
        text-sm
    "
>
    {{-- Icon silang --}}
    <span class="mt-0.5 text-base">
        ✕
    </span>

    {{-- Isi pesan --}}
    <span>
        {{ session('error') }}
    </span>

</div>
@endif

{{-- ========================================================= --}}
{{-- HEADING LOGIN --}}
{{-- ========================================================= --}}
<div class="mb-8">

    {{-- Judul --}}
    <h1
        class="
            text-2xl
            font-bold
            text-brand-dark
            mb-1
            tracking-tight
        "
    >
        Welcome Back
    </h1>

    {{-- Subjudul --}}
    <p class="text-brand-muted text-sm">
        Sign in to continue your academic journey
    </p>

</div>

{{-- ========================================================= --}}
{{-- VALIDATION ERRORS --}}
{{-- Menampilkan error validasi Laravel --}}
{{-- ========================================================= --}}
@if($errors->any())

<div
    class="
        mb-5
        p-3.5
        bg-red-50
        border
        border-red-200
        rounded-xl
    "
>

    {{-- Loop semua error --}}
    @foreach($errors->all() as $error)

    <div
        class="
            flex
            items-center
            gap-2
            text-red-700
            text-sm
            {{ !$loop->first ? 'mt-1' : '' }}
        "
    >

        {{-- Bullet point --}}
        <span class="text-xs">●</span>

        {{-- Isi error --}}
        {{ $error }}

    </div>

    @endforeach

</div>

@endif

{{-- ========================================================= --}}
{{-- FORM LOGIN --}}
{{-- ========================================================= --}}
<form
    method="POST"
    action="{{ route('login.post') }}"

    x-data="{ loading: false }"

    @submit="loading = true"
>

    {{-- ===================================================== --}}
    {{-- CSRF TOKEN --}}
    {{-- Wajib di Laravel --}}
    {{-- ===================================================== --}}
    @csrf

    {{-- ===================================================== --}}
    {{-- INPUT USERNAME --}}
    {{-- ===================================================== --}}
    <div class="mb-4">

        {{-- Label --}}
        <label
            for="username"

            class="
                block
                text-xs
                font-bold
                text-brand-dark
                uppercase
                tracking-wider
                mb-1.5
            "
        >
            Username
        </label>

        <div class="relative">

            {{-- Icon --}}
            <span
                class="
                    absolute
                    left-3.5
                    top-1/2
                    -translate-y-1/2
                    text-brand-muted
                    text-sm
                    pointer-events-none
                "
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z" clip-rule="evenodd" />
                </svg>
            </span>

            {{-- Input username --}}
            <input
                type="text"
                id="username"
                name="username"

                value="{{ old('username') }}"

                required
                autocomplete="username"

                placeholder="Enter your username"

                class="
                    w-full
                    pl-10
                    pr-4
                    py-3
                    border-2
                    rounded-lg
                    text-sm
                    bg-white
                    text-brand-dark
                    placeholder:text-brand-muted/60
                    transition-colors

                    {{ $errors->has('username')
                        ? 'border-red-400 focus:border-red-500'
                        : 'border-gray-200 focus:border-brand-dark'
                    }}
                "
            >

        </div>

    </div>

    {{-- ===================================================== --}}
    {{-- INPUT PASSWORD --}}
    {{-- ===================================================== --}}
    <div
        class="mb-5"
        x-data="{ show: false }"
    >

        {{-- Label --}}
        <label
            for="password"

            class="
                block
                text-xs
                font-bold
                text-brand-dark
                uppercase
                tracking-wider
                mb-1.5
            "
        >
            Password
        </label>

        <div class="relative">

            {{-- Icon --}}
            <span
                class="
                    absolute
                    left-3.5
                    top-1/2
                    -translate-y-1/2
                    text-brand-muted
                    text-sm
                    pointer-events-none
                "
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z" clip-rule="evenodd" />
                </svg>
            </span>

            {{-- Input password --}}
            <input
                :type="show ? 'text' : 'password'"

                id="password"
                name="password"

                required
                autocomplete="current-password"

                placeholder="Enter your password"

                class="
                    w-full
                    pl-10
                    pr-11
                    py-3
                    border-2
                    rounded-lg
                    text-sm
                    bg-white
                    text-brand-dark
                    placeholder:text-brand-muted/60
                    transition-colors

                    {{ $errors->has('password')
                        ? 'border-red-400 focus:border-red-500'
                        : 'border-gray-200 focus:border-brand-dark'
                    }}
                "
            >

            {{-- ================================================= --}}
            {{-- BUTTON SHOW/HIDE PASSWORD --}}
            {{-- ================================================= --}}
            <button
                type="button"

                @click="show = !show"

                class="
                    absolute
                    right-3.5
                    top-1/2
                    -translate-y-1/2
                    text-brand-muted
                    hover:text-brand-dark
                    transition-colors
                "
            >

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                </svg>

            </button>

        </div>

    </div>

    {{-- ===================================================== --}}
    {{-- REMEMBER ME --}}
    {{-- ===================================================== --}}
    <div
        class="
            flex
            items-center
            justify-between
            mb-6
        "
    >

        <label
            class="
                flex
                items-center
                gap-2
                cursor-pointer
                select-none
            "
        >

            {{-- Checkbox --}}
            <input
                type="checkbox"
                name="remember"
                id="remember"

                class="
                    w-4
                    h-4
                    rounded
                    border-2
                    border-gray-300
                    text-brand-dark
                    accent-brand-dark
                    cursor-pointer
                "
            >

            {{-- Text --}}
            <span class="text-sm text-brand-muted">
                Remember me
            </span>

        </label>

    </div>

    {{-- ===================================================== --}}
    {{-- BUTTON SUBMIT --}}
    {{-- ===================================================== --}}
    <button
        type="submit"

        class="
            w-full
            flex
            items-center
            justify-center
            gap-2

            bg-zinc-900 hover:bg-zinc-800

            active:scale-[0.98]

            text-white
            font-semibold

            py-3.5
            rounded-lg
            text-sm

            transition-all
            duration-150

            shadow-sm
        "

        :disabled="loading"

        :class="
            loading
            ? 'opacity-70 cursor-not-allowed'
            : ''
        "
    >

        {{-- Text normal --}}
        <span x-show="!loading">

            Sign In

        </span>

        {{-- Loading --}}
        <span
            x-show="loading"
            x-cloak

            class="
                flex
                items-center
                gap-2
            "
        >

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
            </svg> Processing...

        </span>

    </button>

</form>

{{-- ========================================================= --}}
{{-- LINK REGISTER --}}
{{-- ========================================================= --}}
<p
    class="
        mt-6
        text-center
        text-sm
        text-brand-muted
    "
>

    Don't have an account?

    <a
        href="{{ route('register') }}"

        class="
            font-semibold
            text-brand-dark
            hover:underline
            transition-colors
        "
    >
        Sign up now
    </a>

</p>
@endsection