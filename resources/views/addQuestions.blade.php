@include('layouts.header')
@include('layouts.footer')

@yield('header')
<x-sidebar />
<div>
    <header>
        <x-header />
    </header>

    <!-- Main Content -->
    <main class="bg-slate-100 p-7">

        <!-- Admin & Tambah soal -->
        <div class="w-306 flex justify-start pl-48 mb-7">
            <div>
                <div class="flex items-center mb-2">
                    <a href="/questions" class="mr-1 text-gray-600 text-sm">Questions</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3 mt-1 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                    <p class="font-semibold text-sm">Add Question</p>
                </div>
                <h1 class="text-4xl font-semibold">Add Question</h1>
                <h2 class="text-gray-600">Make sure to to input the data correctly.</h2>
            </div> 
        </div>
        
        <!-- Recent Activities & Quick Metric -->
        <div class="flex justify-center">
            <!-- Recent Activities -->
            <div class="w-210 h-108 border-solid border-2 border-gray-300 bg-white">
                
            </div>
        </div>
    </main>
    <footer>
        <x-footer />
    </footer>
</div>
@yield('footer')