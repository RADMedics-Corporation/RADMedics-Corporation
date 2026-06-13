<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Databaase\Eloquent\Factories\HasFactory;

class ModuleCompletion extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'student_id',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id')
                    ->whereHas('role',
                        fn($q) => $q->where('name', 'student'));
    }
}
