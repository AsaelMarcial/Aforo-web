<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    //Relacion uno a muchos Usuario - Comercio
    public function comercios()
    {
        return $this->hasMany(Comercio::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
