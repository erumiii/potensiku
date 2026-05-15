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
                <div class="text-4xl font-semibold">Admin Dashboard</div>
                <div class="mt-1">Monitoring metrics and academic integrity overview.</div>
            </div> 
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
                <div class="h-101 flex justify-center pt-45 bg-gray-100">
                    <div class="text-3xl font-semibold text-gray-500">There's no activity</div>
                </div>
            </div>
            
            <!-- Metrics -->
            <div class="w-98 h-113 border-solid border-2 border-gray-300 bg-white">
                <div class="border-solid border-b-2 border-gray-300 flex justify-center font-semibold text-xl py-4">Quick Metrics</div>
                <div class="p-7 bg-gray-100">
                    <!-- Questions Metrics -->
                    <div class="w-83 h-38 bg-white border-solid border-2 border-gray-300 p-5 mb-7">
                        <div class="flex justify-between">
                            <div class="w-11 h-11 bg-blue-200 flex justify-center pt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <div class="mt-2"><a href="/questions" class="text-blue-400 hover:text-blue-600 hover:cursor-pointer">View all</a></div>
                        </div>
                        <div>
                            <div class="text-base font-medium mt-2">TOTAL QUESTIONS</div>
                            <div class="text-3xl font-semibold">120</div> <!-- dummy data -->
                        </div>
                    </div>
                    
                    <!-- Participants Metrics -->
                    <div class="w-83 h-38 bg-white border-solid border-2 border-gray-300 p-5">
                        <div class="flex justify-between">
                            <div class="w-11 h-11 bg-blue-200 flex justify-center pt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            </div>
                            <div class="mt-2"><a href="/participants" class="text-blue-400 hover:text-blue-600 hover:cursor-pointer">View all</a></div>
                        </div>
                        <div>
                            <div class="text-base font-medium mt-2">TOTAL PARTICIPANTS</div>
                            <div class="text-3xl font-semibold">32</div> <!-- dummy data -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <x-footer />
    </div>
</div>
@yield('footer')