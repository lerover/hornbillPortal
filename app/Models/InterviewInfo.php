<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InterviewInfo extends Model
{
    use HasFactory;
    protected $fillable = ['application_id','description'];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

}
