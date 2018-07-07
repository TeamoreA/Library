<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'genre_id',
    	'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
}
