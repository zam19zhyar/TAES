<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'crn',
        'professor_id',
    ];

    public function professor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    public function students(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CourseEnrollment::class, 'course_id')->with('student');
    }

    public function assistants(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TeachingAssistantEnrollment::class, 'course_id')->with('assistant');
    }

}
