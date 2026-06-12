<x-layouts.dashboard>

    @if (auth()->user()->role?->name === 'student')

        <div class="max-w-[1600px] mx-auto">

            <!-- Compact Welcome Header -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-5 mb-5 border border-gray-100 dark:border-gray-700">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                            Welcome back, {{ auth()->user()->name }}!
                        </h1>
                        <p class="text-sm text-cyan-600 dark:text-cyan-400 mt-1">
                            Ready to continue your emergency medical training?
                        </p>
                    </div>

                    <div class="px-4 py-2 bg-cyan-50 dark:bg-cyan-900/30 text-cyan-700 dark:text-cyan-300 rounded-xl text-xs font-semibold">
                        Student Portal
                    </div>
                </div>
            </div>

            <!-- Compact Stats Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-5">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-4 border border-cyan-100 dark:border-cyan-900/40">
                    <div class="text-xs font-semibold text-gray-500 dark:text-gray-400">Enrolled Courses</div>
                    <div class="text-3xl font-bold text-cyan-600 leading-tight mt-1">4</div>
                    <div class="text-[11px] text-cyan-600 mt-1">+1 this month</div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-4 border border-blue-100 dark:border-blue-900/40">
                    <div class="text-xs font-semibold text-gray-500 dark:text-gray-400">In Progress</div>
                    <div class="text-3xl font-bold text-blue-600 leading-tight mt-1">2</div>
                    <div class="text-[11px] text-blue-600 mt-1">Keep going!</div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-4 border border-emerald-100 dark:border-emerald-900/40">
                    <div class="text-xs font-semibold text-gray-500 dark:text-gray-400">Completed</div>
                    <div class="text-3xl font-bold text-emerald-600 leading-tight mt-1">1</div>
                    <div class="text-[11px] text-emerald-600 mt-1">Great progress</div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-4 border border-purple-100 dark:border-purple-900/40">
                    <div class="text-xs font-semibold text-gray-500 dark:text-gray-400">Certificates</div>
                    <div class="text-3xl font-bold text-purple-600 leading-tight mt-1">1</div>
                    <div class="text-[11px] text-purple-600 mt-1">Earned</div>
                </div>
            </div>

            <!-- 9:3 Dashboard Layout -->
            <div class="grid grid-cols-1 xl:grid-cols-12 gap-5">

                <!-- Main Content -->
                <div class="xl:col-span-9 space-y-5">

                    <!-- Continue Learning -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-5 border border-gray-100 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-bold text-gray-800 dark:text-white">Continue Learning</h2>
                            <span class="text-xs text-gray-500 dark:text-gray-400">Lesson 7 of 11</span>
                        </div>

                        <div class="bg-cyan-50 dark:bg-cyan-900/20 rounded-2xl p-4 flex flex-col md:flex-row md:items-center gap-4">
                            <div class="flex-1">
                                <div class="uppercase text-[11px] font-bold text-cyan-600 tracking-wider">
                                    Basic Life Support (BLS)
                                </div>

                                <div class="text-xl font-bold text-gray-800 dark:text-white mt-1">
                                    Module 3: CPR Techniques
                                </div>

                                <div class="mt-3 h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                    <div class="h-full w-[65%] bg-cyan-600 rounded-full"></div>
                                </div>

                                <div class="flex justify-between text-xs mt-2 text-gray-500 dark:text-gray-400">
                                    <span>65% Complete</span>
                                    <span>Continue where you left off</span>
                                </div>
                            </div>

                            <button onclick="alert('Continuing course... (demo)')"
                                    class="px-6 py-2.5 bg-cyan-600 hover:bg-cyan-700 text-white text-sm font-semibold rounded-xl transition">
                                Continue Course
                            </button>
                        </div>
                    </div>

                    <!-- My Courses -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-5 border border-gray-100 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-bold text-gray-800 dark:text-white">My Courses</h2>

                            <a href="{{ route('student.courses') }}"
                               class="text-xs font-semibold text-cyan-600 hover:text-cyan-700">
                                View All
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Course 1 -->
                            <div class="border border-gray-100 dark:border-gray-700 rounded-2xl p-4 hover:border-cyan-200 hover:shadow-sm transition-all">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <div class="font-bold text-gray-800 dark:text-white">Basic First Aid</div>
                                        <div class="text-xs text-gray-500 mt-1">Emergency Response</div>
                                    </div>

                                    <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-lg">
                                        85%
                                    </span>
                                </div>

                                <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full mt-4 overflow-hidden">
                                    <div class="h-full w-[85%] bg-emerald-500 rounded-full"></div>
                                </div>

                                <div class="flex justify-between items-center mt-3">
                                    <span class="text-xs text-gray-500">Lesson 12 of 14</span>
                                    <button class="text-cyan-600 hover:text-cyan-700 text-xs font-bold">
                                        Resume →
                                    </button>
                                </div>
                            </div>

                            <!-- Course 2 -->
                            <div class="border border-gray-100 dark:border-gray-700 rounded-2xl p-4 hover:border-cyan-200 hover:shadow-sm transition-all">
                                <div class="flex items-start justify-between gap-3">
                                    <div>
                                        <div class="font-bold text-gray-800 dark:text-white">Emergency Response Fundamentals</div>
                                        <div class="text-xs text-gray-500 mt-1">Core Training</div>
                                    </div>

                                    <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded-lg">
                                        40%
                                    </span>
                                </div>

                                <div class="h-2 bg-gray-200 dark:bg-gray-700 rounded-full mt-4 overflow-hidden">
                                    <div class="h-full w-[40%] bg-blue-500 rounded-full"></div>
                                </div>

                                <div class="flex justify-between items-center mt-3">
                                    <span class="text-xs text-gray-500">Lesson 4 of 10</span>
                                    <button class="text-cyan-600 hover:text-cyan-700 text-xs font-bold">
                                        Resume →
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Sidebar: Upcoming Tasks Only -->
                <div class="xl:col-span-3">
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-5 border border-gray-100 dark:border-gray-700 xl:h-full">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-bold text-lg text-gray-800 dark:text-white">Upcoming Tasks</h3>
                            <span class="text-xs text-gray-500">2 pending</span>
                        </div>

                        <div class="space-y-4">
                            <div class="border border-gray-100 dark:border-gray-700 rounded-xl p-4 hover:border-cyan-200 transition">
                                <div class="font-semibold text-sm text-gray-800 dark:text-white">
                                    First Aid Quiz
                                </div>

                                <div class="text-xs text-gray-500 mt-1">
                                    Due June 8, 2026
                                </div>

                                <div class="mt-3">
                                    <span class="inline-block text-xs text-amber-700 bg-amber-100 px-3 py-1 rounded-full font-semibold">
                                        2 days left
                                    </span>
                                </div>
                            </div>

                            <div class="border border-gray-100 dark:border-gray-700 rounded-xl p-4 hover:border-cyan-200 transition">
                                <div class="font-semibold text-sm text-gray-800 dark:text-white">
                                    Module 4: Patient Assessment
                                </div>

                                <div class="text-xs text-gray-500 mt-1">
                                    Due June 12, 2026
                                </div>

                                <div class="mt-3">
                                    <span class="inline-block text-xs text-amber-700 bg-amber-100 px-3 py-1 rounded-full font-semibold">
                                        6 days left
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 pt-4 border-t border-gray-100 dark:border-gray-700">
                            <p class="text-xs text-gray-500 leading-relaxed">
                                Complete your pending tasks to keep your course progress updated.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @else
        <!-- Admin / Instructor fallback -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-10">
            <h2 class="text-3xl font-semibold mb-4">Welcome</h2>
            <p class="text-gray-600">Your role-based dashboard content will appear here.</p>
        </div>
    @endif

</x-layouts.dashboard>