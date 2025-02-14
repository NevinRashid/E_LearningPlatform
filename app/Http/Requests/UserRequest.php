<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Propaganistas\LaravelPhone\Rules\Phone;
use Illuminate\Validation\Rule;
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
            'name'     => ['required','string','max:255'],
            'email'    => ['required','email',Rule::unique('users')->ignore($this->route('admin')),'max:255'],
            'phone'     =>['required','string','max:255'],
            'password' => ['nullable','string','min:8','confirmed'],
            'image'    => ['nullable','mimes:jpg,jpeg,png','max:2048'], 
        ];
    }
    public function messages()
    {
        return [

            'name.required'        => 'The name is required.',
            'email.required'       => 'The email is required.',
            'phone.required'       => 'The phone is required.',
            'password.confirmed'    => 'The password does not match',
        ];
    }
}
