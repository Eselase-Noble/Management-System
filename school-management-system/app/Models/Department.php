<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'departmentID',
        'departmentName'
    ];

    public function course(){
        return $this->hasMany(Courses::class, 'departmentID', 'departmentID');
    }
}
