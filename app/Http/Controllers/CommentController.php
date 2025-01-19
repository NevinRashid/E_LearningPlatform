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
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;

class CommentController extends Controller
{
    use HasRoles;
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user_role');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments=Comment::paginate(10);
        return view('comments.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses=Course::all();
        return view('comments.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        if($request->user()->hasRole('admin')||$request->user()->hasRole('trainer')){
            $validatedData=$request->validated();
            Comment::create(['user_id'=>Auth::user()->id,'course_id'=>$validatedData['course_id'],'comment_text'=>$validatedData['comment_text']]);
            return redirect()->route('comments.index')->with('success', 'Comment Added successfully!');
        }
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
    public function update(Comment $comment,CommentRequest $request)
    {
        if($request->user()->hasRole('admin')){
            $validatedData=$request->validated();
            $comment->comment_text=$validatedData['comment_text'];
            $comment->save();
            return redirect()->route('comments.index')->with('success', 'Comment updated successfully!');
        }
        else{
            abort(403,'you do not have permissions to update a Comment');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $user=User::findOrfail(Auth::user()->id);
        if($user->hasRole('admin')){
            $comment->delete();
            return redirect()->route('comments.index')->with('success', 'Comment deleted successfully!');
        }
        else{
            abort(403,'you do not have permissions to delete a Comment');
        }
    }
}
