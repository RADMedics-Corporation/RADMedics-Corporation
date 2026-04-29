<x-layouts.dashboard>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Top Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">RADMedics Dashboard</h1>

                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        Welcome, <strong>{{ auth()->user()->name }}</strong>
                    </span>
                    <span class="px-3 py-1 text-xs font-medium rounded-full
                        {{ auth()->user()->role?->name === 'super_admin' ? 'bg-purple-100 text-purple-700' :
                           (auth()->user()->role?->name === 'admin' ? 'bg-blue-100 text-blue-700' :
                           'bg-green-100 text-green-700') }}">
                        {{ auth()->user()->role?->name }}
                    </span>
                </div>
            </div>
        </nav>

        <div class="max-w-7xl mx-auto px-6 py-8">
            @if (auth()->user()->role?->name === 'super_admin' || auth()->user()->role?->name === 'admin')
                <!-- Admin / Super Admin Dashboard -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-8">
                    <h2 class="text-3xl font-semibold mb-6">Administrator Dashboard</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Welcome back, Administrator. You have full access.</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">
                        <div class="bg-blue-50 dark:bg-blue-900/30 p-6 rounded-xl">
                            <h3 class="font-medium text-blue-600">Total Users</h3>
                            <p class="text-4xl font-bold mt-2">248</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/30 p-6 rounded-xl">
                            <h3 class="font-medium text-green-600">Active Incidents</h3>
                            <p class="text-4xl font-bold mt-2">12</p>
                        </div>
                        <div class="bg-purple-50 dark:bg-purple-900/30 p-6 rounded-xl">
                            <h3 class="font-medium text-purple-600">Medics Online</h3>
                            <p class="text-4xl font-bold mt-2">34</p>
                        </div>
                    </div>
                </div>

            @elseif (auth()->user()->role?->name === 'instructor')
                <!-- Instructor Dashboard -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-8">
                    <h2 class="text-3xl font-semibold mb-6">Instructor Dashboard</h2>
                    <p class="text-gray-600">Welcome, Instructor. Manage your training sessions.</p>
                </div>

            @elseif (auth()->user()->role?->name === 'student')
                <!-- Student Dashboard -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-8">
                    <h2 class="text-3xl font-semibold mb-6">Student Dashboard</h2>
                    <p class="text-gray-600">Welcome to your learning portal.</p>
                    <livewire:course-list :role="auth()->user()->role->name" />
                </div>
            @else
                <!-- Default / Medic / Temporary -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-8">
                    <h2 class="text-3xl font-semibold mb-6">Welcome to RADMedics</h2>
                    <p class="text-gray-600">You are logged in as a {{ auth()->user()->role?->label ?? 'User' }}.</p>
                </div>
            @endif
        </div>
    </div>
</x-layouts.dashboard>
