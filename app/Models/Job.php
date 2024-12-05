<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;   // Add this line
use Illuminate\Database\Query\Builder as QueryBuilder;  // Add this line

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

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function scopeFilter(Builder | QueryBuilder $query, array $filters) :Builder|QueryBuilder
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhereHas('employer', function ($query) use ($search) {
                    $query->where('company_name', 'like', '%' . $search . '%');
                });
        })->when($filters['min_salary'] ?? null, function ($query, $min_salary) {
            $query->where('salary', '>=', $min_salary);
        })->when($filters['max_salary'] ?? null, function ($query, $max_salary) {
            $query->where('salary', '<=', $max_salary);
        })->when($filters['experience'] ?? null, function ($query, $experience) {
            $query->where('experience', $experience);
        })->when($filters['category'] ?? null, function ($query, $category) {
            $query->where('category', $category);
        });
    }
}
