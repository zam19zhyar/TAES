<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Course $course)
    {
        $user = auth()->user();
        $evaluations = Evaluation::where([
            ['course_id', '=', $course->id]
        ])->with('student')->with('assistant')->get();


        if($user->type == 'professor') {
            return view('course_evaluations', [
                'course' => $course,
                'evaluations' => $evaluations
            ]);
        } else {
            return view('course_evaluations_anon', [
                'course' => $course,
                'evaluations' => $evaluations
            ]);
        }
    }
}
