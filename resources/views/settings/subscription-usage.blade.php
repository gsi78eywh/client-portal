@extends('layouts.client')

@section('title', 'Subscription & Usage')

@section('header-title', 'Subscription & Usage')

@section('content')

<div class="main-content-container" style="max-width: 1000px; padding: 10px 0;">

    <!-- PAGE HEADER SECTION -->
    <div style="margin-bottom: 24px;">
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS
        </div>

        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            Subscription &amp; Usage
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            View your current ORDO plan, module access, and usage information.
        </p>
    </div>

    @php
        $entitlement = app(\App\Services\EntitlementService::class);
        $userAccount = auth()->user()?->currentAccount();
        $protoState = session('client.subscription.status', 'trial');
        $freeModules = session('client.free_modules', ['entity-governance', 'compliance', 'records']);
        $modulesList = $entitlement->getAllModules($userAccount);

        $planTitle = match($protoState) {
            'free' => 'ORDO Free Plan',
            'limited' => 'ORDO Limited Access',
            'paid' => 'ORDO Business (Commercial)',
            default => 'ORDO 30-Day Full Access',
        };
        $planSubtitle = match($protoState) {
            'free' => 'Your workspace retains access to your 3 selected Business modules. Unselected modules are in safe custody retention.',
            'limited' => 'Access is currently limited. Complete verification in Settings to unlock your full access benefits.',
            'paid' => 'All six Business modules and advanced governance features are fully enabled for your verified account.',
            default => 'Your client account currently has full access to the available ORDO modules during your 30-day trial.',
        };
        $planBadge = match($protoState) {
            'free' => 'Free Plan',
            'limited' => 'Action Required',
            'paid' => 'Active Commercial',
            default => 'Trial Active',
        };
        $planBadgeStyle = match($protoState) {
            'limited' => 'background-color:#fee2e2; color:#dc2626;',
            'free' => 'background-color:#eff6ff; color:#2563eb;',
            default => 'background-color:#dcfce7; color:#16a34a;',
        };
        $statusValue = match($protoState) {
            'limited' => 'Action Required',
            default => 'Active',
        };
        $accessValue = match($protoState) {
            'free' => '3 Modules (Free)',
            'limited' => 'Limited Custody',
            default => 'Full Access',
        };
        $billingValue = match($protoState) {
            'paid' => 'Annual Invoice',
            default => 'Not Required',
        };
    @endphp

    {{-- CURRENT PLAN --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            CURRENT PLAN
        </div>

        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; flex-wrap: wrap; margin-top: 4px;">
            <div>
                <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
                    {{ $planTitle }}
                </h2>

                <p style="font-size: 13px; color: #64748b; margin: 0;">
                    {{ $planSubtitle }}
                </p>
            </div>

            <span style="display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 999px; font-size: 12px; font-weight: 600; {{ $planBadgeStyle }}">
                {{ $planBadge }}
            </span>
        </div>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px;">
            <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #fafafa;">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                    STATUS
                </div>

                <div style="font-size: 14px; font-weight: 700; color: #0f172a; margin-top: 6px;">
                    {{ $statusValue }}
                </div>
            </div>

            <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #fafafa;">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                    ACCESS
                </div>

                <div style="font-size: 14px; font-weight: 700; color: #0f172a; margin-top: 6px;">
                    {{ $accessValue }}
                </div>
            </div>

            <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #fafafa;">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                    BILLING
                </div>

                <div style="font-size: 14px; font-weight: 700; color: #0f172a; margin-top: 6px;">
                    {{ $billingValue }}
                </div>
            </div>
        </div>
    </div>

    {{-- MODULE ACCESS & FREE TIER SELECTION --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;flex-wrap:wrap;gap:12px;">
            <div>
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    MODULE ENTITLEMENTS
                </div>
                <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
                    Free Plan Module Selection
                </h2>
                <p style="font-size: 13px; color: #64748b; margin: 0;">
                    Choose up to 3 business modules to retain on your Free Plan. Checked modules remain active; unchecked modules enter safe custody retention.
                </p>
            </div>
            <div id="freeSelectedCountBadge" style="padding: 4px 12px; border-radius: 999px; background: #eff6ff; color: #2563eb; font-size: 12px; font-weight: 700; border: 1px solid #bfdbfe;">
                <span id="selectedCountText">{{ count($freeModules) }}</span> of 3 Selected
            </div>
        </div>

        <form id="freeModuleForm" action="{{ route('portal.select-free-modules') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px;">
                @foreach($modulesList as $modKey => $modMeta)
                    @php
                        $isSelected = in_array($modKey, $freeModules, true);
                    @endphp
                    <label style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; border: 1px solid {{ $isSelected ? '#3b82f6' : '#e2e8f0' }}; border-radius: 10px; background: {{ $isSelected ? '#f8faff' : '#ffffff' }}; cursor: pointer; transition: all 0.2s;" id="moduleCard_{{ $modKey }}">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <input type="checkbox" name="modules[]" value="{{ $modKey }}" {{ $isSelected ? 'checked' : '' }} onchange="handleModuleSelect(this)" style="width: 16px; height: 16px; accent-color: #2563eb; cursor: pointer;">
                            <div>
                                <span style="font-size: 13.5px; font-weight: 600; color: #0f172a; display: block;">
                                    {{ $modMeta['name'] }}
                                </span>
                                <span style="font-size: 11px; color: #64748b;">
                                    {{ $modMeta['kpi'] }} &bull; {{ $modMeta['kpi_sub'] }}
                                </span>
                            </div>
                        </div>
                        <span id="statusTag_{{ $modKey }}" style="color: {{ $isSelected ? '#16a34a' : '#64748b' }}; font-size: 12px; font-weight: 600;">
                            {{ $isSelected ? 'Retained' : 'Locked on Free' }}
                        </span>
                    </label>
                @endforeach
            </div>

            <div style="margin-top: 18px; display: flex; justify-content: flex-end; gap: 10px; align-items: center;">
                <button type="submit" class="btn primary sm" id="saveFreeModulesBtn" style="padding: 7px 18px; font-size: 12.5px;">Save Free Modules</button>
            </div>
        </form>
    </div>

    {{-- USAGE --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            USAGE
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Current Usage
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Sample usage information for the current development environment.
        </p>

        <div style="margin-top: 20px;">
            {{-- Records Progress --}}
            <div style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 13px;">
                    <strong style="color: #0f172a; font-weight: 600;">
                        Records
                    </strong>

                    <span style="color: #64748b;">
                        248 / 1,000
                    </span>
                </div>

                <div style="height: 7px; background: #f1f5f9; border-radius: 999px; overflow: hidden;">
                    <div style="width: 25%; height: 100%; background: #2563eb; border-radius: 999px;"></div>
                </div>
            </div>

            {{-- Transmittals Progress --}}
            <div style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 13px;">
                    <strong style="color: #0f172a; font-weight: 600;">
                        Transmittals
                    </strong>

                    <span style="color: #64748b;">
                        72 / 500
                    </span>
                </div>

                <div style="height: 7px; background: #f1f5f9; border-radius: 999px; overflow: hidden;">
                    <div style="width: 14%; height: 100%; background: #2563eb; border-radius: 999px;"></div>
                </div>
            </div>

            {{-- Active Users Progress --}}
            <div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 13px;">
                    <strong style="color: #0f172a; font-weight: 600;">
                        Active Users
                    </strong>

                    <span style="color: #64748b;">
                        1 / 10
                    </span>
                </div>

                <div style="height: 7px; background: #f1f5f9; border-radius: 999px; overflow: hidden;">
                    <div style="width: 10%; height: 100%; background: #2563eb; border-radius: 999px;"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- PLAN NOTICE --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; align-items: flex-start; gap: 16px;">
            <div style="width: 32px; height: 32px; border-radius: 50%; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-weight: 700; font-size: 14px;">
                i
            </div>

            <div>
                <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.05em; text-transform: uppercase;">
                    DEVELOPMENT MODE
                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 4px 0 4px 0;">
                    Subscription and usage are sample data
                </h2>

                <p style="font-size: 13px; color: #64748b; margin: 0; line-height: 1.5;">
                    The current page is a development mockup. Authentication, subscription entitlements, usage limits, billing, and database values will be connected during the production implementation.
                </p>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function handleModuleSelect(checkbox) {
        const checked = document.querySelectorAll('input[name="modules[]"]:checked');
        if (checked.length > 3) {
            checkbox.checked = false;
            toast('You can select a maximum of 3 modules for the Free Plan.');
            return;
        }

        const countEl = document.getElementById('selectedCountText');
        if (countEl) countEl.textContent = checked.length;

        document.querySelectorAll('input[name="modules[]"]').forEach(cb => {
            const card = document.getElementById('moduleCard_' + cb.value);
            const tag = document.getElementById('statusTag_' + cb.value);
            if (!card || !tag) return;
            if (cb.checked) {
                card.style.borderColor = '#3b82f6';
                card.style.background = '#f8faff';
                tag.style.color = '#16a34a';
                tag.textContent = 'Retained';
            } else {
                card.style.borderColor = '#e2e8f0';
                card.style.background = '#ffffff';
                tag.style.color = '#64748b';
                tag.textContent = 'Locked on Free';
            }
        });
    }

    document.getElementById('freeModuleForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const checked = Array.from(document.querySelectorAll('input[name="modules[]"]:checked')).map(cb => cb.value);

        fetch('{{ route('portal.select-free-modules') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ modules: checked })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                toast('Free Plan modules updated successfully!');
                setTimeout(() => window.location.reload(), 350);
            } else if (data.error) {
                toast(data.error);
            }
        })
        .catch(err => {
            this.submit();
        });
    });
</script>
@endpush
@endsection