<?php

namespace App\Http\Controllers;

use App\Http\Requests\sClassCreateRequest;
use App\Models\sClass;
use Illuminate\Http\Request;

class SClassController extends Controller
{
    
    public function index()
    {
        $sClasses = sClass::with('teacher', 'subject')->get();
        if ($sClasses->count() > 0) {
            return response()->json([
                'sClasses' => $sClasses
            ], 200);
        } else {
            return response()->json([
                'message' => 'No Classes found'
            ], 404);
        }
    }

    public function store(sClassCreateRequest $request)
    {
        try {
            $sClass = sClass::create($request->all());
            return response()->json([
                'sClass' => $sClass,
                'message' => 'Class created successfully'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating class'
            ], 500);
        }
    }
}
