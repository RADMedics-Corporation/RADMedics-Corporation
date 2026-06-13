<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role_id' => 'integer',
    ];

    public function getNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->last_name}");
    }

    /**
     * Get the user's initials
     */
    public function getInitialsAttribute(): string
    {
        return Str::of("{$this->first_name} {$this->last_name}")
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function hasRole(string $roleName): bool
    {
        return strtolower($this->role?->name) === strtolower($roleName);
    }

    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'course_student')
                    ->withTimestamps();
    }

    public function scopeEnrolledByStudent(Builder $query, User $user): void
    {
        $enrolledIds = $user->enrolledCourses()->pluck('courses.id');

        $pendingIds = DB::table('enrollments')
            ->where('user_id', $user->id)
            ->pluck('course_id');

        $query->whereIn('id', $enrolledIds->merge($pendingIds)->unique());
    }

    public function scopeTaughtBy(Builder $query, User $user): void
    {
        $query->where('instructor_id', $user->id);
    }

    public function scopeAvailableFor(Builder $query, User $user): void
    {
        $query->whereNotIn('id', function ($sub) use ($user) {
            $sub->select('course_id')
                ->from('enrollments')
                ->where('user_id', $user->id);
        })->whereNotIn('id', function ($sub) use ($user) {
            $sub->select('course_id')
                ->from('course_student')
                ->where('user_id', $user->id);
        });
    }

    public function getEnrolledCoursesCountAttribute(): int
    {
        return $this->enrolledCourses()->count();
    }
}
