@extends('layouts.registration')

@section('title', 'Your personal account — ORDO')

@section('content')
<div class="auth-panel wide" id="personalPanel">
    <div class="kicker">CREATE YOUR ORDO ACCOUNT</div>
    <h2>Your personal account</h2>
    <p>Tell us about your personal ORDO account for records, compliance, or individual affairs.</p>

    <div class="step-label">
        <span>Step 3 of 7 &mdash; Personal Details</span>
        <span style="color: var(--blue);">43%</span>
    </div>
    <div class="wizard-top">
        <span class="wizard-step on" aria-label="Step 1 complete"></span>
        <span class="wizard-step on" aria-label="Step 2 complete"></span>
        <span class="wizard-step on" aria-label="Step 3 active"></span>
        <span class="wizard-step" aria-label="Step 4"></span>
        <span class="wizard-step" aria-label="Step 5"></span>
        <span class="wizard-step" aria-label="Step 6"></span>
        <span class="wizard-step" aria-label="Step 7"></span>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="status">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error" role="alert">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <ul style="margin:0;padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Account Category Summary Badge --}}
    <div class="account-badge">
        <div class="account-badge-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
        </div>
        <div>
            <div class="account-badge-title">Personal account</div>
            <div class="account-badge-description">For your own records, personal affairs, and professional matters.</div>
        </div>
    </div>

    <form method="POST" action="{{ route('personal.update') }}" id="personalForm" novalidate>
        @csrf

        <div class="form-grid">
            {{-- Account Name (Readonly from Profile) --}}
            <div class="full">
                <label class="label" for="account_name">Account name <span style="color:var(--red)">*</span></label>
                <input
                    type="text"
                    id="account_name"
                    name="account_name"
                    class="input @error('account_name') has-error @enderror"
                    value="{{ $defaultAccountName }}"
                    readonly
                    tabindex="-1"
                    style="background-color: #f8fafc; color: #334155; cursor: not-allowed; border-color: #cbd5e1; user-select: none;"
                    aria-readonly="true"
                    required
                >
                <div class="field-hint">Automatically set from your registered identity.</div>
                @error('account_name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Purpose Multi-Select --}}
            @php
                $rawPurpose = old('purpose', $information['purpose'] ?? '');
                $selectedPurposes = is_array($rawPurpose) ? $rawPurpose : (is_string($rawPurpose) && !empty($rawPurpose) ? array_map('trim', explode(';', $rawPurpose)) : []);
                $hasOther = in_array('Other', $selectedPurposes) || collect($selectedPurposes)->contains(fn($p) => str_starts_with($p, 'Other:'));
                $otherVal = old('purpose_other', $information['purpose_other'] ?? '');
                if (!$otherVal && $hasOther) {
                    $foundOther = collect($selectedPurposes)->first(fn($p) => str_starts_with($p, 'Other:'));
                    if ($foundOther) {
                        $otherVal = trim(substr($foundOther, 6));
                    }
                }
            @endphp

            <div class="full">
                <label class="label" for="purposeDropdownBtn">Purpose of this account</label>
                <div class="purpose-dropdown-container" style="position: relative;">
                    <button
                        type="button"
                        id="purposeDropdownBtn"
                        class="select"
                        style="width: 100%; text-align: left; display: flex; align-items: center; justify-content: space-between; cursor: pointer; background: #ffffff;"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <span id="purposeDisplayText" style="color: {{ !empty($selectedPurposes) ? '#0f172a' : '#94a3b8' }}; font-size: 14px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            {{ !empty($selectedPurposes) ? implode(', ', array_filter($selectedPurposes, fn($p) => !str_starts_with($p, 'Other:') && $p !== 'all' && $p !== 'Other')) ?: 'Selected purpose' : 'Select a purpose' }}
                        </span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0; margin-left: 8px; color: #64748b;">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>

                    <div
                        id="purposeDropdownMenu"
                        style="display: none; position: absolute; top: calc(100% + 4px); left: 0; right: 0; background: #ffffff; border: 1.5px solid #e2e8f0; border-radius: var(--radius-sm); box-shadow: var(--shadow); z-index: 50; padding: 6px 0;"
                    >
                        <label style="display: flex; align-items: center; gap: 10px; padding: 8px 14px; cursor: pointer; font-size: 13px; color: var(--ink); transition: background 0.15s ease;">
                            <input type="checkbox" id="purposeAll" style="width: 16px; height: 16px; accent-color: var(--blue); cursor: pointer;">
                            <span style="font-weight: 700;">All of the above</span>
                        </label>

                        <div style="height: 1px; background: #f1f5f9; margin: 4px 0;"></div>

                        <label style="display: flex; align-items: center; gap: 10px; padding: 8px 14px; cursor: pointer; font-size: 13px; color: #334155; transition: background 0.15s ease;">
                            <input type="checkbox" name="purpose[]" value="Personal records" class="purpose-item" {{ in_array('Personal records', $selectedPurposes) ? 'checked' : '' }} style="width: 16px; height: 16px; accent-color: var(--blue); cursor: pointer;">
                            <span>Personal records</span>
                        </label>

                        <label style="display: flex; align-items: center; gap: 10px; padding: 8px 14px; cursor: pointer; font-size: 13px; color: #334155; transition: background 0.15s ease;">
                            <input type="checkbox" name="purpose[]" value="Compliance" class="purpose-item" {{ in_array('Compliance', $selectedPurposes) ? 'checked' : '' }} style="width: 16px; height: 16px; accent-color: var(--blue); cursor: pointer;">
                            <span>Compliance</span>
                        </label>

                        <label style="display: flex; align-items: center; gap: 10px; padding: 8px 14px; cursor: pointer; font-size: 13px; color: #334155; transition: background 0.15s ease;">
                            <input type="checkbox" name="purpose[]" value="Professional matters" class="purpose-item" {{ in_array('Professional matters', $selectedPurposes) ? 'checked' : '' }} style="width: 16px; height: 16px; accent-color: var(--blue); cursor: pointer;">
                            <span>Professional matters</span>
                        </label>

                        <label style="display: flex; align-items: center; gap: 10px; padding: 8px 14px; cursor: pointer; font-size: 13px; color: #334155; transition: background 0.15s ease;">
                            <input type="checkbox" name="purpose[]" value="Other" id="purposeOtherCheck" class="purpose-item" {{ $hasOther ? 'checked' : '' }} style="width: 16px; height: 16px; accent-color: var(--blue); cursor: pointer;">
                            <span>Other</span>
                        </label>
                    </div>
                </div>

                {{-- "Other" dynamic specification --}}
                <div id="otherPurposeWrapper" style="display: {{ $hasOther ? 'block' : 'none' }}; margin-top: 10px;">
                    <label class="label" for="purpose_other" style="font-size: 12px; font-weight: 600; color: #475569;">
                        Please specify other purpose details:
                    </label>
                    <input
                        type="text"
                        id="purpose_other"
                        name="purpose_other"
                        class="input"
                        value="{{ $otherVal }}"
                        placeholder="Describe your specific purpose (e.g. Estate management, Family office)"
                    >
                </div>
                @error('purpose')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Guidance Box --}}
        <div style="margin-top: 24px; padding: 14px 16px; background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: var(--radius-sm); display: flex; align-items: flex-start; gap: 12px;">
            <div style="color: var(--blue); margin-top: 1px; flex-shrink: 0;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
            </div>
            <div style="font-size: 12.5px; color: var(--muted); line-height: 1.5;">
                <strong style="color: var(--ink); display: block; margin-bottom: 2px;">Setting up your personal workspace</strong>
                Your personal account is reserved for your individual records and matters. You can always create or join a business practice later from Town Hall.
            </div>
        </div>

        {{-- Actions --}}
        <div class="form-actions">
            <a href="{{ route('register.account') }}" class="btn secondary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
                <span>Back</span>
            </a>
            <button type="submit" class="btn primary">
                <span>Continue</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const dropdownBtn = document.getElementById('purposeDropdownBtn');
    const dropdownMenu = document.getElementById('purposeDropdownMenu');
    const displayText = document.getElementById('purposeDisplayText');
    const allCheckbox = document.getElementById('purposeAll');
    const otherCheckbox = document.getElementById('purposeOtherCheck');
    const otherWrapper = document.getElementById('otherPurposeWrapper');
    const otherInput = document.getElementById('purpose_other');
    const itemCheckboxes = Array.from(document.querySelectorAll('.purpose-item'));
    const standardItems = itemCheckboxes.filter(cb => cb.value !== 'Other');

    if (!dropdownBtn || !dropdownMenu) return;

    dropdownBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        const isOpen = dropdownMenu.style.display === 'block';
        dropdownMenu.style.display = isOpen ? 'none' : 'block';
        dropdownBtn.setAttribute('aria-expanded', !isOpen);
    });

    document.addEventListener('click', function (e) {
        if (!dropdownMenu.contains(e.target) && !dropdownBtn.contains(e.target)) {
            dropdownMenu.style.display = 'none';
            dropdownBtn.setAttribute('aria-expanded', 'false');
        }
    });

    function syncState() {
        const checkedItems = itemCheckboxes.filter(cb => cb.checked);
        const standardChecked = standardItems.filter(cb => cb.checked);

        if (standardChecked.length === standardItems.length && standardItems.length > 0) {
            allCheckbox.checked = true;
        } else {
            allCheckbox.checked = false;
        }

        if (otherCheckbox && otherCheckbox.checked) {
            otherWrapper.style.display = 'block';
        } else {
            otherWrapper.style.display = 'none';
        }

        const labels = [];
        standardChecked.forEach(cb => labels.push(cb.value));
        if (otherCheckbox && otherCheckbox.checked) {
            labels.push('Other');
        }

        if (labels.length > 0) {
            displayText.textContent = labels.join(', ');
            displayText.style.color = '#0f172a';
        } else {
            displayText.textContent = 'Select a purpose';
            displayText.style.color = '#94a3b8';
        }
    }

    allCheckbox.addEventListener('change', function () {
        const isChecked = this.checked;
        standardItems.forEach(cb => {
            cb.checked = isChecked;
        });
        syncState();
    });

    itemCheckboxes.forEach(cb => {
        cb.addEventListener('change', function () {
            syncState();
            if (this === otherCheckbox && this.checked && otherInput) {
                setTimeout(() => otherInput.focus(), 50);
            }
        });
    });

    syncState();
});
</script>
@endpush
@endsection
