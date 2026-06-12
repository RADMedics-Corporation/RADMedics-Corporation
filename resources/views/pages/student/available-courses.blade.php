<x-layouts.dashboard>
    <div class="max-w-[1600px] mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700 mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Available Courses</h1>
            <p class="text-sm text-gray-500 mt-2">Browse all published training courses.</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm p-6 border border-gray-100 dark:border-gray-700">
            <livewire:course-list :role="auth()->user()->role?->name" />
        </div>
    </div>
</x-layouts.dashboard>