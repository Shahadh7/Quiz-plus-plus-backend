<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function update(Request $request,$id) {

        $data = $request->validate([
            'quiz' => 'required|string'
        ]);

        $quiz = Quiz::find($id);

        if(!$quiz) return response([
            'message' => 'quiz not found'
        ]);

        $quiz->quiz = $data['quiz'];
        $quiz->save();

        return response(["message" => "Quiz has been updated successfully."]);
    }
}
