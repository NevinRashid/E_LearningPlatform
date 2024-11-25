<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'     => ['required|string|max:255'],
            'email'    => ['required|email|unique:users,email|max:255'],
            'phon'     =>['required|numeric|max:255'],
            'password' => ['required|string|min:8|confirmed'],
            'image'    => ['required|mimes:jpg,jpeg,png|max:2048'],
        ];
    }
    public function messages()
    {
        return [
            'name'        => ['The name is required.'],
            'email'       => ['The email is required.'],
            'phon'       => ['The phon is required.'],
            'password'    => ['The password is required.'],
            'image'       => ['The image is required.'],
        ];
    }
}