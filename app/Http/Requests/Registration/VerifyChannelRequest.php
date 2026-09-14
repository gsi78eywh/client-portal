<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class VerifyChannelRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'verification_code' => ['required', 'digits:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'verification_code.required' => 'Please enter the 6-digit verification code.',
            'verification_code.digits' => 'The verification code must be exactly 6 digits.',
        ];
    }
}
