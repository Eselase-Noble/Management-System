<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    protected $fillable = [
        'studentID',
        'surname',
        'othernames',
        'email',
        'dob',
        'gender',
        'telephone',
        'address',
        'nationality',
        'levelID',

    ];

    public function grade(){
        return $this->hasMany(Grades::class, 'studentID','studentID');
    }

    public  function enrolment(){
        return $this->hasOne(Enrolments::class, 'studentID', 'studentID');
    }

    public function level(){
        return $this->belongsTo(Levels::class, 'levelID', 'levelID');
    }


}
