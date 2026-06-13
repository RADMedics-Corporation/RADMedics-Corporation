<?php

namespace App\Livewire;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseList extends Component
{
    public $filter = 'all'; // 'all' | 'enrolled' | 'available'

    public function render()
    {
        $user = Auth::user();

        $courses = Course::published()
            ->latest('published_at')
            ->when($user && $this->filter === 'enrolled' && $user->hasRole('student'),
                fn($q) => $q->enrolledByStudent($user))
            ->when($user && $this->filter === 'available' && $user->hasRole('student'),
                fn($q) => $q->availableFor($user))
            ->when($user && $user->hasRole('instructor'),
                fn($q) => $q->taughtBy($user))
            ->get();

        return view('livewire.course-list', [
            'courses' => $courses,
            'role' => $user?->role?->name,
        ]);
    }
}
