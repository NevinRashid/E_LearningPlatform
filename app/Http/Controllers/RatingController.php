<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Requests\RatingRequest;
use Illuminate\Support\Facades\Auth;
class RatingController extends Controller
{
        public function __construct(){
            $this->middleware('auth');
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

