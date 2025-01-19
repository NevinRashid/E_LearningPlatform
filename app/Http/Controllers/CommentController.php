<?php

namespace App\Http\Controllers;

use Illuminate\Database\Console\Migrations\RefreshCommand;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Reply;
use App\Models\File;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
       
        $comment=Comment::create(['user_id'=>Auth::user()->id,'course_id'=>$request->course_id,'file_id'=>$request->file_id,'comment_text'=>$request->comment_text]);
        $course=Course::where('id',$request->course_id)->first();
        $file=File::where('id',$request->file_id)->first();
        $course->comments()->save($comment);
        $file->comments()->save($comment);
        return redirect()->route('files.show',$file->id);
       
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit',compact('comment'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Comment $comment,Request $request)
    {
        $comment->comment_text=$request->comment_text;
        $comment->save();
        $course=Course::findOrFail($comment->course_id);
        return redirect()->route('courses.show',$course);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success');
    }
}
