<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    protected $table = "book_user";

    protected $fillable = [
    	'project_id',
    	'user_id'
    ];
}
}
