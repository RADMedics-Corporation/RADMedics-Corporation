<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
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
        return $query->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    public function scopeDraft($query)
    {
        return $query->whereNull('published_at');
    }

    public function getIsPublishedAttribute(): bool
    {
        return $this->published_at !== null && $this->published_at <= now();
    }
}
