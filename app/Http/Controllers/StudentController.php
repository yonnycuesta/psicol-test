<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('studentClasses')->get();
        if ($students->count() > 0) {
            return response()->json([
                'students' => $students
            ], 200);
        } else {
            return response()->json([
                'message' => 'No students found'
            ], 404);
        }
    }

    public function store(StudentCreateRequest $request)
    {
        try {
            $student = Student::create($request->all());
            return response()->json([
                'student' => $student,
                'message' => 'Student created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating student'
            ], 500);
        }
    }

    public function show($id)
    {
        // Obtener las clases que tiene el estudiante y obtener la materia de cada clase
        $student = Student::with('studentClasses.sClass.subject')->where('id', $id)->get();
        if ($student->count() > 0) {
            return response()->json([
                'student' => $student
            ], 200);
        } else {
            return response()->json([
                'message' => 'No Student found'
            ], 404);
        }
    }
}
