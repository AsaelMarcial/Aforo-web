<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];
    //Relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //relacion muchos a muchos con commerce
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class);
    }

    //Relacion uno a uno con schedule
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    //Relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
