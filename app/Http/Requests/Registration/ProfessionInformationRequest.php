<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'practice_name' => ['required', 'string', 'max:150'],
            'profession' => ['required', 'string', 'max:150'],
            'profession_other' => ['required_if:profession,Other', 'nullable', 'string', 'max:150'],
            'industry' => ['nullable', 'string', 'max:150'],
            'primary_address' => ['required', 'string', 'max:500'],
            'tin' => ['nullable', 'string', 'max:50'],
            'registration_number' => ['nullable', 'string', 'max:100'],
            'registration_authority' => ['nullable', 'string', 'max:150'],
            'business_email' => ['nullable', 'email', 'max:255'],
            'professional_email' => ['nullable', 'email', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string', 'max:1000'],
            'country' => ['nullable', 'string', 'max:100'],
            'relationship' => ['required', 'string', 'max:100'],
            'relationship_other' => ['required_if:relationship,Other', 'nullable', 'string', 'max:150'],
            'is_authorized' => ['required', 'string', 'in:Yes,No'],
        ];
    }

    public function messages(): array
    {
        return [
            'relationship_other.required_if' => 'Please specify your relationship to the account.',
            'profession_other.required_if' => 'Please specify your profession or practice type.',
        ];
    }
}
