<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'mode_of_learning',
        'thumbnail',
        'require_experience',
        'published_at',
        'instructor_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'require_experience' => 'boolean'
    ];

    protected static function booted()
    {
        static::creating(function ($course) {
            $course->slug = $course->slug ?? Str::slug($course->name);
        });

        static::updating(function ($course) {
            if ($course->isDirty('name') && empty($course->slug)) {
                $course->slug = Str::slug($course->name);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull('published_at');
    }

    public function getIsPublishedAttribute(): bool
    {
        return $this->published_at !== null && $this->published_at <= now();
    }

    public function getIsDraftAttribute(): bool
    {
        return $this->published_at === null;
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id')
                    ->whereHas('role',
                        fn($q) => $q->where('name', 'instructor'));
    }

    public function modules()
    {
        return $this->hasMany(Module::class)
                    ->orderBy('sort_order');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student')
                    ->whereHas('role',
                        fn($q) => $q->where('name', 'student'))
                    ->withTimestamps();
    }

    public function isEnrolledBy(User $user): bool
    {
        return $this->students()
                    ->where('users.id', $user->id)
                    ->exists();
    }

    public function completionPercentageFor(User $student): int
    {
        if (!$this->isEnrolledBy($student)) {
            return 0;
        }

        $totalModules = $this->modules()->count();

        if ($totalModules === 0) {
            return 0;
        }

        $completedModules = ModuleCompletion::whereHas('module',
            function ($q) { $q->where('course_id', $this->id); })
            ->where('student_id', $student_id)
            ->count();

        return (int) round(($completedModules/$totalModules) * 100);
    }

    public function isCompletedBy(User $student): bool
    {
        return $this->completionPercentageFor($student) === 100;
    }

    public function studentsWithProgress()
    {
        return $this->student()
                    ->withPivot('created_at')
                    ->get()
                    ->map(function ($s) {
                        $s->progress = $this->completionPercentageFor($s);
                        $s->is_completed = $this->isCompletedBy($s);
                        return $s;
                    });
    }

    public function enroll(User $student): void
    {
        $this->students()->syncWithoutDetaching($student->id);
    }

    public function unenroll(User $student): void
    {
        $this->students()->detach($student->id);
    }

    public function scopeEnrolledByStudent(Builder $query, User $user): void
    {
        $enrolledIds = DB::table('course_student')
            ->where('student_id', $user->id)
            ->pluck('course_id');

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
                ->where('student_id', $user->id);
        });
    }
}
