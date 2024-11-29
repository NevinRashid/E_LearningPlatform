<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
{
    return Course::with('reviews')->get();
}

public function show($id)
{
    return Course::with('reviews')->findOrFail($id);
}

}
