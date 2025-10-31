<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'name' => 'required|string|max:255',
            'role' => 'required|string|exists:roles,name',
            'status' => 'nullable|in:VERIFIED,PENDING',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters long.',
            'confirm_password.required' => 'Please confirm your password.',
            'confirm_password.same' => 'Password confirmation does not match.',
            'name.required' => 'Username is required.',
            'name.max' => 'Username cannot exceed 255 characters.',
            'role.required' => 'Please select a user role.',
            'role.exists' => 'The selected role is invalid.',
            'status.in' => 'Please select a valid status.',
        ];
    }
}
