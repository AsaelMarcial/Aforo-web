<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    //relacion muchos a muchos con commerce
    public function commerces()
    {
        return $this->belongsToMany(Commerce::class);
    }
}
