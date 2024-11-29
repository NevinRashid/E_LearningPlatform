<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $courseId)
{
    $request->validate([
        'comment' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    $course = Course::findOrFail($courseId);
    $review = new Review([
        'comment' => $request->input('comment'),
        'rating' => $request->input('rating'),
    ]);

    $course->reviews()->save($review);

    return response()->json($review, 201);
}

}
