@extends('components.layouts.app')

@section('content')

<div class="grid grid-cols-3 gap-6">

    {{-- LEFT MAIN --}}
    <div class="col-span-2 space-y-6">

        {{-- WELCOME BANNER --}}
        <div class="bg-gradient-to-r from-blue-600 to-cyan-500 text-white p-6 rounded-xl shadow">

            <h1 class="text-2xl font-bold">How’s Your Experience?</h1>
            <p class="mt-2 text-sm">
                Tell us more about your experience with RadMedics LMS.
            </p>

            <button class="mt-4 bg-white text-blue-600 px-4 py-2 rounded-lg font-semibold">
                Give Feedback
            </button>

        </div>

        {{-- COURSES (Temporary)--}}

        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="font-semibold text-lg mb-4">Courses</h2>

            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left border-b">
                        <th class="p-2">Name</th>
                        <th>Progress</th>
                        <th>Grade</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-b">
                        <td class="p-2">Course #1</td>
                        <td>80%</td>
                        <td>A</td>
                    </tr>

                    <tr>
                        <td class="p-2">Course #2</td>
                        <td>60%</td>
                        <td>B+</td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

    {{-- RIGHT PANEL --}}
    <div class="space-y-6">

        {{-- CALENDAR --}}
        @php
            $today = now();
            $currentMonth = $today->format('F');
            $currentYear = $today->year;
            $firstOfMonth = $today->copy()->firstOfMonth();
            $daysInMonth = $firstOfMonth->daysInMonth;
            $startDay = $firstOfMonth->dayOfWeek; // 0 = Sunday
            $weekdays = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
        @endphp

        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="font-semibold text-lg">Calendar</h2>
                    <div class="text-sm text-gray-500">{{ $currentMonth }} {{ $currentYear }}</div>
                </div>
                <div class="flex items-center gap-2 text-slate-500">
                    <button class="rounded-full p-2 hover:bg-slate-100"><span class="text-base">&lsaquo;</span></button>
                    <button class="rounded-full p-2 hover:bg-slate-100"><span class="text-base">&rsaquo;</span></button>
                </div>
            </div>

            <div class="grid grid-cols-7 gap-1 text-center text-xs uppercase tracking-widest text-gray-500">
                @foreach ($weekdays as $weekday)
                    <div class="py-1">{{ $weekday }}</div>
                @endforeach
            </div>

            <div class="grid grid-cols-7 gap-0.5 mt-2 text-xs">
                @for ($empty = 0; $empty < $startDay; $empty++)
                    <div class="h-10"></div>
                @endfor

                @for ($day = 1; $day <= $daysInMonth; $day++)
                    @php $isToday = $day === $today->day; @endphp
                    <div class="h-7 flex items-center justify-center rounded-md font-medium {{ $isToday ? 'bg-blue-600 text-white shadow' : 'text-slate-700 hover:bg-slate-100' }}">
                        {{ $day }}
                    </div>
                @endfor
            </div>
        </div>

        {{-- TO DO --}}
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="font-semibold mb-2">To-do</h2>
            <p class="text-sm">1 assignment due</p>
        </div>

        {{-- ANNOUNCEMENTS --}}
        <div class="bg-white p-4 rounded-xl shadow">
            <h2 class="font-semibold mb-2">Announcements</h2>
            <ul class="text-sm space-y-1 text-gray-600">
                <li>System maintenance</li>
                <li>New module released</li>
            </ul>
        </div>

    </div>

</div>

@endsection