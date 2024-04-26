<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;


    protected $fillable = [
        'gradeID',
        'studentID',
        'courseID',
        'grade'
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'studentID', 'studentID');
    }

    public function course(){
        return $this->belongsTo(Courses::class, 'courseID', 'courseID');
    }

    public function transcript(){
        return $this->belongsTo(Transcript::class, 'gradeID', 'gradeID');
    }
}
