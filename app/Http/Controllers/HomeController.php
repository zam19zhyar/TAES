<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Evaluation;
use App\Models\TeachingAssistantEnrollment;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user = auth()->user();

        if($user->type === 'student') {
            $courses = $user->studentCourses;
            $evaluatedObj = Evaluation::where([
                ['student_id', '=', $user->id],
            ])->get();

            $evaluated = [];
            foreach($evaluatedObj as $eval) {
                array_push($evaluated, $eval->teaching_assistant_id);
            }

            return view('student_home', [
                "courses" => $courses,
                "evaluated" => $evaluated
            ]);
        } else if($user->type === 'professor') {
            $courses = Course::where([
                ['professor_id', '=', $user->id]
            ])->get();

            return view('professor_home', [
                'courses' => $courses
            ]);
        } else {
            $courses = $user->taCourses;

            return view('ta_home', [
                'courses' => $courses
            ]);
        }
    }
}
