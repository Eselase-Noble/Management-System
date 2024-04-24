<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

            protected $fillable = [
        'staffID',        
        'surname',
        'othernames',
        'email',
        'dob',
        'gender',
        'telephone',
        'address',
        'nationality',
        'qualification'
    
    ];
}
