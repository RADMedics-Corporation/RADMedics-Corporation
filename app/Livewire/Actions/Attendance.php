<?php

namespace App\Livewire\Actions;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Attendance extends Component
{
    public string $userType = 'student';

    public string $selectedDate = '';

    public array $attendanceData = [];

    public function mount(): void
    {
        $this->selectedDate = now()->format('Y-m-d' );
        $this->loadAttendanceData();
    }

    public function updatedUserType(): void
    {
        $this->loadAttendanceData();
    }

    public function updatedSelectedDate(): void
    {
        $this->loadAttendanceData();
    }

    public function LoadAttendanceData(): void
    {
        $recordsByUserType = match ($this->userType) {
            'student' => [

            ],
            'instructor' => [

            ],
            'admin' => [

            ],
            default => [],
        };

        if (Carbon::parse($this->updatedSelectedDate)->isWeekend()) {
            $this->attendanceData = [];

            return;
        }

        $this->attendanceData = $recordsByUserType;
    }

    public function render(): View
    {
        return view('attendance')
            ->layout('layouts.app', ['title' => 'Attendance']);
    }
}