<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    //protected $table = 'blogposts'; //created for tinker first time learning

    //---define which properties should be modified

    protected $fillable = ['title', 'content']; //specify column names, that shoud be modified by mass assignment

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


}
