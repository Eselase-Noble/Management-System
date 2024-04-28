<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolments extends Model
{
    use HasFactory;


    protected $fillable = [
    
        'studentID',
        'courseID',
        'enrolDate',
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'studentID', 'studentID');
    }

    public function course(){
        return $this->belongsTo(Courses::class, 'courseID', 'courseID');
    }
}
