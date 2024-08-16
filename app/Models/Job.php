<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    protected $table = 'cg_jobs';

    public static array $experience = ['entry', 'intermediate','senior'];

    public static array $category = [
        'IT',
        'Finace',
        'Sales',
        'Marketing',
    ];

    public function employer(): BelongsTo
    {
       return $this->belongsTo(Employer::class);
    }
}
