<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'job_id',
        'employee_id',
        'name',
        'email',
        'experience',
        'expected_salary',
        'status'
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function employee(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'employee_id');
    }
}
