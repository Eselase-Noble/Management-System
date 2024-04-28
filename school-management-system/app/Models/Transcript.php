<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transcript extends Model
{
    use HasFactory;

    protected $fillable = [
        'gradeID'
    ];

public function grade(){
    return $this->hasMany(Grades::class, 'gradeID', 'gradeID');
}


}
