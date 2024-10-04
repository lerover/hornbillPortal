<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'application_id',
        'education',
        'school',
        'year'
    ];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
