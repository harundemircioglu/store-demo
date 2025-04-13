<?php

namespace Modules\Store\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'store_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'store_logo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'store_banner' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'store_name.required' => 'The store name is required.',
            'store_name.string' => 'The store name must be a string.',
            'store_name.max' => 'The store name may not be greater than 255 characters.',

            'email.required' => 'The email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address may not be greater than 255 characters.',
            'email.unique' => 'This email address is already in use.',

            'password.required' => 'The password is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',

            'store_logo.required' => 'The store logo is required.',
            'store_logo.image' => 'The store logo must be an image.',
            'store_logo.mimes' => 'The store logo must be a file of type: jpeg, png, jpg, gif, svg.',
            'store_logo.max' => 'The store logo may not be larger than 2MB.',

            'store_banner.required' => 'The store banner is required.',
            'store_banner.image' => 'The store banner must be an image.',
            'store_banner.mimes' => 'The store banner must be a file of type: jpeg, png, jpg, gif, svg.',
            'store_banner.max' => 'The store banner may not be larger than 2MB.',
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
