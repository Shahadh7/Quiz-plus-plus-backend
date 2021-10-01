<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    public function create(Request $request) {

        if(!$request->user()->hasPermissionTo('create exams')) return response(["message" => "you do not have permission to create exams"]);

        // dd(Auth::user()->id);

        $validatedExam = $request->validate([
            'exam_name' => 'required|string',
            'exam_duration'=> 'required',
            'exam_secret'=> 'required|string',
            'subject_id' => 'required',
            'level_id' => 'required',
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
            'level_id' => $validatedExam['level_id'],
            'user_id' => Auth::user()->id,
            'slug' => $slug
        ]);
        
        $quizzess_and_answers = $validatedExam['quiz_answers'];
        $examId = $exam->id;

        foreach ($quizzess_and_answers as $key => $value) {
            // dd($value['answers']);
            $quiz = Quiz::create([
                'quiz'=> $value['quiz'],
                'exam_id'=> $examId
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
    public function view(Request $request,$id=null) {

        if($request->input('level') && $request->input('subjects')) {
            
            $level = $request->input("level");
            $subjects = $request->input("subjects");
            $exam = Exam::where('level_id',$level)->whereIn('subject_id', $subjects)->get();
            return response($exam->toArray());
        }else if($request->input('level') && !$request->input('subjects')){
            $level = $request->input("level");
            $exam = Exam::where('level_id',$level)->get();
            return response($exam->toArray());
        }
        else if(!$request->input('level') && $request->input('subjects')){
            $subjects = $request->input("subjects");
            $exam = Exam::whereIn('subject_id', $subjects)->get();
            return response($exam->toArray());
        }
        else if(is_null($id)) {
            return response([
                "message" => 'success',
                "exams" => Exam::with('levels')->orderBy('created_at')->get()
            ]);
        }

        $exam = Exam::with('quizs.answers')->find($id);
        if(!$exam) return response([
            "message" => "exam not found"
        ],200);

        $exam->toArray();

        return response($exam,200);
    }
    public function destroy($id) {

        $exam = Exam::find($id);

        if(!$exam) return response([
            "message" => "exam not found"
        ],200);

        $exam->delete();

        return response(['message' => 'Exam has been deleted successfully'],200);
    }

}
