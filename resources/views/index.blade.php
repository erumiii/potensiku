@include('layouts.header')
@include('layouts.footer')

@yield('header')
<x-sidebar />
<div>
    <div>
        <x-header />
    </div>

    <!-- Main Content -->
    <div class="bg-slate-100 p-7">

        <!-- Admin & Tambah soal -->
        <div class="w-306 flex justify-between mb-7">
            <div>
                <div class="text-2xl font-bold">Admin Dashboard</div>
                <div class="mt-1">Monitoring metrics and academic integrity overview.</div>
            </div> 
            <a href="/questions">
                <div class="bg-blue-700 hover:bg-blue-800 hover:cursor-pointer text-white font-medium rounded-sm w-40 h-13 pt-3 pr-3 p-2 flex justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add Questions
                </div> 
            </a>
        </div>
        
        <!-- Recent Activities & Quick Metric -->
        <div class="flex justify-between">
            <!-- Recent Activities -->
            <div class="w-200 h-113 border-solid border-2 border-gray-300 bg-white">
                <div class="border-solid border-b-2 border-gray-300 py-2 px-4 flex justify-between">
                    <div class="text-lg font-semibold">Recent Test Activities</div>
                    <div><a href="#" class="text-blue-400 hover:text-blue-600 hover:cursor-pointer">View all</a></div>
                </div>

                <!-- Activities Content (ga dilanjut) -->
                <div class="flex justify-center pt-45">
                    <div class="text-3xl font-semibold text-gray-500">There's no activity</div>
                </div>
            </div>
            
            <!-- Metrics -->
            <div>
                <!-- Questions Metrics -->
                <div class="w-98 h-53 bg-white border-solid border-2 border-gray-300 mb-7">
                    
                </div>

                <!-- Participants Metrics -->
                <div class="w-98 h-53 bg-white border-solid border-2 border-gray-300">

                </div>
            </div>
        </div>
    </div>
    <div>
        <x-footer />
    </div>
</div>
@yield('footer')