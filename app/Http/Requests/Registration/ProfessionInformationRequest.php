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
            'description' => ['nullable', 'string', 'max:1000'],
            'country' => ['required', 'string', 'max:100'],
        ];
    }
}
