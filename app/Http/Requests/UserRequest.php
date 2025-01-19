<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Propaganistas\LaravelPhone\Rules\Phone;
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
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users|max:255',
            'phone'     =>['required', 'regex:/^\+?\d{1,2}[-.\s]?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/'],
            'password' => 'required|string|min:8|confirmed',
            'image'    => 'nullable|mimes:jpg,jpeg,png|max:2048', 
        ];
    }
    /*public function messages()
    {
        return [

            'name'        => 'The name is required.',
            'email'       => 'The email is required.',
            'phone'       => 'The phone is required.',
            'password'    => 'The password is required.',
            'image'       => 'The image is required.',
        ];
    }*/
}
