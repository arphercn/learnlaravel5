<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Country;

class CountryController extends Controller
{
    
    public function getPosts($id)
    {
        $country = Country::find($id);
        $posts = $country->posts;

        echo 'Country#'.$country->name.'下的文章：<br>';
        foreach($posts as $post){
            echo '&lt;&lt;'.$post->title.'&gt;&gt;<br>';
        }
    }
}
