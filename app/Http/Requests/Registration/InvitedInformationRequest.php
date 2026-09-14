<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class InvitedInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'invitation_code'  => ['required', 'string', 'max:100'],
            'invitation_email' => ['required', 'email', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'invitation_code.required'  => 'Please enter your invitation code (e.g. INV-92841).',
            'invitation_email.required' => 'Please enter the email address the invitation was sent to.',
            'invitation_email.email'    => 'Please enter a valid email address.',
        ];
    }
}
