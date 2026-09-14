<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class ContactStepRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'mobile_number' => ['required', 'string', 'min:10', 'max:30'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'This email address is already associated with an ORDO account. Please sign in or use another email address.',
            'mobile_number.min' => 'Please enter a valid mobile number with at least 10 digits.',
        ];
    }
}
