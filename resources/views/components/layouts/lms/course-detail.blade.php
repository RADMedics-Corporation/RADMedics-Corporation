@extends('components.layouts.app')

@section('content')

@php
    // Sample course data - in a real app, this would come from the database
    $course = [
        'id' => 1,
        'name' => 'Example Course #1',
        'code' => 'EXAMPLE101',
        'instructor' => 'Dr. Almar',
        'description' => 'This is a comprehensive course covering fundamental concepts and advanced topics.',
        'progress' => 80,
        'grade' => 'A',
        'credits' => 3,
        'semester' => 'Spring 2026',
        'students' => 45,
    ];

    $modules = [
        ['id' => 1, 'name' => 'Module 1: Introduction', 'lessons' => 5, 'completed' => 5],
        ['id' => 2, 'name' => 'Module 2: Core Concepts', 'lessons' => 8, 'completed' => 6],
        ['id' => 3, 'name' => 'Module 3: Advanced Topics', 'lessons' => 6, 'completed' => 3],
    ];

    $assignments = [
        ['id' => 1, 'title' => 'Assignment 1', 'dueDate' => '2026-05-15', 'status' => 'Submitted', 'grade' => 'A', 'score' => '95/100'],
        ['id' => 2, 'title' => 'Assignment 2', 'dueDate' => '2026-05-22', 'status' => 'Submitted', 'grade' => 'A-', 'score' => '92/100'],
        ['id' => 3, 'title' => 'Final Project', 'dueDate' => '2026-06-10', 'status' => 'In Progress', 'grade' => '-', 'score' => '-'],
    ];

    $gradeBreakdown = [
        ['component' => 'Participation', 'percentage' => 10, 'grade' => 'A'],
        ['component' => 'Assignments', 'percentage' => 30, 'grade' => 'A'],
        ['component' => 'Midterm Exam', 'percentage' => 30, 'grade' => 'A-'],
        ['component' => 'Final Project', 'percentage' => 30, 'grade' => 'In Progress'],
    ];

    $otherCourses = [
        ['id' => 2, 'name' => 'Example Course #2', 'instructor' => 'Dr. Almar', 'description' => 'A comprehensive program covering advanced techniques and practical applications in emergency medical services.', 'image' => 'images/course-image-2.jpg'],
        ['id' => 3, 'name' => 'Example Course #3', 'instructor' => 'Dr. Almar', 'description' => 'Intensive training program focused on trauma management and patient stabilization in critical situations.', 'image' => 'images/course-image-3.jpg'],
        ['id' => 4, 'name' => 'Example Course #4', 'instructor' => 'Dr. Almar', 'description' => 'Specialized course on medical assessment and diagnostic procedures for emergency responders.', 'image' => 'images/course-image-1.jpg'],
    ];
@endphp
 
<div class="space-y-6">

    {{-- HEADER --}}
    <section class="overflow-hidden rounded-[2rem] bg-gradient-to-r from-blue-600 to-cyan-500 shadow-xl">
        <div class="px-6 py-8 sm:px-10 sm:py-10 lg:flex lg:items-center lg:justify-between lg:px-12">
            
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2">
                    <a href="{{ route('dashboard') }}" class="text-white/80 hover:text-white text-sm font-medium">← Back to Dashboard</a>
                </div>
                <h1 class="text-4xl font-bold text-white">{{ $course['name'] }}</h1>
                <p class="mt-2 text-white/90">{{ $course['code'] }} • {{ $course['semester'] }}</p>
                <p class="mt-2 text-sm text-white/80">Instructor: <span class="font-semibold">{{ $course['instructor'] }}</span></p>
            </div>

            <div class="mt-6 lg:mt-0 flex flex-col items-end gap-4">
                <div class="text-right">
                    <div class="text-5xl font-bold text-white">{{ $course['grade'] }}</div>
                    <div class="text-sm text-white/80">Current Grade</div>
                </div>
                <div class="w-48 bg-white/20 rounded-full h-3 overflow-hidden">
                    <div class="h-full bg-white rounded-full" :style="{width: `{{ $course['progress'] }}%`}"></div>
                </div>
                <div class="text-sm text-white/80">{{ $course['progress'] }}% Complete</div>
            </div>
        </div>
    </section>

    {{-- MAIN CONTENT --}}
    <div class="grid gap-6 lg:grid-cols-3">

        {{-- LEFT COLUMN --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- COURSE INFO --}}
            <section class="bg-white p-6 rounded-[2rem] shadow-lg">
                <h2 class="text-2xl font-semibold text-slate-900 mb-4">About This Course</h2>
                <p class="text-slate-600 leading-relaxed">{{ $course['description'] }}</p>
                
                <div class="mt-6 grid grid-cols-2 gap-4 pt-6 border-t border-slate-200">
                    <div>
                        <p class="text-sm text-slate-500">Credits</p>
                        <p class="text-lg font-semibold text-slate-900">{{ $course['credits'] }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Class Size</p>
                        <p class="text-lg font-semibold text-slate-900">{{ $course['students'] }} students</p>
                    </div>
                </div>
            </section>

            {{-- MODULES --}}
            <section class="bg-white p-6 rounded-[2rem] shadow-lg">
                <h2 class="text-2xl font-semibold text-slate-900 mb-4">Course Modules</h2>
                <div class="space-y-3">
                    @foreach ($modules as $module)
                        <div class="border border-slate-200 rounded-[1.5rem] p-4 hover:bg-slate-50 cursor-pointer transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="font-semibold text-slate-900">{{ $module['name'] }}</h3>
                                    <p class="text-sm text-slate-500 mt-1">{{ $module['completed'] }}/{{ $module['lessons'] }} lessons completed</p>
                                </div>
                                <div class="text-right">
                                    <div class="w-16 h-16 rounded-full flex items-center justify-center bg-blue-50">
                                        <div class="text-center">
                                            <div class="text-sm font-bold text-blue-600">{{ round(($module['completed'] / $module['lessons']) * 100) }}%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- ASSIGNMENTS --}}
            <section class="bg-white p-6 rounded-[2rem] shadow-lg">
                <h2 class="text-2xl font-semibold text-slate-900 mb-4">Assignments</h2>
                <div class="overflow-hidden rounded-[1.5rem] border border-slate-200">
                    <table class="min-w-full divide-y divide-slate-200 text-sm">
                        <thead class="bg-slate-50 text-slate-500">
                            <tr>
                                <th class="px-4 py-3 text-left">Title</th>
                                <th class="px-4 py-3 text-left">Due Date</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Grade</th>
                                <th class="px-4 py-3 text-left">Score</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            @foreach ($assignments as $assignment)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-4 py-4 font-semibold text-slate-900">{{ $assignment['title'] }}</td>
                                    <td class="px-4 py-4 text-slate-600">{{ \Carbon\Carbon::parse($assignment['dueDate'])->format('M d, Y') }}</td>
                                    <td class="px-4 py-4">
                                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $assignment['status'] === 'Submitted' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $assignment['status'] }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 font-semibold text-slate-900">{{ $assignment['grade'] }}</td>
                                    <td class="px-4 py-4 text-slate-600">{{ $assignment['score'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

        </div>

        {{-- RIGHT SIDEBAR --}}
        <div class="space-y-6">

            {{-- GRADE BREAKDOWN --}}
            <section class="bg-white p-6 rounded-[2rem] shadow-lg">
                <h2 class="text-xl font-semibold text-slate-900 mb-4">Grade Breakdown</h2>
                <div class="space-y-4">
                    @foreach ($gradeBreakdown as $item)
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <p class="text-sm font-medium text-slate-700">{{ $item['component'] }}</p>
                                <p class="text-sm font-semibold text-slate-900">{{ $item['percentage'] }}%</p>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="h-full bg-blue-600 rounded-full" :style="{width: `{{ $item['percentage'] }}%`}"></div>
                            </div>
                            @if ($item['grade'] !== '-')
                                <p class="text-xs text-slate-500 mt-1">Grade: <span class="font-semibold">{{ $item['grade'] }}</span></p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- QUICK LINKS --}}
            <section class="bg-white p-6 rounded-[2rem] shadow-lg">
                <h2 class="text-xl font-semibold text-slate-900 mb-4">Quick Links</h2>
                <div class="space-y-2">
                    <a href="#" class="block p-3 border border-slate-200 rounded-[1rem] text-sm font-medium text-blue-600 hover:bg-blue-50 transition">
                        → Course Materials
                    </a>
                    <a href="#" class="block p-3 border border-slate-200 rounded-[1rem] text-sm font-medium text-blue-600 hover:bg-blue-50 transition">
                        → Discussion Forum
                    </a>
                    <a href="#" class="block p-3 border border-slate-200 rounded-[1rem] text-sm font-medium text-blue-600 hover:bg-blue-50 transition">
                        → Syllabus
                    </a>
                    <a href="#" class="block p-3 border border-slate-200 rounded-[1rem] text-sm font-medium text-blue-600 hover:bg-blue-50 transition">
                        → Contact Instructor
                    </a>
                </div>
            </section>

        </div>

    </div>

    {{-- OTHER COURSES OFFERED --}}
    <section class="bg-white p-6 rounded-[2rem] shadow-lg">
        <h2 class="text-2xl font-semibold text-slate-900 mb-6">Other Courses Offered</h2>
        <div class="grid gap-4 md:grid-cols-3">
            @foreach ($otherCourses as $otherCourse)
                <a href="{{ route('course.detail', $otherCourse['id']) }}" class="block border border-slate-200 rounded-[1.5rem] overflow-hidden hover:shadow-lg hover:border-blue-300 transition">
                    <div class="w-full h-40 overflow-hidden bg-slate-200">
                        <img src="{{ asset($otherCourse['image']) }}" alt="{{ $otherCourse['name'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-slate-900 mb-1">{{ $otherCourse['name'] }}</h3>
                        <p class="text-sm text-slate-500 mb-3">{{ $otherCourse['instructor'] }}</p>
                        <p class="text-sm text-slate-600 leading-relaxed">{{ $otherCourse['description'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

</div>

@endsection