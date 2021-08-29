<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['answer','quiz_id','is_answer','exam_id'];

    protected $hidden = ['is_answer'];


    public function quizs() {
        return $this->belongsTo(Quiz::class);
    }
}
