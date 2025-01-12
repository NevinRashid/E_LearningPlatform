<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'comment_text' => 'required|string|max:1000',
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(), 
            'course_id' => $request->course_id,
            'comment_text' => $request->comment_text, 
        ]);

        return response()->json([
            'message' => 'Comment added successfully!',
            'data' => $comment,
        ], 201);
    }
}
