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
            'invitation_code' => ['required', 'string', 'max:100'],
            'invitation_email' => ['required', 'email', 'max:255'],
        ];
    }
}
