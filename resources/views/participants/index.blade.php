@include('layouts.header')
@include('layouts.footer')

@yield('header')
<div class="flex-1 flex min-h-0 overflow-hidden">
    <x-sidebar />
    <div class="flex flex-col flex-1 min-h-0 overflow-hidden">
        <header class="flex-none">
            <x-header />
        </header>

        <!-- MAIN CONTENT -->
        <main class="flex-1 overflow-y-auto overflow-x-hidden bg-brand-light p-7">

            <!-- HEADING & ADD BUTTON -->
            <div class="w-full flex justify-between mb-7">
                <div>
                    <h1 class="text-4xl font-semibold">Participants</h1>
                    <h2 class="text-gray-600">Manage test participants and their accounts.</h2>
                </div>
                <a href="{{ route('participants.create') }}">
                    <div class="bg-brand-dark hover:bg-neutral-700 cursor-pointer text-white font-medium rounded-sm w-44 h-13 pt-3 px-3 flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add Participant
                    </div>
                </a>
            </div>

            <!-- FILTER & SEARCH BAR -->
            <div class="border-2 border-gray-300 bg-white mb-0">
                <form method="GET" action="{{ route('participants.index') }}" class="flex items-center gap-3 px-4 py-3">

                    <!-- Search -->
                    <div class="relative flex-1 max-w-sm">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </span>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search by name, email, or code..."
                            class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-sm text-sm focus:outline-none focus:border-gray-500 bg-gray-50"
                        >
                    </div>

                    <!-- Status Filter -->
                    <select name="status" class="border border-gray-300 rounded-sm px-3 py-2 text-sm bg-gray-50 focus:outline-none focus:border-gray-500">
                        <option value="">All Status</option>
                        <option value="active"   {{ request('status') === 'active'   ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="banned"   {{ request('status') === 'banned'   ? 'selected' : '' }}>Banned</option>
                    </select>

                    <!-- Submit -->
                    <button type="submit" class="bg-brand-dark hover:bg-neutral-700 text-white text-sm px-4 py-2 rounded-sm font-medium transition">
                        Filter
                    </button>

                    @if(request('search') || request('status'))
                    <a href="{{ route('participants.index') }}" class="text-sm text-gray-500 hover:text-gray-700 underline">
                        Clear
                    </a>
                    @endif

                    <!-- Total count -->
                    <span class="ml-auto text-sm text-gray-500">
                        Showing {{ $participants->firstItem() ?? 0 }}–{{ $participants->lastItem() ?? 0 }}
                        of {{ $participants->total() }} participants
                    </span>
                </form>
            </div>

            <!-- DATA TABLE -->
            <div class="border-2 border-t-0 border-gray-300 bg-white">

                @if($participants->isEmpty())
                <!-- EMPTY STATE -->
                <div class="flex flex-col items-center justify-center py-20 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-16 mb-4 opacity-40">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <p class="text-lg font-medium text-gray-500">No participants found</p>
                    <p class="text-sm mt-1">
                        @if(request('search') || request('status'))
                            Try changing your search or filter.
                        @else
                            Start by adding your first participant.
                        @endif
                    </p>
                </div>

                @else
                <!-- TABLE -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b-2 border-gray-300 bg-gray-50">
                                <th class="text-xs font-semibold text-gray-600 text-center px-4 py-3 w-16">NO</th>
                                <th class="text-xs font-semibold text-gray-600 text-left px-4 py-3">PARTICIPANT</th>
                                <th class="text-xs font-semibold text-gray-600 text-center px-4 py-3">CODE</th>
                                <th class="text-xs font-semibold text-gray-600 text-center px-4 py-3">GENDER</th>
                                <th class="text-xs font-semibold text-gray-600 text-left px-4 py-3">INSTITUTION</th>
                                <th class="text-xs font-semibold text-gray-600 text-center px-4 py-3">STATUS</th>
                                <th class="text-xs font-semibold text-gray-600 text-center px-4 py-3">REGISTERED</th>
                                <th class="text-xs font-semibold text-gray-600 text-center px-4 py-3">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participants as $participant)
                            <tr class="border-b border-gray-200 bg-white hover:bg-gray-50 transition">

                                <!-- NO -->
                                <td class="text-center px-4 py-3 text-gray-500">
                                    {{ $participants->firstItem() + $loop->index }}
                                </td>

                                <!-- PARTICIPANT (nama + email) -->
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <!-- Avatar initial -->
                                        <div class="w-9 h-9 rounded-full bg-brand-dark text-white flex items-center justify-center font-semibold text-sm shrink-0">
                                            {{ strtoupper(substr($participant->user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">{{ $participant->user->name }}</p>
                                            <p class="text-xs text-gray-400">{{ $participant->user->email }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- CODE -->
                                <td class="text-center px-4 py-3">
                                    <span class="font-mono text-xs bg-gray-100 border border-gray-200 px-2 py-1 rounded">
                                        {{ $participant->participant_code ?? '—' }}
                                    </span>
                                </td>

                                <!-- GENDER -->
                                <td class="text-center px-4 py-3 text-gray-600 capitalize">
                                    {{ $participant->gender ?? '—' }}
                                </td>

                                <!-- INSTITUTION -->
                                <td class="px-4 py-3 text-gray-600 max-w-[180px] truncate">
                                    {{ $participant->institution ?? '—' }}
                                </td>

                                <!-- STATUS BADGE -->
                                <td class="text-center px-4 py-3">
                                    @if($participant->status === 'active')
                                        <span class="inline-flex items-center gap-1 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-medium px-2.5 py-1 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Active
                                        </span>
                                    @elseif($participant->status === 'inactive')
                                        <span class="inline-flex items-center gap-1 bg-gray-100 border border-gray-200 text-gray-500 text-xs font-medium px-2.5 py-1 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                            Inactive
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 bg-red-50 border border-red-200 text-red-600 text-xs font-medium px-2.5 py-1 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                            Banned
                                        </span>
                                    @endif
                                </td>

                                <!-- REGISTERED DATE -->
                                <td class="text-center px-4 py-3 text-gray-500 text-xs">
                                    {{ $participant->created_at->format('d M Y') }}
                                </td>

                                <!-- ACTION -->
                                <td class="text-center px-4 py-3">
                                    <div class="flex items-center justify-center gap-3">

                                        <!-- Edit -->
                                        <a href="{{ route('participants.edit', $participant) }}"
                                           title="Edit participant"
                                           class="text-blue-500 hover:text-blue-700 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>
                                        </a>

                                        <!-- Delete -->
                                        <form method="POST"
                                              action="{{ route('participants.destroy', $participant) }}"
                                              x-data
                                              @submit.prevent="
                                                if(confirm('Delete participant {{ addslashes($participant->user->name) }}? This action cannot be undone.'))
                                                    $el.submit()
                                              ">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete participant"
                                                    class="text-red-400 hover:text-red-600 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
                @if($participants->hasPages())
                <div class="px-4 py-3 border-t border-gray-200 bg-gray-50 flex items-center justify-between">
                    <p class="text-xs text-gray-500">
                        Page {{ $participants->currentPage() }} of {{ $participants->lastPage() }}
                    </p>
                    <div class="flex gap-1">
                        {{-- Previous --}}
                        @if($participants->onFirstPage())
                            <span class="px-3 py-1.5 text-xs text-gray-300 border border-gray-200 rounded cursor-not-allowed">← Prev</span>
                        @else
                            <a href="{{ $participants->previousPageUrl() }}"
                               class="px-3 py-1.5 text-xs text-gray-600 border border-gray-300 rounded hover:bg-gray-100 transition">← Prev</a>
                        @endif

                        {{-- Page numbers --}}
                        @foreach($participants->getUrlRange(max(1, $participants->currentPage() - 2), min($participants->lastPage(), $participants->currentPage() + 2)) as $page => $url)
                            @if($page === $participants->currentPage())
                                <span class="px-3 py-1.5 text-xs bg-brand-dark text-white border border-brand-dark rounded font-medium">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                   class="px-3 py-1.5 text-xs text-gray-600 border border-gray-300 rounded hover:bg-gray-100 transition">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if($participants->hasMorePages())
                            <a href="{{ $participants->nextPageUrl() }}"
                               class="px-3 py-1.5 text-xs text-gray-600 border border-gray-300 rounded hover:bg-gray-100 transition">Next →</a>
                        @else
                            <span class="px-3 py-1.5 text-xs text-gray-300 border border-gray-200 rounded cursor-not-allowed">Next →</span>
                        @endif
                    </div>
                </div>
                @endif

                @endif
            </div>

        </main>
        <footer class="flex-none">
            <x-footer />
        </footer>
    </div>
</div>
@yield('footer')
