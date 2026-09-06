<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'ORDO Client Portal')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

</head>


<body>

    {{-- =========================================================
         DETERMINE WHETHER SIDEBAR SHOULD BE SHOWN
         =========================================================
         
         Registration pages should NOT show:
         - Town Hall
         - Entity Governance
         - Compliance
         - Finance
         - Human Capital
         - Records
         - Transmittals
         - JK&C
         - Settings
         
         Only the actual portal pages should use the sidebar.
    ========================================================== --}}

    @php

        $currentRoute = request()->route()?->getName();

        $registrationRoutes = [

            'register',
            'register.profile',
            'register.account',
            'register.contact',
            'register.verification',
            'register.security',
            'confirmation',

            'profile.update',
            'account.update',
            'contact.update',
            'verification.submit',
            'verification.resend',
            'contact.verify',
            'contact.resend',
            'security.create',
            'confirmation.submit',

        ];

        $authRoutes = [

            'login',
            'login.submit',

            'settings.login',
            'settings.login.submit',

            'password.request',
            'password.email',
            'check-email',
            'password.reset',

            'account-created',
            'account-created.submit',

        ];

        $isRegistrationPage =
            in_array($currentRoute, $registrationRoutes, true);

        $isAuthPage =
            in_array($currentRoute, $authRoutes, true);

        $showPortalNavigation =
            ! $isRegistrationPage &&
            ! $isAuthPage;

    @endphp


    <div
        class="ordo-portal {{ $showPortalNavigation ? '' : 'no-sidebar' }}"
    >

        {{-- =====================================================
             SIDEBAR
             Only shown after entering the actual portal.
        ====================================================== --}}

        @if ($showPortalNavigation)

            @include('components.sidebar')

        @endif


        {{-- =====================================================
             MAIN APPLICATION AREA
        ====================================================== --}}

        <div class="ordo-main">

            {{-- =================================================
                 HEADER
                 Only shown inside the actual portal.
            ================================================== --}}

            @if ($showPortalNavigation)

                @include('components.header', [

                    'title' => View::getSection(
                        'header-title',
                        'Town Hall'
                    )

                ])

            @endif


            {{-- =================================================
                 CONTENT
            ================================================== --}}

            <main class="ordo-content">

                <div class="ordo-content-inner">

                    @yield('content')

                </div>

            </main>

        </div>

    </div>


    {{-- =========================================================
         MOBILE SIDEBAR OVERLAY
         Only needed when sidebar exists.
    ========================================================== --}}

    @if ($showPortalNavigation)

        <div
            class="sidebar-overlay"
            id="sidebarOverlay"
            onclick="toggleSidebar()"
        ></div>

    @endif


    <script>

        function toggleSidebar() {

            const sidebar =
                document.getElementById('ordoSidebar');

            const overlay =
                document.getElementById('sidebarOverlay');

            if (!sidebar || !overlay) {
                return;
            }

            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        }

        function showToast(message, type = 'success') {
            const container = document.getElementById('ordoToastContainer');
            if (!container) return;
            const toast = document.createElement('div');
            toast.className = `px-4 py-3 rounded-xl shadow-lg border text-xs font-semibold flex items-center gap-2 pointer-events-auto transition-all transform duration-300 translate-y-2 opacity-0 ${type === 'success' ? 'bg-emerald-50 text-emerald-800 border-emerald-200' : 'bg-rose-50 text-rose-800 border-rose-200'}`;
            toast.innerHTML = `<span>✓</span> <span>${message}</span>`;
            container.appendChild(toast);
            requestAnimationFrame(() => {
                toast.classList.remove('translate-y-2', 'opacity-0');
            });
            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-2');
                setTimeout(() => toast.remove(), 300);
            }, 3500);
        }

        function openOrdoModal(title, fields = []) {
            const modal = document.getElementById('ordoUniversalModal');
            const titleEl = document.getElementById('ordoModalTitle');
            const bodyEl = document.getElementById('ordoModalBody');
            if (!modal) return;
            titleEl.textContent = title;
            bodyEl.innerHTML = fields.map(f => `
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">${f.label}</label>
                    ${f.type === 'textarea' 
                        ? `<textarea class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs" rows="3" placeholder="${f.placeholder || ''}"></textarea>`
                        : f.type === 'select'
                        ? `<select class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs">${f.options.map(o => `<option>${o}</option>`).join('')}</select>`
                        : `<input type="${f.type || 'text'}" class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs" placeholder="${f.placeholder || ''}">`
                    }
                </div>
            `).join('');
            modal.style.display = 'flex';
        }

        function closeOrdoModal() {
            const modal = document.getElementById('ordoUniversalModal');
            if (modal) modal.style.display = 'none';
        }

        function submitOrdoModal() {
            closeOrdoModal();
            showToast('Record created and saved to your ORDO workspace vault.');
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.primary-button, .finance-primary-btn, .btn-primary').forEach(btn => {
                if (!btn.closest('form') && !btn.getAttribute('onclick') && !btn.closest('#ordoUniversalModal') && !btn.closest('#inviteUserModal') && !btn.closest('#newTicketModal')) {
                    btn.addEventListener('click', () => {
                        const pageTitle = document.title.split('-')[0].split('|')[0].trim();
                        openOrdoModal(`Create New Entry in ${pageTitle}`, [
                            { label: 'Title / Reference Name *', type: 'text', placeholder: 'e.g. Annual Compliance Filing' },
                            { label: 'Category / Classification', type: 'select', options: ['Statutory Filing', 'Board Resolution', 'Financial Ledger', 'General Record', 'Transmittal'] },
                            { label: 'Effective Date', type: 'date' },
                            { label: 'Custody & Summary Notes', type: 'textarea', placeholder: 'Add relevant internal notes...' }
                        ]);
                    });
                }
            });

            document.querySelectorAll('.view-button, .table-action-btn').forEach(btn => {
                if (!btn.closest('form') && !btn.getAttribute('onclick')) {
                    btn.addEventListener('click', (e) => {
                        const row = e.target.closest('tr');
                        const title = row ? row.querySelector('td:nth-child(1), td:nth-child(2)')?.textContent?.trim() : 'Record Details';
                        openOrdoModal(`Record Details: ${title}`, [
                            { label: 'Record Identifier', type: 'text', placeholder: title },
                            { label: 'Status & Verification', type: 'text', placeholder: 'Active / Verified under ORDO Vault' },
                            { label: 'Notes', type: 'textarea', placeholder: 'View-only record from your active tenant ledger.' }
                        ]);
                    });
                }
            });
        });
    </script>

    {{-- UNIVERSAL ACTION MODAL --}}
    <div id="ordoUniversalModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs items-center justify-center p-4" style="display: none;">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-200 space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 id="ordoModalTitle" class="text-base font-bold text-slate-900">New Entry</h3>
                <button type="button" onclick="closeOrdoModal()" class="text-slate-400 hover:text-slate-600 text-xl font-bold cursor-pointer">&times;</button>
            </div>
            <div id="ordoModalBody" class="text-xs text-slate-600 space-y-3">
            </div>
            <div class="flex items-center justify-end gap-2 pt-3 border-t border-slate-100">
                <button type="button" onclick="closeOrdoModal()" class="ordo-btn ordo-btn-secondary ordo-btn-sm text-xs">Cancel</button>
                <button type="button" id="ordoModalSubmit" onclick="submitOrdoModal()" class="ordo-btn ordo-btn-primary ordo-btn-sm text-xs">Save Entry</button>
            </div>
        </div>
    </div>

    {{-- TOAST NOTIFICATION CONTAINER --}}
    <div id="ordoToastContainer" class="fixed bottom-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

    @stack('scripts')

</body>

</html>