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

        <!-- HEADING -->
        <div class="w-306 flex justify-start pl-48 mb-5">
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
        
        <!-- FORM INPUT DATA -->
        <div class="flex justify-center">
            <div class="flex justify-center w-210 h-208 border-solid border-2 border-gray-300 bg-white p-5">
                <form action="" method="post">
                    @csrf
                    <div class="flex justify-between gap-x-5">
                        <!-- CATEGORY -->
                        <div class="">
                            <label for="category-select" class="font-bold text-xs">QUESTION CATEGORY</label><br>
                            <select id="category-select" class="pl-2 border-solid rounded-sm border-2 w-95 h-10 mt-1 border-gray-300 bg-neutral-100">
                                <option value="" disable selected hidden>Choose a category</option>
                                <option value="verbal">Verbal</option>
                                <option value="numeric">Numeric</option>
                                <option value="logic">Logic</option>
                                <option value="partial">Partial</option>
                            </select>
                        </div>

                        <!-- CORRECT ANSWER -->
                        <div class="">
                            <label for="answer-select" class="font-bold text-xs">CORRECT ANSWER</label><br>
                            <select id="answer-select" class="pl-2 border-solid rounded-sm border-2 w-95 h-10 mt-1 border-gray-300 bg-neutral-100">
                                <option value="" disable selected hidden >Choose an answer</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>
                    </div>

                    <!-- QUESTION TEXT -->
                    <div class="mt-2">
                        <label for="question-input" class="font-bold text-xs">QUESTION TEXT</label><br>
                        <textarea id="question-input" name="question-input" placeholder="Enter question instruction in here..." required
                        class="bg-neutral-100 mt-1 border-solid border-2 rounded-sm border-gray-300 p-2 px-3 w-195 h-30 text-left align-top resize-none" rows="4"></textarea>
                    </div>
                    <!-- ANSWER OPTION -->
                    <div>
                        
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