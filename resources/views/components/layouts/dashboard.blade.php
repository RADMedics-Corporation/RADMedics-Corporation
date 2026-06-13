<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RADMedics - Dashboard</title>
    <link rel="icon" href="/images/radmedics-logo.png" type="image/png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            content: ["./resources/**/*.blade.php"],
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'ui-sans-serif', 'system-ui'],
                    },
                    colors: {
                        cyan: '#0ABAB5',
                        'dark-teal': '#056360',
                    }
                }
            }
        }
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireStyles
</head>
<body class="bg-gray-50 dark:bg-gray-950 min-h-screen">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar (Optional - you can remove if you don't want sidebar yet) -->
        <aside class="w-72 bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700 flex flex-col">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center gap-3">
                    <img src="/images/radmedics-logo.png" alt="RADMedics" class="w-10 h-10">
                    <div>
                        <h1 class="font-bold text-xl tracking-tight">RADMedics</h1>
                        <p class="text-xs text-gray-500">Emergency System</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 p-4 space-y-1">
                <p class="text-xs uppercase tracking-widest text-gray-400 mb-3 px-3">Main</p>
                
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all
                        {{ request()->routeIs('dashboard') 
                            ? 'bg-cyan-50 text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300 font-semibold' 
                            : 'text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                    <span class="text-sm">Dashboard</span>
                </a>

                <!-- Courses -->
                <a href="{{ route('student.courses') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all
                        {{ request()->routeIs('student.courses') 
                            ? 'bg-cyan-50 text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300 font-semibold' 
                            : 'text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                    <span class="text-sm">Courses</span>
                </a>

                <!-- Available Courses -->
                <a href="{{ route('student.available-courses') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-xl transition-all
                        {{ request()->routeIs('student.available-courses') 
                            ? 'bg-cyan-50 text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300 font-semibold' 
                            : 'text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                    <span class="text-sm">Available Courses</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="h-16 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 px-8 flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Dashboard</h2>

                <!-- User Avatar + Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click.prevent="open = !open" 
                            @click.outside="open = false"
                            @scroll.window="open = false"
                            class="flex items-center gap-3 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-full py-1.5 px-3 transition-colors">

                            <!-- Circular Avatar -->
                        <div class="w-9 h-9 rounded-full bg-teal-600 text-white flex items-center justify-center font-semibold text-sm uppercase">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>

                        <!-- Name -->
                        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ auth()->user()->name }}
                        </span>

                        <!-- Arrow -->
                        <svg class="w-4 h-4 text-gray-400 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 py-2 z-50"
                        style="display: none;">

                        <!-- User Info -->
                        <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-700">
                            <div class="text-sm font-semibold text-gray-800 dark:text-white">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</div>
                        </div>

                        <!-- Edit Profile -->
                        <a href="{{ route('profile.edit') }}"
                        class="block px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-teal-50 dark:hover:bg-teal-900/20 hover:text-teal-700 dark:hover:text-teal-300 transition-colors">
                            Edit Profile
                        </a>

                        <!-- Settings -->
                        <a href="{{ route('settings.profile') }}"
                        class="block px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-teal-50 dark:hover:bg-teal-900/20 hover:text-teal-700 dark:hover:text-teal-300 transition-colors">
                            Settings
                        </a>

                        <!-- Divider -->
                        <div class="border-t border-gray-100 dark:border-gray-700 my-1"></div>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-auto p-8">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
</body>
</html>
