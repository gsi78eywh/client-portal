<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class BusinessInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'business_account_type' => [
                'required',
                'string',
                'in:Sole Proprietorship,Partnership,OPC,Corporation,Association / Nonprofit,Cooperative,Government / Public Entity,Other',
            ],
            'registered_name' => ['required', 'string', 'max:255'],
            'trade_name' => ['nullable', 'string', 'max:255'],
            'tin' => ['nullable', 'string', 'max:50'],
            'registration_number' => ['nullable', 'string', 'max:100'],
            'registration_authority' => ['nullable', 'string', 'max:150'],
            'registration_date' => ['nullable', 'date'],
            'industry' => ['nullable', 'string', 'max:255'],
            'primary_address' => ['nullable', 'string', 'max:500'],
            'company_email' => ['nullable', 'email', 'max:255'],
            'company_phone' => ['nullable', 'string', 'max:50'],
            'business_email' => ['nullable', 'email', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:50'],
            'website' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:100'],
            'relationship' => ['required', 'string', 'max:100'],
            'is_authorized' => ['required', 'string', 'in:Yes,No'],
        ];
    }
}
