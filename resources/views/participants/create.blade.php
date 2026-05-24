@include('layouts.header')
@include('layouts.footer')

@yield('header')
<div class="flex-1 flex min-h-0 overflow-hidden">
    <x-sidebar />
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
