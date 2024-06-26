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
        'courseID',
        'courseName',
        'semester',
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

    public function classes(){
        return $this->hasOne(classes::class, 'courseID', 'courseID');
    }
}
