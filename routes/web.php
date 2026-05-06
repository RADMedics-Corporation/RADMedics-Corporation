<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing-page');
})->name('home');

// Public informational pages
Route::view('/home', 'landing-page')->name('landing-page');
Route::view('/about', 'pages.about')->name('about');
Route::view('/offered-course', 'pages.offered-course')->name('offered-course');
Route::view('/updates', 'pages.updates')->name('updates');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/faqs', 'pages.faqs')->name('faqs');
Route::view('/privacy-policy', 'pages.privacy-policy')->name('privacy-policy');
Route::view('/terms-of-service', 'pages.terms-of-service')->name('terms-of-service');

// LMS routes
Route::get('/dashboard', function () {
    return view('components.layouts.lms.dashboard');
})->name('dashboard');

Route::view('/account', 'components.layouts.lms.account')->name('account');

Route::view('/course-details', 'components.layouts.lms.course-detail')->name('course-details');

Route::get('/course/{id}', function ($id) {
    return view('components.layouts.lms.course-detail', ['courseId' => $id]);
})->name('course.detail');



// Temporary route for login page
Route::view('/login', 'pages.login')->name('login');

// "Student", "Instructor", and "Admin" login buttons route here while feature is under construction
Route::view('/under-construction', 'pages.under-construction')->name('under-construction');



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// require __DIR__.'/auth.php'; <-- DELETE or COMMENT this line.
