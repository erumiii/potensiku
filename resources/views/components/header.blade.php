{{-- resources/views/components/header.blade.php --}}

<div class="bg-neutral-50 border-b-2 border-gray-300 px-7 h-16 flex items-center justify-between">

    {{-- Judul --}}
    <p class="text-lg font-bold text-brand-dark">
        PeakScore Management Console
    </p>

    {{-- ============================= --}}
    {{-- Flash Success Message --}}
    {{-- ============================= --}}
    @if(session('success'))
    <div x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 4000)"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="flex items-center gap-2 bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm px-4 py-2 rounded-lg">

        {{-- Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 20 20"
             fill="currentColor"
             class="size-4 flex-shrink-0">

            <path fill-rule="evenodd"
                  d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                  clip-rule="evenodd" />
        </svg>

        {{-- Pesan --}}
        {{ session('success') }}
    </div>
    @endif



    {{-- ============================= --}}
    {{-- Flash Error Message --}}
    {{-- ============================= --}}
    @if(session('error'))
    <div x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 5000)"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="flex items-center gap-2 bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-2 rounded-lg">

        {{-- Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 20 20"
             fill="currentColor"
             class="size-4 flex-shrink-0">

            <path fill-rule="evenodd"
                  d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-8-5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 10 5Zm0 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                  clip-rule="evenodd" />
        </svg>

        {{-- Pesan --}}
        {{ session('error') }}
    </div>
    @endif

</div>