<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    
        public function rules(): array
 {
    return [
        'first_name' => ['required', 'string'],
        'last_name' => ['required', 'string'],
        'username' => ['required', 'string', Rule::unique(User::class)],
        'email' => ['required', 'email', Rule::unique(User::class)],
        'number_phone' => ['required', 'string'],
        'password' => ['required', 'string', 'min:8'],
        'address' => ['nullable', 'string'],
        'profile_photo' => ['nullable', 'string'],
        'profession' => ['nullable', 'string'],
        'summary' => ['nullable', 'string'],
        'earning' => ['nullable', 'integer'],
        'portofolio_attachment' => ['nullable', 'string'],
        'role' => ['required', Rule::in(['admin', 'freelancer', 'employer'])],
    ];
        }
    }
