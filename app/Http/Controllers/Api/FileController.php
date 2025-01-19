<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use App\Models\Comment;
class FileController extends Controller
{
    public function video($id){
        $video=File::where('id', $id)
                    ->where('type','video')
                    ->first();
        $comments=Comment::with('file')->where('file_id',$video->id)->get();
        return response()->json(['info'=>$video,'comments'=>$comments]);

    }
}
