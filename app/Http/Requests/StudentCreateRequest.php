<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'lastname' => 'string|nullable|max:100',
            'email' => 'required|email|unique:students',
            'phone' => 'required|string|unique:students',
            'address' => 'required|string|max:100',
            'city' => 'required|string',
            'dni' => 'required|string|unique:students|max:20',
            'semester' => 'required|integer|min:1|max:14',
        ];
    }
}
