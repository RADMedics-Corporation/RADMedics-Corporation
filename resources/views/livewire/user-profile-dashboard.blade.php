<div class="p-4 max-w-xl mx-auto">

    @if (session()->has('message'))
        <div class="bg-green-100 p-2 mb-4">{{ session('message') }}</div>
    @endif

    <h2 class="text-xl font-bold mb-4">Edit Your Profile</h2>

    {{-- Profile Picture --}}
    <div class="mb-4">
        <label>Profile Picture</label>
        <div class="mb-2">
            <img src="{{ $picture ? $picture->temporaryUrl() : ($this->profile?->picture ? asset('storage/' . $this->profile->picture) : 'https://via.placeholder.com/100') }}" alt="Profile Picture" class="w-24 h-24 object-cover rounded-full">
        </div>
        <input type="file" wire:model="picture" class="w-full border p-2">
        @error('profile_picture') <span class="text-red-600">{{ $message }}</span> @enderror
    </div>

    {{-- Gender --}}
    <div class="mb-2">
        <label>Gender</label>
        <select wire:model="gender" class="w-full border p-2">
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        @error('gender') <span class="text-red-600">{{ $message }}</span> @enderror
    </div>

    {{-- Birthdate --}}
    <div class="mb-2">
        <label>Birthdate</label>
        <input type="date" wire:model="birthdate" class="w-full border p-2">
        @error('birthdate') <span class="text-red-600">{{ $message }}</span> @enderror
    </div>

    {{-- Phone --}}
    <div class="mb-2">
        <label>Phone</label>
        <input type="text" wire:model="phone" class="w-full border p-2">
        @error('phone') <span class="text-red-600">{{ $message }}</span> @enderror
    </div>

    {{-- Address --}}
    <div class="mb-2">
        <label>Address</label>
        <input type="text" wire:model="address" class="w-full border p-2">
        @error('address') <span class="text-red-600">{{ $message }}</span> @enderror
    </div>

    <button wire:click="update" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Save</button>
</div>
