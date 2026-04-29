<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
/* use Livewire\WithPagination; */

class CourseList extends Component
{
    /* use WithPagination; */
    public $role = null;

    public function render()
    {
        $courses = Course::published()
                        ->latest('published_at')
                        ->get();
        // use ->paginate(<number>) in the future

        return view('livewire.course-list', [
            'courses' => $courses,
            'role' => $this->role,
        ]);
    }
}
