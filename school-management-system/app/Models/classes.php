<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    use HasFactory;


    protected $fillable = [
        'courseID',
        'venueID',
        'startTime',
        'endTime',
    ];

    public function course(){
        return $this->hasOne(Courses::class, 'courseID', 'courseID');
    }

    public function venue(){
        return $this->hasOne(Venue::class, 'venueID', 'venueID');
    }
}
