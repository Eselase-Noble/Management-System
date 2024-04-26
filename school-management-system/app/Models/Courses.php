<?php

namespace App\Models;

use \App\Models\Department;
use \App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $fillable =[
        'courseCode',
        'courseName',
        'description',
        'departmentID',
        'staffID',
    ];

    public function department(){
        return $this->belongsTo(Department::class, 'departmentID','departmentID');
    }

    public function staff(){
        return $this->belongsTo(Staff::class, 'staffID','staffID');
    }

    public function enrolment(){
        return $this->hasMany(Enrolments::class, 'courseID', 'courseID');
    }

    public function session(){
        return $this->hasOne(Session::class, 'courseID', 'courseID');
    }
}
