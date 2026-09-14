@extends('layouts.registration')

@section('title', 'Your professional account — ORDO')

@section('content')

@php
    $information = $information ?? session('registration.information', []);

    // Selected values with old() fallback
    $selectedProfession = old('profession', $information['profession'] ?? '');
    $isProfessionOther = $selectedProfession === 'Other';
    $professionOtherVal = old('profession_other', $information['profession_other'] ?? '');

    $selectedRelationship = old('relationship', $information['relationship'] ?? 'Lead Practitioner');
    $isRelationshipOther = $selectedRelationship === 'Other';
    $relationshipOtherVal = old('relationship_other', $information['relationship_other'] ?? '');

    $authVal = old('is_authorized', $information['is_authorized'] ?? 'Yes');
@endphp

<div class="auth-panel wide" id="professionPanel">

    {{-- =========================================================
         TOP ACCOUNT AREA / SIGN IN
    ========================================================== --}}
    <div style="display: flex; justify-content: flex-end; align-items: center; margin-bottom: 20px;">
        <a href="{{ route('login') }}" style="color: #64748b; font-size: 13px; text-decoration: none;">
            Already have an account? <strong style="color: #2563eb;">Sign in</strong>
        </a>
    </div>

    {{-- =========================================================
         HEADER
    ========================================================== --}}
    <div class="kicker">CREATE YOUR ORDO ACCOUNT</div>
    <h2>Your professional account</h2>
    <p>Tell us about your profession or practice. You can provide more complete profile and credential details later.</p>

    {{-- =========================================================
         7-STEP PROGRESS INDICATOR (STEP 3 OF 7 ACTIVE)
    ========================================================== --}}
    <div class="step-label">
        <span>Step 3 of 7 &mdash; Practice Details</span>
        <span style="color: var(--blue);">43%</span>
    </div>
    <div class="wizard-top progress-bar" role="progressbar" aria-label="Step 3 of 7" aria-valuemin="1" aria-valuemax="7" aria-valuenow="3">
        <span class="wizard-step on progress-segment completed" aria-label="Step 1 complete"></span>
        <span class="wizard-step on progress-segment completed" aria-label="Step 2 complete"></span>
        <span class="wizard-step on progress-segment active" aria-current="step" aria-label="Step 3 active"></span>
        <span class="wizard-step progress-segment" aria-label="Step 4"></span>
        <span class="wizard-step progress-segment" aria-label="Step 5"></span>
        <span class="wizard-step progress-segment" aria-label="Step 6"></span>
        <span class="wizard-step progress-segment" aria-label="Step 7"></span>
    </div>

    {{-- =========================================================
         VALIDATION ERRORS
    ========================================================== --}}
    @if ($errors->any())
        <div class="alert alert-error" role="alert" style="margin-bottom: 20px;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <ul style="margin: 0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- =========================================================
         ACCOUNT TYPE SUMMARY CARD
    ========================================================== --}}
    <div class="account-card" style="margin-bottom: 22px; border: 1.5px solid #e2e8f0; background: #f8fafc; border-radius: 12px; padding: 14px 16px; display: flex; align-items: center; gap: 14px;">
        <div class="account-icon" style="width: 40px; height: 40px; border-radius: 10px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="8" r="3.5"/>
                <path d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"/>
            </svg>
        </div>
        <div class="account-info">
            <div style="font-size: 11px; font-weight: 800; color: #2563eb; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 2px;">Account type</div>
            <div style="font-size: 15px; font-weight: 700; color: #0f172a;">Professional / Practice account</div>
            <div style="font-size: 13px; color: #64748b; margin-top: 2px;">For individual practitioners, licensed professionals, clinics, and independent practices.</div>
        </div>
    </div>

    {{-- =========================================================
         REGISTRATION FORM
    ========================================================== --}}
    <form
        method="POST"
        action="{{ route('profession.update') }}"
        id="professionForm"
        novalidate
    >
        @csrf

        <div class="form-grid">

            {{-- 1. Practice Name --}}
            <div class="full">
                <label class="label" for="practice_name">
                    Professional / Practice Name <span style="color:var(--red)">*</span>
                </label>
                <input
                    type="text"
                    id="practice_name"
                    name="practice_name"
                    class="input @error('practice_name') has-error @enderror"
                    value="{{ old('practice_name', $information['practice_name'] ?? '') }}"
                    placeholder="e.g. Dr. Elena Santos Clinic or Bautista Law & Advisory"
                    maxlength="150"
                    autocomplete="organization"
                    required
                >
                <div class="field-hint">The official name you want associated with your practice workspace.</div>
                @error('practice_name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- 2. Profession / Practice Type (Comprehensive List) --}}
            <div class="full">
                <label class="label" for="profession">
                    Profession / Practice Type <span style="color:var(--red)">*</span>
                </label>
                <div class="select-wrapper">
                    <select
                        id="profession"
                        name="profession"
                        class="input select @error('profession') has-error @enderror"
                        required
                    >
                        <option value="">Select your profession / practice type</option>
                        @php
                            $professionOptions = [
                                'Doctor' => 'Doctor / Physician',
                                'Lawyer' => 'Lawyer / Legal Professional',
                                'Accountant' => 'Accountant / CPA',
                                'Engineer' => 'Engineer',
                                'Architect' => 'Architect',
                                'Dentist' => 'Dentist',
                                'Nurse' => 'Nurse / Healthcare Practitioner',
                                'Consultant' => 'Consultant',
                                'Therapist' => 'Therapist / Mental Health Counselor',
                                'Teacher / Educator' => 'Teacher / Educator',
                                'Freelancer' => 'Freelancer / Creative Professional',
                                'Business Consultant' => 'Business Consultant',
                                'Financial Advisor' => 'Financial Advisor / Wealth Consultant',
                                'Real Estate Broker' => 'Real Estate Broker / Appraiser',
                                'IT / Software Consultant' => 'IT / Software Consultant',
                                'Clinic' => 'Clinic / Outpatient Practice',
                                'Independent Practice' => 'Independent Practice / Solo Office',
                                'Other' => 'Other',
                            ];
                        @endphp

                        @foreach($professionOptions as $code => $label)
                            <option
                                value="{{ $code }}"
                                @selected($selectedProfession === $code)
                            >
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="field-hint">Select the category that best describes your practice or specialty.</div>
                @error('profession')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- 2B. Conditional Specify Profession Field (When "Other" is Selected) --}}
            <div
                class="full"
                id="professionOtherWrapper"
                style="display: {{ $isProfessionOther ? 'block' : 'none' }};"
            >
                <label class="label" for="profession_other">
                    Specify Profession / Practice Type <span style="color:var(--red)">*</span>
                </label>
                <input
                    type="text"
                    id="profession_other"
                    name="profession_other"
                    class="input @error('profession_other') has-error @enderror"
                    value="{{ $professionOtherVal }}"
                    placeholder="e.g. Veterinarian, Psychologist, Interior Designer, Nutritionist"
                    maxlength="150"
                    {{ $isProfessionOther ? 'required' : '' }}
                >
                <div class="field-hint">Please specify your exact profession or practice specialization.</div>
                @error('profession_other')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- 3. Description (Optional) --}}
            <div class="full">
                <label class="label" for="description">
                    Practice Overview / Description <span class="optional" style="color:var(--muted);font-weight:400;font-size:12px;">(optional)</span>
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="3"
                    maxlength="1000"
                    class="input textarea @error('description') has-error @enderror"
                    placeholder="Briefly describe your services, scope of practice, or primary clientele."
                >{{ old('description', $information['description'] ?? '') }}</textarea>
                <div class="field-hint">A brief summary for your practice workspace and client profile.</div>
                @error('description')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- 4. Primary Address --}}
            <div class="full">
                <label class="label" for="primary_address">
                    Primary Practice Address <span style="color:var(--red)">*</span>
                </label>
                <textarea
                    id="primary_address"
                    name="primary_address"
                    rows="2"
                    maxlength="500"
                    class="input textarea @error('primary_address') has-error @enderror"
                    placeholder="Building, Street, Suite / Unit, City, Province / State"
                    required
                >{{ old('primary_address', $information['primary_address'] ?? '') }}</textarea>
                <div class="field-hint">Official physical or office location where your practice operates.</div>
                @error('primary_address')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- 5. Professional Registration / License Number (Optional) --}}
            {{-- NOTE: Tax Identification Number (TIN) is completely removed per Requirement 2 --}}
            <div class="full">
                <label class="label" for="registration_number">
                    Professional Registration / License Number <span class="optional" style="color:var(--muted);font-weight:400;font-size:12px;">(optional)</span>
                </label>
                <input
                    type="text"
                    id="registration_number"
                    name="registration_number"
                    class="input @error('registration_number') has-error @enderror"
                    value="{{ old('registration_number', $information['registration_number'] ?? '') }}"
                    placeholder="e.g. PRC License No., IBP Roll No., or Accreditation ID"
                    maxlength="100"
                >
                <div class="field-hint">You can also provide or update your credentials anytime after registration.</div>
                @error('registration_number')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- 6. Professional Email (Left) & Contact Number (Right) --}}
            <div>
                <label class="label" for="professional_email">
                    Professional Email <span class="optional" style="color:var(--muted);font-weight:400;font-size:12px;">(optional)</span>
                </label>
                <input
                    type="email"
                    id="professional_email"
                    name="professional_email"
                    class="input @error('professional_email') has-error @enderror"
                    value="{{ old('professional_email', $information['professional_email'] ?? ($information['business_email'] ?? '')) }}"
                    placeholder="practice@example.com"
                    maxlength="255"
                    autocomplete="email"
                >
                <div class="field-hint">Direct email for your practice or clients.</div>
                @error('professional_email')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="label" for="contact_number">
                    Practice Contact Number <span class="optional" style="color:var(--muted);font-weight:400;font-size:12px;">(optional)</span>
                </label>
                <input
                    type="text"
                    id="contact_number"
                    name="contact_number"
                    class="input @error('contact_number') has-error @enderror"
                    value="{{ old('contact_number', $information['contact_number'] ?? '') }}"
                    placeholder="+63 900 000 0000"
                    maxlength="50"
                    autocomplete="tel"
                >
                <div class="field-hint">Practice phone or mobile number.</div>
                @error('contact_number')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- 7. Relationship to Account --}}
            <div class="full">
                <label class="label" for="relationship">
                    Relationship to Account <span style="color:var(--red)">*</span>
                </label>
                <div class="select-wrapper">
                    <select
                        id="relationship"
                        name="relationship"
                        class="input select @error('relationship') has-error @enderror"
                        required
                    >
                        <option value="">Select your relationship</option>
                        @php
                            $relationships = [
                                'Owner / Founder',
                                'Partner / Associate',
                                'Lead Practitioner',
                                'Employee / Staff',
                                'Authorized Representative',
                                'Other',
                            ];
                        @endphp

                        @foreach($relationships as $rel)
                            <option
                                value="{{ $rel }}"
                                @selected($selectedRelationship === $rel)
                            >
                                {{ $rel }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="field-hint">Your role in relation to this professional account.</div>
                @error('relationship')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- 7B. Conditional Specify Relationship Field (When "Other" is Selected) --}}
            <div
                class="full"
                id="relationshipOtherWrapper"
                style="display: {{ $isRelationshipOther ? 'block' : 'none' }};"
            >
                <label class="label" for="relationship_other">
                    Specify Relationship to Account <span style="color:var(--red)">*</span>
                </label>
                <input
                    type="text"
                    id="relationship_other"
                    name="relationship_other"
                    class="input @error('relationship_other') has-error @enderror"
                    value="{{ $relationshipOtherVal }}"
                    placeholder="e.g. Managing Partner, Independent Consultant, Authorized Representative"
                    maxlength="150"
                    {{ $isRelationshipOther ? 'required' : '' }}
                >
                <div class="field-hint">Please specify your exact relationship or role with this account.</div>
                @error('relationship_other')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- 8. Authorization to Administer --}}
            {{-- NOTE: Country / Region is completely removed per Requirement 3 --}}
            <div class="full">
                <label class="label" for="is_authorized">
                    Are you authorized to administer this ORDO account? <span style="color:var(--red)">*</span>
                </label>
                <div class="select-wrapper">
                    <select
                        id="is_authorized"
                        name="is_authorized"
                        class="input select @error('is_authorized') has-error @enderror"
                        required
                    >
                        <option value="Yes" @selected($authVal === 'Yes' || $authVal === true || $authVal === 1 || $authVal === '1')>
                            Yes, I am authorized
                        </option>
                        <option value="No" @selected($authVal === 'No' || $authVal === false || $authVal === 0 || $authVal === '0')>
                            No
                        </option>
                    </select>
                </div>
                <div class="field-hint">Confirmation that you have authority to manage this practice account.</div>
                @error('is_authorized')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Progressive Notice Banner --}}
            <div class="full" style="margin-top: 6px; padding: 14px 16px; background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 10px; display: flex; align-items: flex-start; gap: 12px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; margin-top: 2px;">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="16" x2="12" y2="12"/>
                    <line x1="12" y1="8" x2="12.01" y2="8"/>
                </svg>
                <div style="font-size: 13px; line-height: 1.5; color: #1e40af;">
                    <strong style="color: #0f172a; display: block; margin-bottom: 2px;">Progressive practice setup</strong>
                    We only need essential practice details to set up your workspace. Tax identification (TIN), certifications, and verification documents can be completed directly from your Town Hall profile anytime.
                </div>
            </div>

        </div>

        {{-- Form Actions --}}
        <div class="flex between center" style="margin-top: 28px; display: flex; justify-content: space-between; align-items: center;">
            <a
                href="{{ route('register.account') }}"
                class="btn ghost"
                style="padding: 10px 20px; border-radius: 10px; border: 1.5px solid #cbd5e1; background: #ffffff; color: #334155; font-size: 14px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;"
            >
                &larr; Back to Account
            </a>

            <button
                type="submit"
                id="professionSubmitBtn"
                class="btn primary"
                style="padding: 11px 26px; border-radius: 10px; border: 0; background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: #ffffff; font-size: 14px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 14px rgba(37, 99, 235, 0.28); display: inline-flex; align-items: center; gap: 8px;"
            >
                <span>Continue</span>
                &rarr;
            </button>
        </div>

    </form>

    {{-- Footer --}}
    <div style="text-align: center; color: #94a3b8; font-size: 12px; margin-top: 24px;">
        Your information is securely encrypted and used only to configure your ORDO account.
    </div>

</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('professionForm');

    // 1. Profession "Other" handling
    const professionSelect = document.getElementById('profession');
    const professionOtherWrapper = document.getElementById('professionOtherWrapper');
    const professionOtherInput = document.getElementById('profession_other');

    function syncProfessionOther() {
        if (!professionSelect || !professionOtherWrapper || !professionOtherInput) return;
        const isOther = professionSelect.value === 'Other';
        professionOtherWrapper.style.display = isOther ? 'block' : 'none';
        professionOtherInput.required = isOther;
        if (isOther && !professionOtherInput.value.trim()) {
            professionOtherInput.focus();
        }
    }

    if (professionSelect) {
        professionSelect.addEventListener('change', syncProfessionOther);
        syncProfessionOther();
    }

    // 2. Relationship "Other" handling
    const relationshipSelect = document.getElementById('relationship');
    const relationshipOtherWrapper = document.getElementById('relationshipOtherWrapper');
    const relationshipOtherInput = document.getElementById('relationship_other');

    function syncRelationshipOther() {
        if (!relationshipSelect || !relationshipOtherWrapper || !relationshipOtherInput) return;
        const isOther = relationshipSelect.value === 'Other';
        relationshipOtherWrapper.style.display = isOther ? 'block' : 'none';
        relationshipOtherInput.required = isOther;
        if (isOther && !relationshipOtherInput.value.trim()) {
            relationshipOtherInput.focus();
        }
    }

    if (relationshipSelect) {
        relationshipSelect.addEventListener('change', syncRelationshipOther);
        syncRelationshipOther();
    }

    // 3. Client-side submit validation safeguard
    if (form) {
        form.addEventListener('submit', function (e) {
            let hasError = false;

            // Check profession "Other"
            if (professionSelect && professionSelect.value === 'Other') {
                if (!professionOtherInput.value.trim()) {
                    hasError = true;
                    professionOtherInput.classList.add('has-error');
                    professionOtherInput.focus();
                }
            }

            // Check relationship "Other"
            if (relationshipSelect && relationshipSelect.value === 'Other') {
                if (!relationshipOtherInput.value.trim()) {
                    hasError = true;
                    relationshipOtherInput.classList.add('has-error');
                    if (!professionOtherInput || professionSelect.value !== 'Other' || professionOtherInput.value.trim()) {
                        relationshipOtherInput.focus();
                    }
                }
            }

            if (hasError) {
                e.preventDefault();
            }
        });
    }
});
</script>
@endpush

@endsection