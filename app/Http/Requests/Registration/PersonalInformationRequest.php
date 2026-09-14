<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class PersonalInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $profile = session('registration.profile', []);
        $parts = array_filter([
            $profile['first_name'] ?? '',
            $profile['middle_name'] ?? '',
            $profile['last_name'] ?? '',
            $profile['suffix'] ?? '',
        ], fn($val) => !is_null($val) && trim((string)$val) !== '');
        $profileFullName = implode(' ', $parts);

        if (empty($this->account_name) && !empty($profileFullName)) {
            $this->merge(['account_name' => $profileFullName]);
        }
    }

    public function rules(): array
    {
        return [
            'account_name' => ['nullable', 'string', 'max:150'],
            'purpose' => ['nullable'],
            'purpose_other' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $validated = parent::validated($key, $default);

        // Clean up purpose if submitted as array or with "Other"
        if (isset($validated['purpose'])) {
            if (is_array($validated['purpose'])) {
                $purposes = array_filter($validated['purpose'], fn($p) => !empty($p) && $p !== 'all');
                if (in_array('Other', $purposes) && !empty($validated['purpose_other'])) {
                    $purposes = array_map(fn($p) => $p === 'Other' ? 'Other: ' . trim($validated['purpose_other']) : $p, $purposes);
                }
                $validated['purpose'] = implode('; ', array_unique($purposes));
            } elseif ($validated['purpose'] === 'Other' && !empty($validated['purpose_other'])) {
                $validated['purpose'] = 'Other: ' . trim($validated['purpose_other']);
            }
        }

        return $validated;
    }
}
