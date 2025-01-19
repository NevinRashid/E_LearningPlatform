<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
        //dd($_REQUEST);
        return [
            'comment_text'     => ['required','string','max:255'],
            'course_id'        =>['sometimes','exists:courses,id'],
        ];
    }
    public function messages()
    {
        return [
            'comment_text'        => 'The comment text is required.',
            'course_id'       => 'The course is required.',
        ];
        
    }
}
