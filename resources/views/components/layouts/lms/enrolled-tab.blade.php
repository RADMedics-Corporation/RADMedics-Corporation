{{-- ENROLLED TAB --}}
<div id="enrolled-tab" class="tab-content hidden space-y-6">
    <section class="bg-white p-6 rounded-[2rem] shadow-lg">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-slate-900">Courses</h2>
            </div>
            <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-600">Enrolled 6</span>
        </div>

        <div class="mt-6 overflow-hidden rounded-[1.5rem] border border-slate-200">
            <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Progress</th>
                        <th class="px-4 py-3">Scores</th>
                        <th class="px-4 py-3">Due</th>
                        <th class="px-4 py-3">Time spent hh:mm:ss</th>
                        <th class="px-4 py-3">Enrolled Last visited</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white text-slate-700">
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <a href="{{ route('course.detail', 1) }}" class="block font-semibold text-blue-600 hover:text-blue-800">Example #1</a>
                            <div class="text-xs text-slate-500">Example #1 description</div>
                        </td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4 text-blue-600">00:02:52</td>
                        <td class="px-4 py-4">
                            <div>May 26, 2025</div>
                            <div class="text-xs text-slate-500">214 days ago</div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <a href="{{ route('course.detail', 2) }}" class="block font-semibold text-blue-600 hover:text-blue-800">Example #2</a>
                            <div class="text-xs text-slate-500">Example #2 description</div>
                        </td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">
                            <div>Jan 13, 2026</div>
                            <div class="text-xs text-slate-500">Never</div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <a href="{{ route('course.detail', 3) }}" class="block font-semibold text-blue-600 hover:text-blue-800">Example #3</a>
                            <div class="text-xs text-slate-500">Example #3 description</div>
                        </td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">1</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4 text-blue-600">00:29:01</td>
                        <td class="px-4 py-4">
                            <div>Sep 11, 2020</div>
                            <div class="text-xs text-slate-500">146 days ago</div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <a href="{{ route('course.detail', 4) }}" class="block font-semibold text-blue-600 hover:text-blue-800">Example #4</a>
                            <div class="text-xs text-slate-500">Example #4 description</div>
                        </td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4 text-blue-600">00:03:37</td>
                        <td class="px-4 py-4">
                            <div>Sep 20, 2021</div>
                            <div class="text-xs text-slate-500">211 days ago</div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <a href="{{ route('course.detail', 5) }}" class="block font-semibold text-blue-600 hover:text-blue-800">Example #5</a>
                            <div class="text-xs text-slate-500">Example #5 description</div>
                        </td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4 text-blue-600">00:00:02</td>
                        <td class="px-4 py-4">
                            <div>Aug 11, 2024</div>
                            <div class="text-xs text-slate-500">Never</div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-4">
                            <a href="{{ route('course.detail', 6) }}" class="block font-semibold text-blue-600 hover:text-blue-800">Example #6</a>
                            <div class="text-xs text-slate-500">Example #6 description</div>
                        </td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4">-</td>
                        <td class="px-4 py-4 text-blue-600">00:00:02</td>
                        <td class="px-4 py-4">
                            <div>Jun 9, 2022</div>
                            <div class="text-xs text-slate-500">784 days ago</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
