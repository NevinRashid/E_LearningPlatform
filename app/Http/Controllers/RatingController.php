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
        $ratings=Rating::paginate(10);
        return view('comments.index',compact('ratings'));
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
            Rating::create(['user_id'=>Auth::user()->id,'course_id'=>$validatedData['course_id'],'comment_text'=>$validatedData['comment_text']]);
            return redirect()->route('comments.index')->with('success', 'Comment Added successfully!');
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
            return redirect()->route('comments.index')->with('success', 'Comment deleted successfully!');
        }
        else{
            abort(403,'you do not have permissions to delete a Comment');
        }
    }

    

    public function rate(RatingRequest $request, Course $course)
    {
        
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to rate a course.');
        }

        $user = Auth::user(); // Get the authenticated user
        $ratingValue = $request->input('rating_value'); // Get the rating value from the form
        // Check if the user has already rated this course
        $existingRating = Rating::where('course_id', $course->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingRating) {
            return back()->with('error', 'You have already rated this course.');
        }

        // Create a new rating
        Rating::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'rating_value' => $request->rating_value,
        ]);

        return back()->with('success', 'Your rating has been submitted.');
    }
}

