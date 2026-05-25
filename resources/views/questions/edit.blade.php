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
                <li class="pl-1 hover:bg-neutral-200 text-gray-800 font-medium"><a href="/questions" class="block p-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                    </svg>
                    Questions
                </a></li>
                <li class="pl-1 hover:bg-neutral-200"><a href="/participants" class="block p-3 flex items-center">
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

        <!-- MAIN CONTENT -->
        <main class="flex-1 overflow-y-auto overflow-x-hidden bg-brand-light p-7">

            <!-- HEADING -->
            <div class="max-w-3xl mx-auto mb-5">
                <div class="flex items-center mb-2">
                    <a href="/questions" class="mr-1 text-gray-600 text-sm hover:underline">Questions</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 mt-1 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                    <p class="font-semibold text-sm">Edit Question</p>
                </div>
                <h1 class="text-4xl font-semibold">Edit Question</h1>
                <h2 class="text-gray-600">Make sure to input the data correctly.</h2>
            </div>

            <!-- FORM CARD -->
            <div class="max-w-3xl mx-auto">
                <div class="border-solid border-2 border-gray-300 bg-white p-8 rounded-sm">
                    {{-- Method spoofing untuk PUT --}}
                    <form action="{{ route('questions.update', $question->soalId) }}" method="POST" class="w-full">
                        @csrf
                        @method('PUT')

                        <!-- CATEGORY + CORRECT ANSWER -->
                        <div class="flex gap-x-5">
                            <!-- CATEGORY -->
                            <div class="flex-1">
                                <label class="font-bold text-xs">QUESTION CATEGORY</label>
                                <select name="kategori" class="pl-2 border-solid rounded-sm border-2 w-full h-10 mt-1 bg-neutral-100 {{ $errors->has('kategori') ? 'border-red-500' : 'border-gray-300' }}">
                                    <option value="" disabled hidden>Choose a category</option>
                                    @foreach(['Verbal', 'Numeric', 'Logic', 'Spatial'] as $cat)
                                        <option value="{{ $cat }}" {{ old('kategori', $question->kategori) == $cat ? 'selected' : '' }}>
                                            {{ $cat }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="min-h-5 mt-1">
                                    @error('kategori')
                                        <p class="text-red-500 text-xs">The category field is required.</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- CORRECT ANSWER -->
                            <div class="flex-1">
                                <label class="font-bold text-xs">CORRECT ANSWER</label>
                                <select name="jawabanBenar" class="pl-2 border-solid rounded-sm border-2 w-full h-10 mt-1 bg-neutral-100 {{ $errors->has('jawabanBenar') ? 'border-red-500' : 'border-gray-300' }}">
                                    <option value="" disabled hidden>Choose an answer</option>
                                    @foreach(['A', 'B', 'C', 'D'] as $ans)
                                        <option value="{{ $ans }}" {{ old('jawabanBenar', $question->jawabanBenar) == $ans ? 'selected' : '' }}>
                                            {{ $ans }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="min-h-5 mt-1">
                                    @error('jawabanBenar')
                                        <p class="text-red-500 text-xs">The correct answer field is required.</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- QUESTION TEXT -->
                        <div class="mt-5">
                            <label class="font-bold text-xs">QUESTION TEXT</label>
                            <textarea name="isiSoal" placeholder="Enter question instruction in here"
                                class="bg-neutral-100 mt-1 border-solid border-2 rounded-sm p-2 px-3 w-full text-left align-top resize-none {{ $errors->has('isiSoal') ? 'border-red-500' : 'border-gray-300' }}"
                                rows="4">{{ old('isiSoal', $question->isiSoal) }}</textarea>
                            <div class="min-h-5 mt-1">
                                @error('isiSoal')
                                    <p class="text-red-500 text-xs">The question text field is required.</p>
                                @enderror
                            </div>
                        </div>

                        <!-- ANSWER OPTIONS -->
                        <div class="mt-5">
                            <p class="font-bold text-xs mb-3">ANSWER OPTION</p>
                            @foreach(['A','B','C','D'] as $opt)
                            <div class="mb-2">
                                <div class="flex items-center">
                                    <span class="bg-brand-dark text-brand-light w-10 h-10 inline-flex items-center justify-center font-medium rounded-xs shrink-0">{{ $opt }}</span>
                                    <input type="text" name="opsi{{ $opt }}"
                                        value="{{ old('opsi'.$opt, $question->{'opsi'.$opt}) }}"
                                        placeholder="Insert {{ $opt }} text answer"
                                        class="ml-2 px-4 py-2 w-full rounded border {{ $errors->has('opsi'.$opt) ? 'border-red-500' : 'border-gray-300' }}">
                                </div>
                                <div class="min-h-5 mt-1 ml-12">
                                    @error('opsi'.$opt)
                                        <p class="text-red-500 text-xs">The option {{ $opt }} field is required.</p>
                                    @enderror
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- BUTTONS -->
                        <div class="flex justify-end gap-3 pt-4">
                            <a href="{{ route('questions.index') }}"
                                class="px-4 py-2 rounded border-2 border-gray-300 font-medium hover:bg-gray-50">
                                Cancel
                            </a>
                            <button type="submit" class="px-4 py-2 rounded bg-blue-600 font-medium text-white hover:bg-blue-700">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
        <footer class="flex-none">
            <x-footer />
        </footer>
    </div>
</div>
@yield('footer')