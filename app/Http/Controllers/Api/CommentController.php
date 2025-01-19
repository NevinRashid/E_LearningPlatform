<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();

        $comment = Comment::create([
            'user_id' => Auth::user()->id, 
            'course_id' => $request->course_id,
            'file_id'=> $request->file_id,
            'comment_text' => $validated['comment_text'], 
        ]);

        return response()->json([
            'message' => 'Comment added successfully!',
            'data' => $comment,
        ], 201);
    }
}
