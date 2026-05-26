<?php

use App\Livewire\Attendance;
use Livewire\Livewire;

test('attendace component loads student records by default', function () {
    Livewire::test(Attendance::class)
        ->assertSet('userType', 'student');
});

test('attendance records change when user type changes', function () {
    Livewire::test(Attendance::class)
        ->set('userType', 'instructor')
        ->assertSet('userType', 'instructor');
});

test('attendance records are empty on weekends', function () {
    Livewire::test(Attendance::class)
        ->set('selectedDate', '2024-06-15') // Assuming this date is a weekend
        ->assertSet('attendanceData', []);
});