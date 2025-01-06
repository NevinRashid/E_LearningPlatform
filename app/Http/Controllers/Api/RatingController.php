<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'rating_value' => 'required|integer|min:1|max:5', 
        ]);

        $existingRating = Rating::where('user_id', auth()->id())
            ->where('course_id', $request->course_id)
            ->first();

        if ($existingRating) {
            return response()->json([
                'message' => 'You have rated this course.',
            ], 409); // Conflict
        }
        $rating = Rating::create([
            'user_id' => auth()->id(),
            'course_id' => $request->course_id,
            'rating_value' => $request->rating_value, 
        ]);

        return response()->json([
            'message' => 'Rating added successfully!',
            'data' => $rating,
        ], 201);
    }
}
