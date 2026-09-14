<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    protected function prepareForValidation(): void
    {
        if (!$this->has('legal_name') && $this->has('registered_name')) {
            $this->merge(['legal_name' => $this->input('registered_name')]);
        }
        if (!$this->has('industry_profession') && $this->has('industry')) {
            $this->merge(['industry_profession' => $this->input('industry')]);
        }
        if (!$this->has('business_email') && $this->has('email')) {
            $this->merge(['business_email' => $this->input('email')]);
        }
    }

    public function rules(): array
    {
        return [
            'account_type' => ['nullable', 'string', 'max:100'],
            'legal_name' => ['required', 'string', 'max:255'],
            'trade_name' => ['nullable', 'string', 'max:255'],
            'tin' => ['nullable', 'string', 'max:50'],
            'registration_number' => ['nullable', 'string', 'max:100'],
            'registration_authority' => ['nullable', 'string', 'max:150'],
            'registration_date' => ['nullable', 'date'],
            'industry_profession' => ['nullable', 'string', 'max:150'],
            'primary_address' => ['nullable', 'string'],
            'business_email' => ['nullable', 'email', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:30'],
            'website' => ['nullable', 'url', 'max:255'],
        ];
    }
}
