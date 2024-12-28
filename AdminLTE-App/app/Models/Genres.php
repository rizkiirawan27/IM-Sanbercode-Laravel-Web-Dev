<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $table = 'genres';

    protected $fillable = ['name'];

    public function listFilms()
    {
        return $this->hasMany(Films::class, 'genre_id');
    }
}
