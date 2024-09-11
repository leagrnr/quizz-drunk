<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function verify(Request $request){
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'user_answer' => 'required|string',
        ]);

        // Récupérer la question de la base de données
        $question = Question::find($request->input('question_id'));

        // Vérifier si la réponse de l'utilisateur est correcte
        $isCorrect = $request->input('user_answer') === $question->good_answer;

        return Redirect::route('quiz.verify')->with($question);
    }

    public function random_question(){
        $question = Question::inRandomOrder()->first();

    
        dd($question);
    
        return Inertia::render('test', [
            'question' => $question
        ]);

    }
}
