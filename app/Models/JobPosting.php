<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'title',
        'description',
        'experience',
        'salary',
        'location',
        'extra_info',
        'company_name',
        'logo',
        'skills', // Stored as a comma-separated string
    ];

    // Optionally, define a mutator to handle skills as an array
    public function getSkillsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setSkillsAttribute($value)
{
    // Ensure value is an array before imploding
    if (is_string($value)) {
        $value = explode(',', $value);  // Convert a comma-separated string to an array
    }

    $this->attributes['skills'] = implode(',', (array) $value);  // Implode the array into a string
}
}
