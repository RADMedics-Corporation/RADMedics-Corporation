<div class="w-64 bg-[#0B1C2C] text-white flex flex-col">

    <div class="p-6 border-b border-gray-700 flex items-center gap-3">
        <img src="{{ asset('images/radmedics-logo.png') }}"
             alt="RADMedics logo"
             class="w-10 h-10 object-contain">

        <div>
            <div class="text-lg font-bold">RADMedics</div>
            <div class="text-xs text-slate-400 uppercase tracking-[0.2em]">LMS</div>
        </div>
    </div>

    @php
        $isDashboard = request()->routeIs('dashboard');
        $isCourses = request()->routeIs('course-details');
        $isAccount = request()->routeIs('account');
        $isPlaceholder = request()->routeIs('under-construction');
    @endphp

    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('dashboard') }}" class="block p-3 rounded transition {{ $isDashboard ? 'bg-blue-600 text-white' : 'hover:bg-slate-700 text-white/80' }}">Dashboard</a>
        <a href="{{ route('course-details') }}" class="block p-3 rounded transition {{ $isCourses ? 'bg-blue-600 text-white' : 'hover:bg-slate-700 text-white/80' }}">Courses</a>       
        <a href="{{ route('under-construction') }}" class="block p-3 rounded transition {{ $isPlaceholder ? 'bg-blue-600 text-white' : 'hover:bg-slate-700 text-white/80' }}">Goals</a>
        <a href="{{ route('account') }}" class="block p-3 rounded transition {{ $isAccount ? 'bg-blue-600 text-white' : 'hover:bg-slate-700 text-white/80' }}">Account</a>

        {{-- <a href="#" class="block p-3 rounded hover:bg-gray-700">Users</a> --}}
    </nav>

</div>
