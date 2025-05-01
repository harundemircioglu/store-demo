<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'min:10', 'max:20', Rule::unique('users', 'phone')->ignore(auth()->id())],
            'email' => ['required', 'email', 'max:100', Rule::unique('users', 'email')->ignore(auth()->id())],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name field is required.',
            'name.string' => 'Name must be a string.',
            'name.max' => 'Name must not exceed 50 characters.',

            'surname.required' => 'Surname field is required.',
            'surname.string' => 'Surname must be a string.',
            'surname.max' => 'Surname must not exceed 50 characters.',

            'phone.required' => 'Phone field is required.',
            'phone.string' => 'Phone must be a valid string.',
            'phone.min' => 'Phone must be at least 10 characters.',
            'phone.max' => 'Phone must not exceed 20 characters.',
            'phone.unique' => 'This phone number is already taken.',

            'email.required' => 'Email field is required.',
            'email.email' => 'Email format is invalid.',
            'email.max' => 'Email must not exceed 100 characters.',
            'email.unique' => 'This email is already taken.',

            'password.required' => 'Password field is required.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
