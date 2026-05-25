@include('layouts.header')
@include('layouts.footer')

@yield('header')
<div class="flex-1 flex min-h-0 overflow-hidden">
    <aside>
        <nav id="sidebar" class="w-64 bg-neutral-50 text-white h-screen sticky top-0 border-solid border-r-2 border-gray-300">
            <div class="flex items-center ml-3">
                <img src="{{ asset('/logo.svg') }}" alt="Logo" class="mt-3 w-6 h-6 object-cover">
                <div class="pt-6 pb-4 px-1 text-2xl font-bold text-brand-dark">PeakScore</div>
            </div>
            <div class="-mt-4 px-4 text-m text-neutral-600">Academic Potential Test</div>
            <hr class="border-gray-300 mt-4 w-55 mx-auto border-1">
            <ul class="mt-4 text-neutral-600">
                <li class="pl-1 hover:bg-neutral-200"><a href="/" class="block p-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                    </svg>
                    Dashboard
                </a></li>
                <li class="pl-1 hover:bg-neutral-200"><a href="/questions" class="block p-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    Questions
                </a></li>
                <li class="pl-1 hover:bg-neutral-200 text-gray-800 font-medium"><a href="/participants" class="block p-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    Participants
                </a></li>
                <li class="pl-1 hover:bg-neutral-200"><a href="/test-results" class="block p-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                    </svg>
                    Test Results
                </a></li>
            </ul>
            <div class="px-5 pb-4 pt-90 font-semibold text-brand-dark">
                <div class="relative w-full" x-data="{ open: false }" @click.outside="open = false">

                    {{-- Dropdown Menu (muncul ke ATAS) --}}
                    <div x-show="open" x-cloak
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        style="transform-origin: bottom center;"
                        class="absolute bottom-full left-0 right-0 mb-3 bg-white rounded-lg overflow-hidden z-50 shadow-xl border border-gray-200">

                        <a href="#"
                            class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Account Settings
                        </a>

                        <hr class="border-gray-100">

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-3 w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                                </svg>
                                Sign out
                            </button>
                        </form>
                    </div>

                    {{-- Trigger: icon user + nama (horizontal seperti gambar 2) --}}
                    <button @click="open = !open"
                        class="flex items-center gap-3 w-full px-3 py-3 rounded-lg hover:bg-neutral-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-9 shrink-0 text-gray-700">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold text-gray-800 truncate">
                            {{ auth()->user()->name ?? 'Admin' }}
                        </span>
                    </button>
                </div>
            </div>
        </nav>
    </aside>
    <div class="flex flex-col flex-1 min-h-0 overflow-hidden">
        <header class="flex-none">
            <x-header />
        </header>

        <main class="flex-1 overflow-y-auto overflow-x-hidden bg-brand-light p-7">

            <!-- HEADING -->
            <div class="mb-6">
                <div class="flex items-center gap-1 mb-2 text-sm text-gray-500">
                    <a href="{{ route('participants.index') }}" class="hover:text-gray-700">Participants</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                    <span class="font-semibold text-gray-700">Add Participant</span>
                </div>
                <h1 class="text-4xl font-semibold">Add Participant</h1>
                <p class="text-gray-600">Fill in the details below to register a new participant.</p>
            </div>

            <!-- FORM -->
            <div class="max-w-3xl bg-white border-2 border-gray-300 p-8">

                @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded">
                    @foreach($errors->all() as $error)
                    <p class="text-sm text-red-700 flex items-center gap-2">
                        <span class="text-xs">●</span> {{ $error }}
                    </p>
                    @endforeach
                </div>
                @endif

                <form method="POST" action="{{ route('participants.store') }}" x-data="{ loading: false }" @submit="loading = true">
                    @csrf

                    <!-- SECTION: Account Info -->
                    <div class="mb-6">
                        <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4 border-b border-gray-100 pb-2">
                            Account Information
                        </h2>
                        <div class="grid grid-cols-2 gap-4">

                            <!-- Full Name -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Full Name <span class="text-red-400">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    placeholder="e.g. Budi Santoso"
                                    class="w-full px-3 py-2.5 border-2 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark {{ $errors->has('name') ? 'border-red-400' : 'border-gray-300' }}">
                            </div>

                            <!-- Username -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Username <span class="text-red-400">*</span></label>
                                <input type="text" name="username" value="{{ old('username') }}" required
                                    placeholder="e.g. budi2024"
                                    class="w-full px-3 py-2.5 border-2 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark {{ $errors->has('username') ? 'border-red-400' : 'border-gray-300' }}">
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Email <span class="text-red-400">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    placeholder="e.g. budi@email.com"
                                    class="w-full px-3 py-2.5 border-2 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark {{ $errors->has('email') ? 'border-red-400' : 'border-gray-300' }}">
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Status <span class="text-red-400">*</span></label>
                                <select name="status" required
                                    class="w-full px-3 py-2.5 border-2 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark border-gray-300">
                                    <option value="active"   {{ old('status', 'active') === 'active'   ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="banned"   {{ old('status') === 'banned'   ? 'selected' : '' }}>Banned</option>
                                </select>
                            </div>

                            <!-- Password -->
                            <div x-data="{ show: false }">
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Password <span class="text-red-400">*</span></label>
                                <div class="relative">
                                    <input :type="show ? 'text' : 'password'" name="password" required
                                        placeholder="Min. 8 characters"
                                        class="w-full px-3 py-2.5 pr-10 border-2 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark {{ $errors->has('password') ? 'border-red-400' : 'border-gray-300' }}">
                                    <button type="button" @click="show = !show"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700">
                                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div x-data="{ show: false }">
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Confirm Password <span class="text-red-400">*</span></label>
                                <div class="relative">
                                    <input :type="show ? 'text' : 'password'" name="password_confirmation" required
                                        placeholder="Re-enter password"
                                        class="w-full px-3 py-2.5 pr-10 border-2 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark border-gray-300">
                                    <button type="button" @click="show = !show"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700">
                                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- SECTION: Personal Info -->
                    <div class="mb-8">
                        <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4 border-b border-gray-100 pb-2">
                            Personal Information <span class="text-gray-400 font-normal normal-case">(optional)</span>
                        </h2>
                        <div class="grid grid-cols-2 gap-4">

                            <!-- Phone -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    placeholder="e.g. 081234567890"
                                    class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark">
                            </div>

                            <!-- Birth Date -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Date of Birth</label>
                                <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                                    class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark">
                            </div>

                            <!-- Gender -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Gender</label>
                                <select name="gender"
                                    class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark">
                                    <option value="">— Select —</option>
                                    <option value="male"   {{ old('gender') === 'male'   ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <!-- Institution -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Institution</label>
                                <input type="text" name="institution" value="{{ old('institution') }}"
                                    placeholder="e.g. SMA Negeri 1 Bandung"
                                    class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark">
                            </div>

                            <!-- Address (full width) -->
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Address</label>
                                <textarea name="address" rows="2" placeholder="Full address..."
                                    class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark resize-none">{{ old('address') }}</textarea>
                            </div>

                        </div>
                    </div>

                    <!-- ACTIONS -->
                    <div class="flex gap-3">
                        <button type="submit"
                            :disabled="loading"
                            :class="loading ? 'opacity-70 cursor-not-allowed' : ''"
                            class="bg-brand-dark hover:bg-neutral-700 text-white font-medium text-sm px-6 py-2.5 rounded-sm transition flex items-center gap-2">
                            <span x-show="!loading">Save Participant</span>
                            <span x-show="loading" x-cloak class="flex items-center gap-2">
                                <svg class="animate-spin size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
                                </svg>
                                Saving...
                            </span>
                        </button>
                        <a href="{{ route('participants.index') }}"
                           class="border-2 border-gray-300 hover:bg-gray-100 text-gray-600 font-medium text-sm px-6 py-2.5 rounded-sm transition">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>

        </main>
        <footer class="flex-none">
            <x-footer />
        </footer>
    </div>
</div>
@yield('footer')
