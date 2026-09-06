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
            'industry' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:100'],
        ];
    }
}
