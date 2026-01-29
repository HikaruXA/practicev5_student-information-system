<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject_id' => 'required|integer|gt:0',
            'student_id' => 'required|integer|gt:0',
            'name' => 'required|string|max:255',
            'score' => 'required|numeric|decimal:2',
            'total' => 'required|numeric|decimal:2',
        ];
    }
}
