<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
