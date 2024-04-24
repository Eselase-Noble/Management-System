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
        return $this->belongsTo(Department::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }
}
