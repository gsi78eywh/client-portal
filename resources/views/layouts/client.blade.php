<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ORDO Commercial Client Portal')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    @php
        $currentRoute = request()->route()?->getName();
        $registrationRoutes = [
            'register', 'register.profile', 'register.account', 'register.contact',
            'register.verification', 'register.security', 'confirmation',
            'profile.update', 'account.update', 'contact.update', 'verification.submit',
            'verification.resend', 'contact.verify', 'contact.resend', 'security.create',
            'confirmation.submit',
        ];
        $authRoutes = [
            'login', 'login.submit', 'settings.login', 'settings.login.submit',
            'password.request', 'password.email', 'check-email', 'password.reset',
            'account-created', 'account-created.submit',
        ];
        $isRegistrationPage = in_array($currentRoute, $registrationRoutes, true);
        $isAuthPage = in_array($currentRoute, $authRoutes, true);
        $showPortalNavigation = ! $isRegistrationPage && ! $isAuthPage;

        $businessModules = ['entity-governance', 'compliance', 'finance', 'human-capital', 'records', 'transmittals'];
        $isBusinessRoute = in_array($currentRoute, $businessModules, true);
        $entitlementService = app(\App\Services\EntitlementService::class);
        $currentAccount = auth()->user()?->currentAccount();
        $currentModuleStatus = $isBusinessRoute ? $entitlementService->getModuleStatus($currentRoute, $currentAccount) : null;
        $isCurrentModuleLocked = $currentModuleStatus === 'locked';
        $protoState = session('client.subscription.status', 'trial');
    @endphp

    <section id="appShell" class="ordo-portal {{ $showPortalNavigation ? '' : 'no-sidebar' }}">
        @if ($showPortalNavigation)
            @include('components.sidebar')
            @include('components.header')
        @endif

        <main class="content ordo-content {{ $showPortalNavigation ? '' : 'no-nav' }}" style="{{ $showPortalNavigation ? '' : 'margin-left:0; padding:30px 16px;' }}">
            <div class="content-inner ordo-content-inner" id="pageRoot">
                @if($isCurrentModuleLocked)
                    <div class="locked-module-banner" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); color: #fff; padding: 18px 24px; border-radius: 12px; margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; gap: 16px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                        <div style="display: flex; align-items: center; gap: 14px;">
                            <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171; display: grid; place-items: center; flex-shrink: 0;">
                                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:20px;height:20px;">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0110 0v4"></path>
                                </svg>
                            </div>
                            <div>
                                <div style="font-size: 14px; font-weight: 700; color: #fff; display: flex; align-items: center; gap: 8px;">
                                    Module Access Locked
                                    <span style="font-size: 10px; text-transform: uppercase; background: rgba(239,68,68,0.2); color: #fca5a5; padding: 2px 8px; border-radius: 999px; font-weight: 700;">Custody Protected</span>
                                </div>
                                <div style="font-size: 12px; color: #94a3b8; margin-top: 2px;">
                                    This module is not included in your current plan. All existing records remain safely stored in JK&amp;C custody. Upgrade your subscription or update your Free Plan modules to restore active management.
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; gap: 10px; flex-shrink: 0;">
                            <a href="{{ route('town-hall') }}" class="btn ghost sm" style="color: #cbd5e1; border-color: rgba(255,255,255,0.2);">Back to Town Hall</a>
                            <a href="{{ route('jkc.subscriptions') }}" class="btn primary sm">Upgrade Plan</a>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </section>

    {{-- MODAL & TOAST ROOTS --}}
    <div id="modalRoot"></div>
    <div id="toastRoot"></div>

    {{-- LOCKED MODULE MODAL --}}
    <div id="lockedModuleModal" class="modal-backdrop" style="display: none;" onclick="if(event.target===this)closeLockedModuleModal()">
        <div class="modal" style="max-width: 520px;">
            <div class="modal-head">
                <div style="display:flex;align-items:center;gap:10px;">
                    <div style="width:32px;height:32px;border-radius:8px;background:rgba(239,68,68,0.1);color:#ef4444;display:grid;place-items:center;">
                        <svg class="ico" viewBox="0 0 24 24" style="width:18px;height:18px;" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0110 0v4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 id="lockedModuleTitle" style="margin:0;font-size:16px;">Module Locked</h3>
                        <div style="font-size:11px;color:var(--ink-muted);">Subscription Required</div>
                    </div>
                </div>
                <button type="button" class="iconbtn" onclick="closeLockedModuleModal()">&times;</button>
            </div>
            <div class="modal-body" style="padding:20px;">
                <p id="lockedModuleDesc" style="color:var(--ink);font-size:13px;line-height:1.5;margin-bottom:16px;">
                    This module is currently locked under your active ORDO plan.
                </p>
                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:14px;margin-bottom:16px;">
                    <div style="font-size:12px;font-weight:700;color:#0f172a;margin-bottom:4px;">🔒 Data Custody &amp; Retention Guarantee</div>
                    <div style="font-size:11.5px;color:#64748b;line-height:1.5;">
                        Your data, filings, and history are never deleted. When access ends, your workspace enters custody-protected retention. All documents remain securely archived with John Kelly &amp; Company.
                    </div>
                </div>
                <div style="font-size:12px;color:var(--ink-muted);line-height:1.4;">
                    To re-enable this module, either select it as one of your 3 active Free Plan modules, or subscribe to an ORDO Business plan.
                </div>
            </div>
            <div class="modal-foot" style="display:flex;justify-content:space-between;align-items:center;">
                <button type="button" onclick="closeLockedModuleModal()" class="btn ghost sm">Dismiss</button>
                <div style="display:flex;gap:8px;">
                    <a href="{{ route('settings.subscription-usage') }}" class="btn secondary sm">Select Free Modules</a>
                    <a href="{{ route('jkc.subscriptions') }}" class="btn primary sm">View Subscriptions</a>
                </div>
            </div>
        </div>
    </div>

    {{-- UNIVERSAL ACTION MODAL FOR COMPATIBILITY --}}
    <div id="ordoUniversalModal" class="modal-backdrop" style="display: none;" onclick="if(event.target===this)closeOrdoModal()">
        <div class="modal">
            <div class="modal-head">
                <h3 id="ordoModalTitle">New Entry</h3>
                <button type="button" class="iconbtn" onclick="closeOrdoModal()">&times;</button>
            </div>
            <div id="ordoModalBody" class="modal-body"></div>
            <div class="modal-foot">
                <button type="button" onclick="closeOrdoModal()" class="btn ghost sm">Cancel</button>
                <button type="button" id="ordoModalSubmit" onclick="submitOrdoModal()" class="btn primary sm">Save Entry</button>
            </div>
        </div>
    </div>

    @if($showPortalNavigation)
        {{-- SYSTEM LOGIC CONTROLS (FLOATING WIDGET) --}}
        <div id="ordoLogicWidget" style="position:fixed;bottom:16px;right:16px;z-index:9999;font-family:inherit;">
            <div id="ordoLogicWidgetPanel" style="display:none;background:#0f172a;color:#f8fafc;border:1px solid rgba(255,255,255,0.15);border-radius:12px;padding:16px;width:310px;box-shadow:0 12px 30px rgba(0,0,0,0.35);backdrop-filter:blur(10px);margin-bottom:8px;">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;border-bottom:1px solid rgba(255,255,255,0.1);padding-bottom:8px;">
                    <div style="font-size:12px;font-weight:700;color:#93c5fd;display:flex;align-items:center;gap:6px;">
                        <svg class="ico" viewBox="0 0 24 24" style="width:14px;height:14px;" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                        </svg>
                        SYSTEM LOGIC CONTROLLER
                    </div>
                    <button type="button" onclick="toggleLogicWidget()" style="background:transparent;border:0;color:#94a3b8;cursor:pointer;font-size:16px;line-height:1;">&times;</button>
                </div>

                <div style="font-size:11px;color:#94a3b8;margin-bottom:8px;">Test Account Lifecycle State:</div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:6px;margin-bottom:12px;">
                    <button type="button" onclick="switchPrototypeState('trial')" class="btn sm" style="font-size:10.5px;padding:6px 8px;background:{{ $protoState === 'trial' ? '#2563eb' : 'rgba(255,255,255,0.08)' }};color:#fff;border:1px solid rgba(255,255,255,0.15);">
                        30d Trial
                    </button>
                    <button type="button" onclick="switchPrototypeState('free')" class="btn sm" style="font-size:10.5px;padding:6px 8px;background:{{ $protoState === 'free' ? '#16a34a' : 'rgba(255,255,255,0.08)' }};color:#fff;border:1px solid rgba(255,255,255,0.15);">
                        Free Plan (3 Mod)
                    </button>
                    <button type="button" onclick="switchPrototypeState('limited')" class="btn sm" style="font-size:10.5px;padding:6px 8px;background:{{ $protoState === 'limited' ? '#d97706' : 'rgba(255,255,255,0.08)' }};color:#fff;border:1px solid rgba(255,255,255,0.15);">
                        Limited Access
                    </button>
                    <button type="button" onclick="switchPrototypeState('paid')" class="btn sm" style="font-size:10.5px;padding:6px 8px;background:{{ $protoState === 'paid' ? '#059669' : 'rgba(255,255,255,0.08)' }};color:#fff;border:1px solid rgba(255,255,255,0.15);">
                        Paid / Verified
                    </button>
                </div>

                <div style="border-top:1px solid rgba(255,255,255,0.1);padding-top:10px;">
                    <div style="font-size:11px;color:#94a3b8;margin-bottom:6px;">Verification Simulation:</div>
                    <button type="button" onclick="simulateVerificationApproval()" class="btn sm" style="width:100%;font-size:11px;background:rgba(255,255,255,0.1);color:#67e8f9;border:1px solid rgba(103,232,249,0.3);display:flex;align-items:center;justify-content:center;gap:6px;">
                        <span>✓</span> Simulate Verification Approval
                    </button>
                </div>
            </div>

            <button type="button" id="ordoLogicWidgetToggle" onclick="toggleLogicWidget()" style="background:#0f172a;color:#93c5fd;border:1px solid rgba(147,197,253,0.3);border-radius:999px;padding:7px 14px;font-size:11.5px;font-weight:700;display:flex;align-items:center;gap:7px;cursor:pointer;box-shadow:0 4px 14px rgba(0,0,0,0.25);margin-left:auto;">
                <span style="display:inline-block;width:8px;height:8px;border-radius:50%;background:#38bdf8;"></span>
                <span>System Logic: <strong>{{ ucfirst($protoState) }}</strong></span>
            </button>
        </div>
    @endif

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar) {
                sidebar.classList.toggle('open');
            }
        }

        function toast(msg) {
            const root = document.getElementById('toastRoot');
            if (!root) return;
            const toastEl = document.createElement('div');
            toastEl.className = 'toast';
            toastEl.innerHTML = `
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M8 12l2.6 2.6L16.5 9"></path>
                </svg>
                <span>${msg}</span>
            `;
            root.appendChild(toastEl);
            setTimeout(() => {
                toastEl.style.opacity = '0';
                toastEl.style.transition = 'opacity .3s ease';
                setTimeout(() => toastEl.remove(), 300);
            }, 3200);
        }

        function showToast(msg, type = 'success') {
            toast(msg);
        }

        function openOrdoModal(title, fields = []) {
            const modal = document.getElementById('ordoUniversalModal');
            const titleEl = document.getElementById('ordoModalTitle');
            const bodyEl = document.getElementById('ordoModalBody');
            if (!modal) return;
            titleEl.textContent = title;
            bodyEl.innerHTML = fields.map(f => `
                <div style="margin-bottom: 12px;">
                    <label class="label">${f.label}</label>
                    ${f.type === 'textarea'
                        ? `<textarea class="textarea" rows="3" placeholder="${f.placeholder || ''}"></textarea>`
                        : f.type === 'select'
                        ? `<select class="select">${f.options.map(o => `<option>${o}</option>`).join('')}</select>`
                        : `<input type="${f.type || 'text'}" class="input" placeholder="${f.placeholder || ''}">`
                    }
                </div>
            `).join('');
            modal.style.display = 'grid';
        }

        function closeOrdoModal() {
            const modal = document.getElementById('ordoUniversalModal');
            if (modal) modal.style.display = 'none';
        }

        function submitOrdoModal() {
            closeOrdoModal();
            toast('Record created and saved to your ORDO workspace vault.');
        }

        const MODULE_NAMES = {
            'entity-governance': 'Entity & Governance',
            'compliance': 'Compliance',
            'finance': 'Finance',
            'human-capital': 'Human Capital',
            'records': 'Records',
            'transmittals': 'Transmittals'
        };

        function showLockedModule(key) {
            const title = MODULE_NAMES[key] || 'Business Module';
            const modal = document.getElementById('lockedModuleModal');
            if (!modal) return;
            const titleEl = document.getElementById('lockedModuleTitle');
            const descEl = document.getElementById('lockedModuleDesc');
            if (titleEl) titleEl.textContent = `${title} is Locked`;
            if (descEl) descEl.textContent = `Access to ${title} requires an active subscription or selection as one of your three designated Free Plan modules.`;
            modal.style.display = 'grid';
        }

        function closeLockedModuleModal() {
            const modal = document.getElementById('lockedModuleModal');
            if (modal) modal.style.display = 'none';
        }

        function toggleLogicWidget() {
            const panel = document.getElementById('ordoLogicWidgetPanel');
            if (!panel) return;
            panel.style.display = panel.style.display === 'none' ? 'block' : 'none';
        }

        function switchPrototypeState(state) {
            fetch('{{ route('portal.set-state') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ state: state })
            })
            .then(res => res.json())
            .then(data => {
                toast(`Switched account state to ${state.toUpperCase()}`);
                setTimeout(() => window.location.reload(), 350);
            })
            .catch(err => {
                window.location.reload();
            });
        }

        function simulateVerificationApproval() {
            fetch('{{ route('portal.simulate-verification') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(res => res.json())
            .then(data => {
                toast('Account verification approved! Progress updated to 100%.');
                setTimeout(() => window.location.reload(), 350);
            })
            .catch(err => {
                window.location.reload();
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.primary-button, .finance-primary-btn').forEach(btn => {
                if (!btn.closest('form') && !btn.getAttribute('onclick')) {
                    btn.addEventListener('click', () => {
                        const pageTitle = document.title.split('-')[0].split('|')[0].trim();
                        openOrdoModal(`Create New Entry in ${pageTitle}`, [
                            { label: 'Title / Reference Name *', type: 'text', placeholder: 'e.g. Annual Compliance Filing' },
                            { label: 'Category / Classification', type: 'select', options: ['Statutory Filing', 'Board Resolution', 'Financial Ledger', 'General Record', 'Transmittal'] },
                            { label: 'Effective Date', type: 'date' },
                            { label: 'Description / Notes', type: 'textarea', placeholder: 'Add relevant internal notes...' }
                        ]);
                    });
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>