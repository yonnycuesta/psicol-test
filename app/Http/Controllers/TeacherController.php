<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherCreateRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subjects','sClass')->orderBy('created_at', 'desc')->paginate(4);
        if ($teachers->count() > 0) {
            return response()->json([
                'teachers' => $teachers
            ], 200);
        } else {
            return response()->json([
                'message' => 'No Teachers found'
            ], 404);
        }
    }

    // Obtener las materias que tiene el profesor
    public function showSubjects($id)
    {
        // Obtener las materia de cada clase que tiene el profesor
        $teacher = Teacher::with('subjects')->where('id', $id)->get();
        if ($teacher->count() > 0) {
            return response()->json([
                'teacher' => $teacher
            ], 200);
        } else {
            return response()->json([
                'message' => 'No Teacher found'
            ], 404);
        }
    }

    // obtener todos los profesores
    public function show(){
        $teachers = Teacher::with('subjects','sClass')->orderBy('created_at', 'desc')->get();
        if ($teachers->count() > 0) {
            return response()->json([
                'teachers' => $teachers
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
