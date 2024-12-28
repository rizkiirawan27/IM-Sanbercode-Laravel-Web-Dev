<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    protected $table = 'films';

    protected $fillable = ['title', 'summary', 'release_year', 'poster', 'genre_id'];

    public function genres(){
       return $this->belongsTo(Genres::class, 'genre_id');
    }

    public function listReviews(){
        return $this->hasMany(Reviews::class, 'film_id');
    }

    public function listPoint(){
    return $this->hasMany(Reviews::class, 'point');
    }
}