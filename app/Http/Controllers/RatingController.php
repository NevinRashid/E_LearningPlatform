<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Requests\RatingRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class RatingController extends Controller
{
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
        $ratings=Rating::with('course')->paginate(10);
        return view('ratings.index',compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses=Course::all();
        return view('ratings.create',compact('courses'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(RatingRequest $request)
    {
        if($request->user()->hasRole('admin')||$request->user()->hasRole('trainer')){
            $validatedData=$request->validated();
            // Check if the user has already rated this course
                $existingRating = Rating::where('course_id', $validatedData['course_id'])
                ->where('user_id', Auth::user()->id)
                ->first();

            if ($existingRating) {
            return back()->with('error', 'You have already rated this course.');
            }
            else{
                Rating::create(['user_id'=>Auth::user()->id,'course_id'=>$validatedData['course_id'],'rating_value'=>$validatedData['rating_value']]);
                return redirect()->route('ratings.index')->with('success', 'Rating Added successfully!');
            }

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        return view('ratings.edit',compact('rating'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Rating $rating,RatingRequest $request)
    {
        if($request->user()->hasRole('admin')){
            $validatedData=$request->validated();
            $rating->comment_text=$validatedData['comment_text'];
            $rating->save();
            return redirect()->route('comments.index')->with('success', 'Comment updated successfully!');
        }
        else{
            abort(403,'you do not have permissions to update a rating');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        $user=User::findOrfail(Auth::user()->id);
        if($user->hasRole('admin')){
            $rating->delete();
            return redirect()->route('ratings.index')->with('success', 'Comment deleted successfully!');
        }
        else{
            abort(403,'you do not have permissions to delete a Comment');
        }
    }
}