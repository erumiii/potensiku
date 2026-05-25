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
            <!-- HEADING & ADD QUESTION BUTTON -->
            <div class="flex justify-between mb-7 w-full">
                <div>
                    <h1 class="text-4xl font-semibold">Question Bank</h1>
                    <h2 class="text-gray-600">Manage question banks for academic potential tests.</h2>
                </div> 
                <a href="/questions/add">
                    <div class="bg-brand-dark hover:bg-neutral-700 hover:cursor-pointer text-white font-medium rounded-sm w-40 h-13 pt-3 pr-3 p-2 mr-2 flex justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add Questions
                    </div> 
                </a>
            </div>
            
            <!-- FILTER + INFO -->
            <div class="flex items-center justify-between gap-3 mb-4">
                {{-- FILTER CATEGORY --}}
                <form method="GET" action="{{ route('questions.index') }}" class="flex-shrink-0">
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    <select name="category" onchange="this.form.submit()"
                        class="border border-gray-300 rounded px-3 py-1.5 text-sm text-gray-700 bg-white focus:outline-none">
                        <option value="">All Category</option>
                        <option value="Numeric" {{ request('category') == 'Numeric' ? 'selected' : '' }}>Numeric</option>
                        <option value="Spatial" {{ request('category') == 'Spatial' ? 'selected' : '' }}>Spatial</option>
                        <option value="Logic"   {{ request('category') == 'Logic'   ? 'selected' : '' }}>Logic</option>
                        <option value="Verbal"  {{ request('category') == 'Verbal'  ? 'selected' : '' }}>Verbal</option>
                    </select>
                </form>

                {{-- SEARCH BAR --}}
                <form id="questions-search-form" method="GET" action="{{ route('questions.index') }}" class="flex items-center gap-2">
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                            </svg>
                        </span>
                        <input id="searchQuery" type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search question..."
                            oninput="document.getElementById('searchClearBtn').style.display = this.value.trim() ? 'flex' : 'none'"
                            class="pl-9 pr-10 py-1.5 border border-gray-300 rounded text-sm text-gray-700 bg-white focus:outline-none focus:ring-1 focus:ring-gray-400 w-64">
                        <button id="searchClearBtn" type="button"
                            onclick="clearSearchInput()"
                            class="absolute inset-y-0 right-2 flex items-center justify-center text-gray-400 hover:text-gray-600"
                            style="display: {{ request('search') ? 'flex' : 'none' }};">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- TABEL -->
            <div id="questions-results">
                <div class="bg-white rounded border border-gray-300 overflow-hidden">
                    <table class="w-full text-sm text-left">
                    <thead class="border-b border-gray-300">
                        <tr>
                            <th class="px-6 py-3 font-semibold text-gray-600 w-20">NO</th>
                            <th class="px-6 py-3 font-semibold text-gray-600">QUESTION</th>
                            <th class="px-6 py-3 font-semibold text-gray-600 w-40">CATEGORY</th>
                            <th class="px-6 py-3 font-semibold text-gray-600 w-24">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($soal as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-500">{{ str_pad($loop->index + 1 + ($soal->currentPage() - 1) * $soal->perPage(), 3, '0', STR_PAD_LEFT) }}.</td>
                            <td class="px-6 py-4 text-gray-800">{{ $item->isiSoal }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $item->kategori }}</td>    
                            <td class="px-6 py-4 flex items-center gap-3">
                                <a href="{{ route('questions.edit', $item->soalId) }}" class="text-blue-400 hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 3.487a2.25 2.25 0 1 1 3.182 3.182L7.5 19.213l-4.5 1 1-4.5 12.862-12.726z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('questions.destroy', $item->soalId) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this question?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-600 hover:cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-400">No questions found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="mt-2 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <span class="text-sm text-gray-500">
                    Showing {{ $soal->firstItem() }}-{{ $soal->lastItem() }} of {{ $soal->total() }} questions
                </span>
                <div class="w-full md:w-auto">
                    {{ $soal->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
        </main>
        <footer class="flex-none">
            <x-footer />
        </footer>
    </div>
</div>
<script>
    async function clearSearchInput() {
        const input = document.getElementById('searchQuery');
        const clearBtn = document.getElementById('searchClearBtn');
        const category = document.querySelector('#questions-search-form input[name="category"]').value;

        input.value = '';
        clearBtn.style.display = 'none';
        input.dispatchEvent(new Event('input'));

        const url = new URL(window.location.href);
        url.searchParams.delete('search');
        url.searchParams.delete('page');
        if (category) {
            url.searchParams.set('category', category);
        } else {
            url.searchParams.delete('category');
        }

        try {
            const response = await fetch(url.toString(), {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            if (!response.ok) {
                return;
            }
            const html = await response.text();
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newResults = doc.querySelector('#questions-results');
            if (newResults) {
                document.getElementById('questions-results').innerHTML = newResults.innerHTML;
                window.history.replaceState({}, '', url.toString());
            }
        } catch (error) {
            console.error('Clear search failed', error);
        }
    }
</script>
@yield('footer')