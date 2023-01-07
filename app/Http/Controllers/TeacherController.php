<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherCreateRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subjects','sClass')->get();
        if ($teachers->count() > 0) {
            return response()->json([
                'Teachers' => $teachers
            ], 200);
        } else {
            return response()->json([
                'message' => 'No Teachers found'
            ], 404);
        }
    }

    public function store(TeacherCreateRequest $request)
    {
        try {
            $teacher = Teacher::create($request->all());
            return response()->json([
                'teacher' => $teacher,
                'message' => 'Teacher created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating Teacher',
                'error' => $request->messages()
            ], 500);
        }
    }
}
