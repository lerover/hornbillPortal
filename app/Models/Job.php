<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    protected $fillable = [
        'title',
        'employer_id',
        'category_id',
        'position',
        'description',
        'showhide_status',
        'salary'
    ];
//$table->string('showhide_status')->default('show');

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employer_id', 'id');
    }
}
