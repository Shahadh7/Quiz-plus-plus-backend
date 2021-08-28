<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = "exams";

    protected $fillable = [
        'exam_name',
        'subject_id',
        'exam_secret',
        'duration',
        'date',
        'time',
    ];

    protected $hidden = [
        'exam_secret'
    ];

    public function quizs() {
        return $this->belongsToMany(Quiz::class);
    }
}
