<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [
        'application_id',
        'skill'
    ];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
