<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255', 'string'],
            'level' => ['required', 'numeric', 'max:10'],
            'hours' => ['required', 'numeric', 'max:4'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'students' => ['array'],
        ];
    }
}
