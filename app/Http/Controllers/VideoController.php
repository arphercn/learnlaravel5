<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Video;

class VideoController extends Controller
{
    
    public function getComments($id)
    {
        $video = Video::find($id);
        $videoComments = $video->comments;
        dd($videoComments);
    }
}
