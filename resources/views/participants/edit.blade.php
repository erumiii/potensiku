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
                    <span class="font-semibold text-gray-700">Edit Participant</span>
                </div>
                <h1 class="text-4xl font-semibold">Edit Participant</h1>
                <p class="text-gray-600">Update details for <strong>{{ $participant->user->name }}</strong>.</p>
            </div>

            <!-- PARTICIPANT CODE BADGE -->
            <div class="max-w-3xl mb-4">
                <div class="inline-flex items-center gap-2 bg-white border-2 border-gray-200 px-4 py-2 rounded-sm text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span class="text-gray-500">Participant Code:</span>
                    <span class="font-mono font-semibold text-gray-800">{{ $participant->participant_code ?? 'N/A' }}</span>
                </div>
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

                <form method="POST" action="{{ route('participants.update', $participant) }}"
                      x-data="{ loading: false }" @submit="loading = true">
                    @csrf
                    @method('PUT')

                    <!-- SECTION: Account Info -->
                    <div class="mb-6">
                        <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4 border-b border-gray-100 pb-2">
                            Account Information
                        </h2>
                        <div class="grid grid-cols-2 gap-4">

                            <!-- Full Name -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Full Name <span class="text-red-400">*</span></label>
                                <input type="text" name="name" value="{{ old('name', $participant->user->name) }}" required
                                    class="w-full px-3 py-2.5 border-2 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark {{ $errors->has('name') ? 'border-red-400' : 'border-gray-300' }}">
                            </div>

                            <!-- Username (readonly) -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Username</label>
                                <input type="text" value="{{ $participant->user->username }}" disabled
                                    class="w-full px-3 py-2.5 border-2 border-gray-200 rounded-sm text-sm bg-gray-100 text-gray-400 cursor-not-allowed">
                                <p class="text-xs text-gray-400 mt-1">Username cannot be changed.</p>
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Email <span class="text-red-400">*</span></label>
                                <input type="email" name="email" value="{{ old('email', $participant->user->email) }}" required
                                    class="w-full px-3 py-2.5 border-2 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark {{ $errors->has('email') ? 'border-red-400' : 'border-gray-300' }}">
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Status <span class="text-red-400">*</span></label>
                                <select name="status" required
                                    class="w-full px-3 py-2.5 border-2 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark border-gray-300">
                                    <option value="active"   {{ old('status', $participant->status) === 'active'   ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $participant->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="banned"   {{ old('status', $participant->status) === 'banned'   ? 'selected' : '' }}>Banned</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <!-- SECTION: Personal Info -->
                    <div class="mb-8">
                        <h2 class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-4 border-b border-gray-100 pb-2">
                            Personal Information
                        </h2>
                        <div class="grid grid-cols-2 gap-4">

                            <!-- Phone -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone', $participant->phone) }}"
                                    placeholder="e.g. 081234567890"
                                    class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark">
                            </div>

                            <!-- Birth Date -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Date of Birth</label>
                                <input type="date" name="birth_date"
                                    value="{{ old('birth_date', $participant->birth_date?->format('Y-m-d')) }}"
                                    class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark">
                            </div>

                            <!-- Gender -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Gender</label>
                                <select name="gender"
                                    class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark">
                                    <option value="">— Select —</option>
                                    <option value="male"   {{ old('gender', $participant->gender) === 'male'   ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $participant->gender) === 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <!-- Institution -->
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Institution</label>
                                <input type="text" name="institution" value="{{ old('institution', $participant->institution) }}"
                                    placeholder="e.g. SMA Negeri 1 Bandung"
                                    class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark">
                            </div>

                            <!-- Address -->
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Address</label>
                                <textarea name="address" rows="2"
                                    placeholder="Full address..."
                                    class="w-full px-3 py-2.5 border-2 border-gray-300 rounded-sm text-sm bg-gray-50 focus:outline-none focus:border-brand-dark resize-none">{{ old('address', $participant->address) }}</textarea>
                            </div>

                        </div>
                    </div>

                    <!-- ACTIONS -->
                    <div class="flex gap-3">
                        <button type="submit"
                            :disabled="loading"
                            :class="loading ? 'opacity-70 cursor-not-allowed' : ''"
                            class="bg-brand-dark hover:bg-neutral-700 text-white font-medium text-sm px-6 py-2.5 rounded-sm transition flex items-center gap-2">
                            <span x-show="!loading">Update Participant</span>
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
