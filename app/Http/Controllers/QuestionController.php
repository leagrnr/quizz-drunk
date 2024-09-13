<?php

// app/Http/Controllers/QuestionController.php
namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function question_mode2()
    {
        $questions = Question::with('mode')->where('mode_id', 2)->inRandomOrder()->take(1)->get();
        return response()->json($questions);
    }

    public function question_mode1()
    {
        $questions = Question::with('mode')->where('mode_id', 1)->inRandomOrder()->take(1)->get();
        return response()->json($questions);
    }

    public function question_mode3()
    {
        $questions = Question::with('mode')->where('mode_id', 3)->inRandomOrder()->take(1)->get();
        return response()->json($questions);
    }
}
