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
                👤
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
                🔒
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

                {{-- Icon mata --}}
                👁

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

            bg-brand-dark
            hover:bg-neutral-700

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

            ⏳ Processing...

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