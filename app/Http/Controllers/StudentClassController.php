<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentClassCreateRequest;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function index()
    {
        $studentClasses = StudentClass::with('student', 'sClass')->get();
        if ($studentClasses->count() > 0) {
            return response()->json([
                'studentClasses' => $studentClasses
            ], 200);
        } else {
            return response()->json([
                'message' => 'No Student Classes found'
            ], 404);
        }
    }

    public function store(StudentClassCreateRequest $request)
    {
        try {
            $studentClass = StudentClass::create($request->all());
            return response()->json([
                'studentClass' => $studentClass,
                'message' => 'Student Class created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating Student Class'
            ], 500);
        }
    }
}
