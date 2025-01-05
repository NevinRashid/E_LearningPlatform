<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);
    
        $review = Review::create([
            'user_id' => auth()->id(),
            'course_id' => $validated['course_id'],
            'comment' => $validated['comment'],
            'rating' => $validated['rating'],
        ]);

        $course->reviews()->save($review);

        // استرجاع الرد كاستجابة JSON
        return response()->json([
            'message' => 'Review added successfully.',
            'review' => $review,
        ], 201);
    }
} 
