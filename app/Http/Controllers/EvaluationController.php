<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\EvaluationQuestion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EvaluationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(User $ta, Request $request)
    {
        return view('evaluate', [
            'teaching_assistant' => $ta,
            'course' => $request->course,
            'questions' => EvaluationQuestion::all(),
        ]);
    }

    public function review(Evaluation $evaluation)
    {
        $eval = $evaluation->with('student')->with('assistant')->get()[0];
        return view('evaluation', [
            'evaluation' => $eval,
            'answers' => json_decode($eval->recorded_answers),
        ]);
    }

    public function valueToText($value): ?string
    {
        switch($value) {
            case "100":
                return "Strongly Agree";
            case "75":
                return "Agree";
            case "50":
                return "Neutral";
            case "25":
                return "Disagree";
            case "0":
                return "Strongly Disagree";
        }
        return null;
    }

    public function create(Request $request) {
        $questions = EvaluationQuestion::all();

        $recorded_answers = [];
        foreach($questions as $question) {
            array_push($recorded_answers, [
                'questionId' => $question->id,
                'questionText' => $question->question_text,
                'answer' => $request["question{$question->id}"],
                'answer_text' => $this->valueToText($request["question{$question->id}"])
            ]);
        }

        Evaluation::create([
            'student_id' => auth()->user()->id,
            'comments' => $request->comments,
            'recorded_answers' => json_encode($recorded_answers),
            'comment_approved' => false,
            'teaching_assistant_id' => $request->teaching_assistant,
            'course_id' => $request->course,
        ]);

        return redirect(route('home'));
    }

    public function approve(Evaluation $evaluation) {
        $evaluation->comment_approved = true;
        $evaluation->save();
        return redirect(route('home'));
    }
}
