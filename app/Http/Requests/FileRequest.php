<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'file'=>'required|file|mimes:jpg,jpeg,png,gif,mp4,pdf,docx|max:202400',
            'course'=>'required|exists:courses,id'
        ];
    }
    public function messages()
    {
        return [
            'name.required'       => 'The file name (title of your file) is required.',
            'file.required'        => 'The file field is required.',
            'file.file'            => 'the input must be a file',
            'file.mimes'           => 'the file extension must be one of those:jpg,jpeg,png,gif,mp4,pdf,docx',
            'file.max'             => 'The file is too big',
            'course.required'      => 'The course field is required.',
        ];
    }
}
