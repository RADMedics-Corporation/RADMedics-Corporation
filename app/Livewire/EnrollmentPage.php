<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Course;
use App\Models\Role;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EnrollmentPage extends Component
{
    use WithFileUploads;

    public $courses = [];
    public $first_name, $last_name, $phone, $email,
           $password, $password_confirmation, $course_id = null,
           $proof_of_payment, $proof_of_experience;
    public $consent = false;

    public bool $requiresExperience = false;

    public function updatedCourseId($value)
    {
        $course = $this->course_id ? Course::find($this->course_id) : null;
        $this->requiresExperience = (bool) ($course?->require_experience ?? false);

        if (!$this->requiresExperience) {
            $this->proof_of_experience = null;
        }
    }

    public function mount()
    {
        $this->courses = Course::published()
                                ->latest('published_at')
                                ->get();

        $slug = request()->query('course');
        if ($slug) {
            $course = $this->courses->where('slug', $slug)
                                    ->first();
            if ($course) {
                $this->course_id = $course->id;
            }
        }

        if (Auth::check()) {
            $user = Auth::user();
            $this->first_name = $user->first_name;
            $this->last_name = $user->last_name;
            $this->phone = $user->profile?->phone ?? '';
            $this->email = $user->email;
        }
    }

    public function updatedProofOfPayment()
    {
        $this->validateOnly('proof_of_payment');
    }

    public function updatedProofOfExperience()
    {
        $this->validateOnly('proof_of_experience');
    }

    protected function rules()
    {
        $rules = [
            'course_id' => ['required', Rule::exists('courses', 'id')],
            'proof_of_payment' => ['required', 'file', 'max:10240', 'mimes:jpg,png,pdf'],
            'consent' => ['boolean']
        ];

        if (!Auth::check()) {
            $rules = array_merge($rules, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:13'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'string', 'min:8'],
            ]);
        }

        if ($this->requiresExperience) {
            $rules['proof_of_experience'] = ['required',
                'file', 'max:10240', 'mimes:jpg,png,pdf'];
        }

        return $rules;
    }

    public function submit()
    {
        $this->validate();

        try {
            DB::transaction(function () {

                $paymentPath = $this->proof_of_payment->store('payments', 'public');

                $expPath = $this->proof_of_experience ? $this->proof_of_experience->store('experiences', 'public') : null;

                if (!Auth::check()) {
                    $student = Role::where('name', 'student')
                        ->firstOrFail();

                    $user = User::create([
                        'first_name' => $this->first_name,
                        'last_name' => $this->last_name,
                        'email' => $this->email,
                        'password' => Hash::make($this->password),
                        'role_id' => $student->id,
                    ]);

                    UserProfile::create([
                        'user_id' => $user->id,
                        'phone' => $this->phone,
                    ]);

                } else {
                    $user = Auth::user();
                }

                Enrollment::create([
                    'user_id' => $user->id,
                    'course_id' => $this->course_id,
                    'proof_of_payment' => $paymentPath,
                    'proof_of_experience' => $expPath,
                ]);
            });

        session()->flash('message', 'Enrollment successful!');
        return redirect()->route('dashboard');

        } catch (\Throwable $e) {
            report($e);

            $this->addError(
                'general',
                'Unable to process enrollment. Please try again.'
            );
        }
    }

    public function render()
    {
        return view('livewire.enrollment-page')
            ->layout(Auth::check() ? 'components.layouts.dashboard' : 'components.layout');
    }
}
