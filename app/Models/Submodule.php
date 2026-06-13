<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submodule extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'title',
        'type',
        'content'
    ];

    protected $casts = [
        'content' => 'array'
    ];

    protected static function booted()
    {
        // Auto-assign sort_order when creating if not provided
        static::creating(function ($mcontent) {
            if (empty($mcontent->sort_order)) {
                $mcontent->sort_order = static::where('module_id', $mcontent->module_id)
                            ->max('sort_order') + 1 ?? 0;
            }
        });
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

}
