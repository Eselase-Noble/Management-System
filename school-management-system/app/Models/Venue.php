<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'venueID',
        'venueName'
    ];

    public function classes(){
        return $this->hasOne(classes::class,'venueID', 'venueID');
    }
}
