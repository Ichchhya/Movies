<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'release_date',
        'poster',
        'is_published'
    ];

    protected $appends =[
        'poster_image'
    ];

    public function isFavorited(){
        return $this->hasOne(Favorite::class)->where('user_id',auth()->id());
    }

    public function favCount(){
        return $this->hasMany(Favorite::class);
    }

    public function getPosterImageAttribute(){
        return $this->poster ? asset('storage/posters/'.$this->poster) : asset('img/movie.jpg');
    }
}
