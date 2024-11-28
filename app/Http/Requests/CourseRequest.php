<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'level' => 'required|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'start_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required'       => 'The title is required.',
            'description.required' => 'The description is required.',
            'level.required'       => 'The level is required.',
            'price.required'       => 'The price is required.',
            'start_date.required'  => 'The start_date is required.',
        ];
    }

}
