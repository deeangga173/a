<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['nullable', 'string'],
            'last_name' => ['nullable', 'string'],
            'username' => ['nullable', 'string', Rule::unique(User::class)],
            'email' => ['nullable', 'email', Rule::unique(User::class)],
            'number_phone' => ['nullable', 'string'],
            'password' => ['nullable', 'string', 'min:8'],
            'address' => ['nullable', 'string'],
            'profile_photo' => ['nullable', 'string'],
            'profession' => ['nullable', 'string',],
            'summary' => ['nullable', 'text'],
            'earning' => ['nullable', 'integer'],
            'portofolio_attachment' => ['nullable', 'string'],
            'role' => ['nullable', 'string', Rule::in(['admin', 'freelancer', 'employer'])],
        ];
    }
}
