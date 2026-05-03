<div class="bg-white shadow px-6 py-4 flex items-center justify-between relative">

    {{-- Search --}}
    <div class="w-1/3">
        <input type="text"
               placeholder="Search..."
               class="w-full px-4 py-2 border rounded-lg focus:outline-none">
    </div>

    {{-- Right side --}}
    <div class="flex items-center space-x-4">
        @php $user = auth()->user(); @endphp

        <div class="flex items-center space-x-3 text-sm text-gray-600">
            <div>
                <div class="font-semibold">{{ $user ? $user->name : 'Guest' }}</div>
                <div class="text-xs text-slate-500">{{ $user ? $user->email : 'Not logged in' }}</div>
            </div>
            @if($user)
                <a href="{{ route('account') }}" class="block">
                    <img id="profile-preview" src="{{ $user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'MA') }}" alt="Profile" class="w-10 h-10 rounded-full object-cover border border-slate-200 hover:opacity-80 transition">
                </a>
            @else
                <a href="{{ route('account') }}" class="block">
                    <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold">?</div>
                </a>
            @endif
        </div>

    </div>
</div>
