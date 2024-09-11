<?php

namespace App\Http\Controllers;

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
    }
}
