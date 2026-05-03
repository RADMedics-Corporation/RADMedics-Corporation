@extends('components.layouts.app')

@section('content')

@php
    $user = auth()->user();

    $info = [
        ['label' => 'Batch', 'value' => 'Batch 2026'],
        ['label' => 'Student ID', 'value' => $user ? ($user->student_id ?? '123456789') : 'Not logged in'],
    ];  

    $contacts = [
        ['label' => 'Email', 'value' => $user ? ($user->email ?? 'radmedics@gmail.com') : 'Not logged in'],
        ['label' => 'Personal email', 'value' => $user ? 'example@gmail.com' : 'Not logged in'],
        ['label' => 'Phone', 'value' => $user ? ($user->phone ?? '+63 123 456 7890') : 'Not logged in'],
        ['label' => 'Location', 'value' => $user ? ($user->location ?? 'Philippines') : 'Not logged in'],
    ];
@endphp

<div class="space-y-6">

    {{-- HEADER --}}
    <section class="overflow-hidden rounded-[2rem] bg-slate-900 shadow-xl">
        <div class="px-6 py-8 sm:px-10 sm:py-10 lg:flex lg:items-center lg:justify-between lg:px-12">
            
            <div class="flex items-center gap-5">
                <div class="flex h-24 w-24 items-center justify-center rounded-full bg-blue-500 text-4xl font-bold text-white">
                    M
                </div>

                {{-- INFO --}}
                <div>
                    <h1 class="text-3xl font-semibold text-white">{{ $user ? ($user->name ?? 'Mark Anthony Noche') : 'Guest' }}</h1>
                    <p class="mt-2 text-sm text-slate-300">
                        {{ $user ? 'RADMedics student since Jun 30, 2020. Last active 13 minutes ago.' : 'Please log in to view your account.' }}
                    </p>
                </div>
            </div>

            <button id="profile-edit-button" class="mt-6 sm:mt-0 px-6 py-3 text-sm font-semibold text-white rounded-full border border-white/20 bg-white/10 hover:bg-white/20 transition">
                Edit
            </button>
        </div>

        {{-- TABS --}}
        <div class="border-t border-white/10 bg-slate-950/80 px-4 py-4 sm:px-10">
            <div class="flex flex-wrap gap-2">
                @foreach (['Info','About','Enrolled','Completed'] as $tab)
                    <button 
                        onclick="switchTab('{{ strtolower($tab) }}-tab')"
                        class="tab-button rounded-full px-4 py-2 text-sm {{ $loop->first ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-white/5' }}"
                        data-tab="{{ strtolower($tab) }}-tab">
                        {{ $tab }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <section id="profile-edit-section" class="hidden bg-white p-6 rounded-[2rem] shadow-lg">
        <div class="flex flex-col gap-6">
            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-2xl font-semibold text-slate-900">Edit profile</h2>
                    <p class="text-sm text-slate-500">Update your photo, name, phone, email, and bio.</p>
                </div>
                <button id="cancel-edit-profile" type="button" class="rounded-full border border-slate-200 px-4 py-2 text-sm text-slate-600 hover:bg-slate-100">Cancel</button>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid gap-6 md:grid-cols-[1.1fr_0.9fr]">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700">Name</label>
                            <input id="edit-name" name="name" type="text" value="{{ $user ? ($user->name ?? 'Mark Anthony Noche') : '' }}" class="mt-1 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" {{ $user ? 'required' : 'disabled' }}>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Email</label>
                            <input id="edit-email" name="email" type="email" value="{{ $user ? ($user->email ?? 'example@gmail.com') : '' }}" class="mt-1 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" {{ $user ? 'required' : 'disabled' }}>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Phone</label>
                            <input id="edit-phone" name="phone" type="text" value="{{ $user ? ($user->phone ?? '+63 123 456 7890') : '' }}" class="mt-1 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" {{ $user ? '' : 'disabled' }}>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Bio</label>
                            <textarea id="edit-bio" name="bio" rows="3" class="mt-1 w-full rounded-xl border border-slate-200 px-3 py-2 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">{{ $user->bio ?? 'Tell us a little about yourself...' }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Student ID</label>
                            <input id="edit-student-id" type="text" value="{{ $user->student_id ?? '123456789' }}" class="mt-1 w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-500" readonly>
                        </div>
                    </div>

                    <div class="rounded-[1.5rem] border border-slate-200 p-6">
                        <div class="flex flex-col items-center gap-4 text-center">
                            <img id="edit-photo-preview" src="{{ $user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'MA') }}" alt="Profile preview" class="h-32 w-32 rounded-full object-cover border border-slate-200">
                            <label class="cursor-pointer rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">
                                Upload photo
                                <input id="edit-photo-input" type="file" name="profile_photo" accept="image/*" class="sr-only">
                            </label>
                            <p class="text-sm text-slate-500">Recommended size: 200x200. JPG or PNG.</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" id="close-edit-profile" class="rounded-full border border-slate-200 px-4 py-2 text-sm text-slate-600 hover:bg-slate-100">Cancel</button>
                    <button type="submit" class="rounded-full bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">Save changes</button>
                </div>
            </form>
        </div>
    </section>

    <div class="grid gap-6 xl:grid-cols-[1.7fr_0.95fr]">

        {{-- MAIN --}}
        <main class="space-y-6">

            {{-- INFO TAB --}}
            <div id="info-tab" class="tab-content space-y-6">
                {{-- INFO --}}
                <section class="bg-white p-6 rounded-[2rem] shadow-lg">
                    <h2 class="text-2xl font-semibold text-slate-900">Basics</h2>

                    <div class="mt-6 grid gap-4 md:grid-cols-2">
                        @foreach ($info as $item)
                            <div class="p-4 border border-slate-200 rounded-[1.5rem]">
                                <p class="text-sm text-slate-500">{{ $item['label'] }}</p>
                                <p class="mt-2 font-semibold text-slate-900">{{ $item['value'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>

                {{-- CONTACT --}}
                <section class="bg-white p-6 rounded-[2rem] shadow-lg">
                    <h2 class="text-2xl font-semibold text-slate-900">Details</h2>

                    <div class="mt-6 space-y-4">
                        @foreach ($contacts as $item)
                            <div class="p-4 border border-slate-200 rounded-[1.5rem]">
                                <p class="text-sm text-slate-500">{{ $item['label'] }}</p>
                                <p class="mt-2 font-semibold text-slate-900">{{ $item['value'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>

            @include('components.layouts.lms.about-tab')
            @include('components.layouts.lms.enrolled-tab')
            @include('components.layouts.lms.completed-tab')

        </main>

        {{-- SIDEBAR --}}
        <aside class="space-y-6">

            {{-- ACCOUNT --}}
            <section class="bg-white p-6 rounded-[2rem] shadow-lg">
                <div class="flex justify-between items-center">
                    <h3 class="font-semibold text-slate-900">Account</h3>
                    <span class="text-xs px-3 py-1 bg-slate-100 text-slate-600 rounded-full">Active</span>
                </div>

                <div class="mt-6 text-sm space-y-4">
                    <div>
                        <p class="text-slate-500">Joined</p>
                        <p class="font-semibold text-slate-900">Jun 30, 2020</p>
                    </div>
                    <div>
                        <p class="text-slate-500">Last activity</p>
                        <p class="font-semibold text-slate-900">13 minutes ago</p>
                    </div>
                </div>

                <div class="mt-6 space-y-3">
                    <a href="{{ route('settings.password') }}" class="block p-3 border rounded-[1.5rem] hover:bg-slate-100">
                        logout
                    </a>
                </div>
            </section>

            {{-- SIMPLE LIST COMPONENT --}}
            @php
                $lists = [
                    'Enrolled courses' => ['Course #1', 'Course #2', 'Course #3'],
                    'Friends' => ['Friend #1', 'Friend #2'],
                ];
            @endphp

            @foreach ($lists as $title => $items)
                <section class="bg-white p-6 rounded-[2rem] shadow-lg">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-slate-900">{{ $title }}</h3>
                        <span class="text-xs px-2 py-1 bg-slate-100 rounded-full">{{ count($items) }}</span>
                    </div>

                    <div class="mt-4 space-y-3">
                        @foreach ($items as $name)
                            <div class="flex items-center gap-3 p-3 border rounded-[1.5rem]">
                                <div class="h-10 w-10 flex items-center justify-center rounded-full bg-slate-200">
                                    {{ strtoupper($name[0]) }}
                                </div>
                                <p class="font-semibold text-slate-900">{{ $name }}</p>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach

        </aside>
    </div>
</div>

<script>
function switchTab(tabId) {
    // Close the edit panel when switching tabs
    const editSection = document.getElementById('profile-edit-section');
    if (editSection) {
        editSection.classList.add('hidden');
    }

    // Hide all tabs
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });
    
    // Show selected tab
    document.getElementById(tabId).classList.remove('hidden');
    
    // Update button styles
    document.querySelectorAll('.tab-button').forEach(btn => {
        if (btn.getAttribute('data-tab') === tabId) {
            btn.classList.remove('text-slate-300', 'hover:bg-white/5');
            btn.classList.add('bg-blue-600', 'text-white');
        } else {
            btn.classList.remove('bg-blue-600', 'text-white');
            btn.classList.add('text-slate-300', 'hover:bg-white/5');
        }
    });
}

const editButton = document.getElementById('profile-edit-button');
const editSection = document.getElementById('profile-edit-section');
const cancelEditButtons = document.querySelectorAll('#cancel-edit-profile, #close-edit-profile');
const editPhotoInput = document.getElementById('edit-photo-input');
const editPhotoPreview = document.getElementById('edit-photo-preview');

if (editButton && editSection) {
    editButton.addEventListener('click', function () {
        editSection.classList.toggle('hidden');
        if (!editSection.classList.contains('hidden')) {
            editSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
}

cancelEditButtons.forEach(button => {
    button.addEventListener('click', function () {
        if (editSection) {
            editSection.classList.add('hidden');
        }
    });
});

if (editPhotoInput && editPhotoPreview) {
    editPhotoInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            editPhotoPreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
}
</script>

@endsection