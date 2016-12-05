<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    public function comments()
    {
        // $this->morphMany('App\Models\Comment',$item,$item_type,$item_id,$id);
        return $this->morphMany('App\Models\Comment','item');
    }
}
