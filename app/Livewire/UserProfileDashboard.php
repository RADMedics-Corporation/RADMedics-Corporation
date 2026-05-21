<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserProfileDashboard extends Component
{
    use WithFileUploads;

    public $profile, $picture, $gender, $phone, $birthdate, $address, $path;

    protected $rules = [
        'gender' => 'nullable|in:male,female',
        'phone' => 'nullable|string|max:13',
        'address' => 'nullable|string|max:255',
        'picture' => 'nullable|image|max:5120',
        'birthdate' => 'nullable|date',
    ];

    public function mount()
    {
        $user = Auth::user();

        $this->profile = $user->profile ?? UserProfile::create(
            ['user_id' => $user->id]);

        $this->gender = $this->profile->gender;
        $this->phone = $this->profile->phone;
        $this->address = $this->profile->address;
        $this->birthdate = $this->profile->birthdate ? $this->profile->birthdate->format('Y-m-d') : null;
    }

    public function update()
    {
        $this->validate();

        if ($this->picture) {
            $filename = Str::slug(Auth::user()->name) . '_' .
                time() . '.' . $this->picture->getClientOriginalExtension();
            $this->path = $this->picture->storeAs('profile_pictures', $filename, 'public');
        }

        $this->profile->update([
            'gender' => $this->gender,
            'phone' => $this->phone,
            'address' => $this->address,
            'birthdate' => $this->birthdate,
            'picture' => $this->path ?? null,
        ]);

        session()->flash('message', 'Profile update successfully');
    }

    public function render()
    {
        return view('livewire.user-profile-dashboard');
    }
}
