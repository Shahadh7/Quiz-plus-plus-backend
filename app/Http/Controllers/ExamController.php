<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function create(Request $request) {
        
    }
    public function view(Request $request,$id) {

        $exam = Exam::find($id);
        $exam->quizs;
        $answers = Answer::where('exam_id', $id)->get();

        return response()->json([
            $exam,
            $answers
        ]);
        

    }



}
