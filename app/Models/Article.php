<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    public function hasManyComments()
    {
        return $this->hasMany('App\Models\Comment', 'article_id', 'id');
    }


    public function comments()
    {
        // $this->morphMany('App\Models\Comment',$item,$item_type,$item_id,$id);
        return $this->morphMany('App\Models\Comment','item');
    }
}
