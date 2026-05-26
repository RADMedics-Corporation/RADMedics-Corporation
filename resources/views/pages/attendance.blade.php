<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-x1">
    <div class="flex flex-col gap-4 rounded-x1 border border-neutral-200 bg-white p-4 dark:boder-neutral-700 dark:bg-zinc-990 md:flex-row md:items-end md:justify-between">
        <div class="w-full md:max-w-xs">
            <label for="userType" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ __('Attendance') }}
            </label>
            <select 
                id="userType" 
                wire:model.live="userType"
                class="w-full rounded-lg border border-gray-300 px03 py-2 text -sm shahdow-sm transition focus:border-transparent focus:ring-2 focus:ring-blue dark:border-gray-600 dark:bg-gray-700 dark:text-white"
            >
                <option value="student">{{ __('Student') }}</option>
                <option value="instructor">{{ __('Instructor') }}</option>
                <option value="admin">{{ __('Admin') }}</option>
            </select>
        </div>

        <div class="w-full md:max-w-xs">
            <label for="selectedDate" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gary300 md:text-right">
                {{ __('Date') }}
            </label>
            <input
                type="date"
                id="selectedDate"
                wire:model.live="selectedDate"
                class="w-full cursor-pointer rounded-lg border border-gray-300 px-3 py-2 text-sm shadow-sm transition focus:border-transparent foucs:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white" 
            >
        </div>
    </div>

    <div class="relative flex-1 overflow-hidden rounded-x1 border border-neutral-200 bg-white dark:border-neutral-700 dark:bg-zinc-900">
        <div class="max-h-[32rem] overflow-auto">
            <table class="w-full table-fixed divide-y divide-gray-200 dark:divide-gray-700">
                <coolgroup>
                    <col class="w-1/5">
                    <col class="w-1/5">
                    <col class="w-1/5">
                    <col class="w-1/5">
                    <col class="w-1/5">
                </coolgroup>
                <thead class="sticky top-0 z-10 bg-gray-50 dark:bg-neutral-900">
                    <tr>
                        <th class="px-6 py-4 text-m text-center font-semibold text-gray-900 dark:text-white whitespace-nowrap">
                            {{ __('Name') }}
                        </th>
                        <th class="px-6 py-4 text-m text-center font-semibold text-gray-900 dark:text-white whitespace-nowrap">
                            {{ __('IN') }}
                        </th>
                        <th class="px-6 py-4 text-m text-center font-semibold text-gray-900 dark:text-white whitespace-nowrap">
                            {{ __('OUT') }}
                        </th>
                        <th class="px-6 py-4 text-m text-center font-semibold text-gray-900 dark:text-white whitespace-nowrap">
                            {{ __('IN') }}
                        </th>
                        <th class="px-6 py-4 text-m text-center font-semibold text-gray-900 dark:text-white whitespace-nowrap">
                            {{ __('OUT') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($attendanceData as $record)
                        @php($rowKey = strtolower(str_replace(' ', '-', $record['name'])).'-'.$selectedDate)
                        <tr wire:key="{{ $rowKey }}" class="transition hover:bg-gray-50 dark:hover:bg-neutral-700">
                            <td class="px-6 py-4 text-center align-middle text-sm font-medium texxt-gray-800 dark:text-gray-100">
                                {{ $record['name'] }}
                            </td>
                            <td class="px-6 py-4 text-center align-middle text-sm text-gray-600 dark:text-gray-400">
                                <span class="inline-flex min-w-[4.5rem] items-center justify-center rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                    {{ $record['in_1'] ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center align-middle text-sm text-gray-600 dark:text-gray-400">
                                <span class="inline-flex min-w-[4.5rem] items-center justify-center rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-800 dark:bg-red-900/30 dark:text-red-300">
                                    {{ $record['out_1'] ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center align-middle text-sm text-gray-600 dark:text-gray-400">
                                <span class="inline-flex min-w-[4.5rem] items-center justify-center rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                    {{ $record['in_2'] ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center align-middle text-sm text-gray-600 dark:text-gray-400">
                                <span class="inline-flex min-w-[4.5rem] items-center justify-center rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-800 dark:bg-red-900/30 dark:text-red-300">
                                    {{ $record['out_2'] ?? '-' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500 dark:text-gray-400">
                                {{ __('No attendance records found for the selected date and user type.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>