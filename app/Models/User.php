<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function studentCourses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CourseEnrollment::class, 'student_id')->with('course');
    }

    public function taCourses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TeachingAssistantEnrollment::class, 'teaching_assistant_id')->with('course');
    }

    protected $fillable = [
        'name',
        'aubnet_id',
        'type',
    ];

}
