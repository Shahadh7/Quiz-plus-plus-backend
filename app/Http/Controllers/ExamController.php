<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\Quiz;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    public function create(Request $request) {

        // dd(Auth::user()->id);

        $validatedExam = $request->validate([
            'exam_name' => 'required|string',
            'exam_duration'=> 'required',
            'exam_secret'=> 'required|string',
            'subject_id' => 'required',
            'date' => 'date',
            'time' => 'required',
            'quiz_answers.*.quiz' => 'required|string',
            'quiz_answers.*.answers.*.answer' => 'required|string',
            'quiz_answers.*.answers.*.is_answer' => 'required|boolean'
        ]);

        $slug = Str::slug($validatedExam['exam_name'],"-");

        $exam = Exam::create([
            'exam_name' => $validatedExam['exam_name'],
            'duration' => $validatedExam['exam_duration'],
            'exam_secret' => $validatedExam['exam_secret'],
            'date' => $validatedExam['date'],
            'time' => $validatedExam ['time'],
            'subject_id' => $validatedExam['subject_id'],
            'user_id' => Auth::user()->id,
            'slug' => $slug
        ]);
        
        $quizzess_and_answers = $validatedExam['quiz_answers'];
        $examId = $exam->id;

        foreach ($quizzess_and_answers as $key => $value) {
            // dd($value['answers']);
            $quiz = Quiz::create([
                'quiz'=> $value['quiz']
            ]);
            $exam->quizs()->attach($quiz);
            $quizId = $quiz->id;

            foreach ($value['answers'] as $answer) {
                Answer::create([
                    'answer' => $answer['answer'],
                    'is_answer' => $answer['is_answer'],
                    'exam_id' => $examId,
                    'quiz_id' => $quizId,
                ]);

            }
        }

        return response()->json([
            'message' => "quiz has been successfully created",
        ],200);
        
    }
    public function view(Request $request,$id) {

        $exam = Exam::with('quizs.answers',)->find($id);
        $exam->toArray();

        return response($exam,200);
    }

}
