<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    use HasFactory;

    protected $fillable = [
        'levelID',
        'studentLevel',

    ];


    public function student(){
        return $this->hasOne(Levels::class, 'levelID', 'levelID');
    }
}
