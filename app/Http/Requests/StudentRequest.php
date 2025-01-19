<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'name'     => ['required','string','max:255'],
            'email'    => ['required','email',Rule::unique('users')->ignore($this->route('student')),'max:255'],
            'phone'     =>['required','string','max:255'],
            'password' => ['required','string','min:8','confirmed'],
            'image'    => ['mimes:jpg,jpeg,png','max:2048'], 
            'course_ids' => ['required','array'],
            'course_ids.*'=>['required','exists:courses,id'],
        ];
    }
    public function messages()
    {
        return [
            'name'        => 'The name is required.',
            'email'       => 'The email is required.',
            'phone'       => 'The phon is required.',
            'password.min'    => 'The password is required to be more than 8 characters',
            'password.confirmed'    => 'The password does not match',
            'image'       => 'The image is required.',
        ];
    }
}
