<x-layouts.dashboard>

    @if (auth()->user()->role?->name === 'student')
        
        <!-- Welcome Header -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-8 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                        Welcome back, {{ auth()->user()->name }}!
                    </h1>
                    <p class="text-cyan-600 dark:text-cyan-400 mt-2 text-lg">
                        Ready to continue your emergency medical training?
                    </p>
                </div>
                <div class="px-6 py-3 bg-cyan-50 dark:bg-cyan-900/30 text-cyan-700 dark:text-cyan-300 rounded-2xl text-sm font-medium">
                    Student Portal
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 hover:shadow transition-all border border-cyan-100">
                <div class="text-sm font-medium text-gray-500">Enrolled Courses</div>
                <div class="text-5xl font-bold text-cyan-600 mt-2">4</div>
                <div class="text-xs text-cyan-600 mt-1">+1 this month</div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 hover:shadow transition-all border border-blue-100">
                <div class="text-sm font-medium text-gray-500">In Progress</div>
                <div class="text-5xl font-bold text-blue-600 mt-2">2</div>
                <div class="text-xs text-blue-600 mt-1">Keep going!</div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 hover:shadow transition-all border border-emerald-100">
                <div class="text-sm font-medium text-gray-500">Completed</div>
                <div class="text-5xl font-bold text-emerald-600 mt-2">1</div>
                <div class="text-xs text-emerald-600 mt-1">Great progress</div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 hover:shadow transition-all border border-purple-100">
                <div class="text-sm font-medium text-gray-500">Certificates</div>
                <div class="text-5xl font-bold text-purple-600 mt-2">1</div>
                <div class="text-xs text-purple-600 mt-1">Earned</div>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-12 gap-8">
            
            <!-- Main Content -->
            <div class="xl:col-span-8 space-y-8">
                
                <!-- Continue Learning -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-8">
                    <h2 class="text-2xl font-semibold mb-6">Continue Learning</h2>
                    <div class="bg-cyan-50 dark:bg-cyan-900/20 rounded-2xl p-7 flex flex-col md:flex-row gap-6 items-center">
                        <div class="flex-1">
                            <div class="uppercase text-xs font-medium text-cyan-600 tracking-wider">Basic Life Support (BLS)</div>
                            <div class="text-2xl font-semibold mt-2">Module 3: CPR Techniques</div>
                            <div class="mt-6 h-3 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full w-[65%] bg-cyan-600 rounded-full"></div>
                            </div>
                            <div class="flex justify-between text-sm mt-3 text-gray-600">
                                <span>65% Complete</span>
                                <span>Lesson 7 of 11</span>
                            </div>
                        </div>
                        <button onclick="alert('Continuing course... (demo)')"
                                class="px-10 py-4 bg-cyan-600 hover:bg-cyan-700 text-white font-semibold rounded-2xl transition-all">
                            Continue Course
                        </button>
                    </div>
                </div>

                <!-- My Courses -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-8">
                    <h2 class="text-2xl font-semibold mb-6">My Courses</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="border border-gray-100 rounded-2xl p-6 hover:border-cyan-200 hover:shadow-md transition-all">
                            <div class="font-semibold">Basic First Aid</div>
                            <div class="text-sm text-gray-500 mt-1">Progress: 85%</div>
                            <div class="h-2.5 bg-gray-200 rounded-full mt-4">
                                <div class="h-full w-[85%] bg-emerald-500 rounded-full"></div>
                            </div>
                            <button class="mt-5 text-cyan-600 hover:text-cyan-700 font-medium">Resume →</button>
                        </div>
                        <div class="border border-gray-100 rounded-2xl p-6 hover:border-cyan-200 hover:shadow-md transition-all">
                            <div class="font-semibold">Emergency Response Fundamentals</div>
                            <div class="text-sm text-gray-500 mt-1">Progress: 40%</div>
                            <div class="h-2.5 bg-gray-200 rounded-full mt-4">
                                <div class="h-full w-[40%] bg-blue-500 rounded-full"></div>
                            </div>
                            <button class="mt-5 text-cyan-600 hover:text-cyan-700 font-medium">Resume →</button>
                        </div>
                    </div>
                </div>

                <!-- Available Courses -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-8">
                    <h2 class="text-2xl font-semibold mb-6">Available Courses</h2>
                    <livewire:course-list :role="auth()->user()->role?->name" />
                </div>

            </div>

            <!-- Sidebar -->
            <div class="xl:col-span-4 space-y-8">
                
                <!-- Announcements -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-8">
                    <h3 class="font-semibold text-lg mb-6">Announcements</h3>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-2 h-2 mt-2 bg-cyan-500 rounded-full"></div>
                            <div class="flex-1">
                                <div class="font-medium text-sm">New CPR Refresher Course Published</div>
                                <div class="text-xs text-gray-500">2 hours ago</div>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div class="w-2 h-2 mt-2 bg-amber-500 rounded-full"></div>
                            <div class="flex-1">
                                <div class="font-medium text-sm">Quiz Schedule Updated for June</div>
                                <div class="text-xs text-gray-500">Yesterday</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Tasks -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-8">
                    <h3 class="font-semibold text-lg mb-6">Upcoming Tasks</h3>
                    <div class="space-y-5 text-sm">
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="font-medium">First Aid Quiz</div>
                                <div class="text-gray-500 text-xs">Due June 8, 2026</div>
                            </div>
                            <span class="text-amber-600 text-xs font-medium bg-amber-100 px-3 py-1 rounded-full">2 days left</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="font-medium">Module 4: Patient Assessment</div>
                                <div class="text-gray-500 text-xs">Due June 12, 2026</div>
                            </div>
                            <span class="text-amber-600 text-xs font-medium bg-amber-100 px-3 py-1 rounded-full">6 days left</span>
                        </div>
                    </div>
                </div>

                <!-- Your Progress -->
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm p-8">
                    <h3 class="font-semibold text-lg mb-5">Your Progress</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Overall Completion</span>
                            <span class="font-semibold text-cyan-600">62%</span>
                        </div>
                        <div class="h-3 bg-gray-200 rounded-full">
                            <div class="h-full w-[62%] bg-cyan-600 rounded-full"></div>
                        </div>
                        <div class="pt-4 text-xs text-gray-500 border-t">
                            Current Streak: <span class="font-medium text-orange-600">7 days 🔥</span>
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