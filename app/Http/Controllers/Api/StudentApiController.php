<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class StudentApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Welcome to the Student API',
            'status' => 'success',
        ]);
    }
}
