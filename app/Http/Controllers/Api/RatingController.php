<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RatingRequest;
class RatingController extends Controller
{
    public function store(RatingRequest $request)
    {
        $validated=$request->validated();

        $existingRating = Rating::where('user_id', Auth::user()->id)
            ->where('course_id', $validated['course_id'])
            ->first();

        if ($existingRating) {
            return response()->json([
                'message' => 'You have rated this course.',
            ], 409); // Conflict
        }
        else{
            $rating = Rating::create([
                'user_id' => Auth::user()->id,
                'course_id' => $validated['course_id'],
                'rating_value' => $validated['rating_value'], 
            ]);
    
            return response()->json([
                'message' => 'Rating added successfully!',
                'data' => $rating,
            ], 201);
        }
        
    }
}
