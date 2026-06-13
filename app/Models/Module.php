<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'sort_order',
        'title',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function submodules()
    {
        return $this->hasMany(Submodule::class)
                    ->orderBy('sort_order');
    }

    public function completions()
    {
        return $this->hasMany(ModuleCompletion::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function scopeDraft($query)
    {
        return $query->whereNull('published_at');
    }

    public function isPublished(): bool
    {
        return $this->published_at !== null && $this->published_at <= now();
    }

    public function isCompletedBy(User $user): bool
    {
        return $this->completions()
                    ->where('student_id', $user->id)
                    ->exists();
    }

    public function markCompleteFor(User $student): void
    {
        ModuleCompletion::updateOrCreate(
            [
                'module_id'  => $this->id,
                'student_id' => $student->id,
            ],
            [
                'completed_at' => now(),
            ]
        );
    }

    protected static function booted()
    {
        // Auto-assign sort_order when creating if not provided
        static::creating(function ($module) {
            if (empty($module->sort_order)) {
                $module->sort_order = static::where('course_id', $module->course_id)
                            ->max('sort_order') + 1 ?? 0;
            }
        });
    }
}
