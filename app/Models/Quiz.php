<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = "quizs";

    protected $fillable = ['quiz'];

    public function exams() {
        return $this->belongsToMany(Exam::class);
    }
    
}
