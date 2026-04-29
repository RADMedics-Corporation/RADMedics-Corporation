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

            <nav class="flex-1 p-4">
                <!-- Sidebar menu will go here later -->
                <p class="text-xs uppercase tracking-widest text-gray-400 mb-2 px-3">Main</p>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl bg-cyan-50 text-cyan-700 dark:bg-cyan-900/30 dark:text-cyan-300 font-medium">
                    <span>Dashboard</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="h-16 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 px-8 flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Dashboard</h2>

                <div class="flex items-center gap-4">
                    <span class="text-sm">{{ auth()->user()->name }}</span>
                    <span class="text-xs px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-800">
                        {{ auth()->user()->role?->label ?? auth()->user()->role?->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}" wire:submit.prevent="logout">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-auto p-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
