@extends('layouts.client')

@section('title', 'Switch Account')

@section('header-title', 'Switch Account')

@section('content')

<div class="main-content-container" style="max-width: 1000px; padding: 10px 0;">

    <!-- PAGE HEADER SECTION -->
    <div style="margin-bottom: 24px;">
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS
        </div>

        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            Switch Account
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            Switch between the ORDO client accounts that you have access to.
        </p>
    </div>

    @if (session('status'))
        <div style="background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 12px 16px; border-radius: 8px; font-size: 13.5px; margin-bottom: 20px;">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 12px 16px; border-radius: 8px; font-size: 13.5px; margin-bottom: 20px;">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- CURRENT ACCOUNT --}}
    @php
        $currentAccountId = $currentAccountId ?? session('client.account.id', null);
        $accountsCollection = collect($accounts ?? []);
        $currentAccount = $accountsCollection->firstWhere('id', $currentAccountId) ?? $accountsCollection->first();
        $currentProfile = is_array($currentAccount) ? ($currentAccount['profile'] ?? null) : $currentAccount?->profile;
        $currentName = is_array($currentProfile) ? ($currentProfile['legal_name'] ?? $currentProfile['trade_name'] ?? session('client.account.name', 'ORDO Client Account')) : ($currentProfile?->legal_name ?? $currentProfile?->trade_name ?? session('client.account.name', 'ORDO Client Account'));
    @endphp

    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            CURRENT ACCOUNT
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Current Client Account
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            You are currently working in the following client account.
        </p>

        <div style="margin-top: 20px; padding: 20px; border: 1px solid #dbeafe; background: #f8fafc; border-radius: 10px; display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap;">
            <div style="display: flex; align-items: center; gap: 14px;">
                <div style="width: 46px; height: 46px; border-radius: 10px; background: #e2e8f0; color: #1e293b; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px;">
                    {{ strtoupper(substr($currentName, 0, 1)) }}
                </div>

                <div>
                    <div style="font-weight: 700; font-size: 15px; color: #0f172a;">
                        {{ $currentName }}
                    </div>

                    <div style="color: #64748b; font-size: 12.5px; margin-top: 2px;">
                        Account ID: {{ $currentAccount?->account_number ?? $currentAccount?->id ?? 'N/A' }} &bull; Current active account
                    </div>
                </div>
            </div>

            <span style="display: inline-block; padding: 5px 12px; border-radius: 999px; background: #dcfce7; color: #166534; font-size: 12px; font-weight: 600;">
                Active
            </span>
        </div>
    </div>

    {{-- AVAILABLE ACCOUNTS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            AVAILABLE ACCOUNTS
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Your Accounts
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Select an account below to switch your active workspace.
        </p>

        <div style="margin-top: 16px;">
            @forelse ($accounts as $acc)
                @php
                    $accProfile = $acc->profile;
                    $accName = $accProfile?->legal_name ?? $accProfile?->trade_name ?? 'ORDO Account #' . $acc->id;
                    $isCurrent = $acc->id === ($currentAccount?->id);
                @endphp
                <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                    <div style="display: flex; align-items: center; gap: 14px;">
                        <div style="width: 42px; height: 42px; border-radius: 8px; background: #f1f5f9; color: #475569; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 15px;">
                            {{ strtoupper(substr($accName, 0, 1)) }}
                        </div>

                        <div>
                            <div style="font-weight: 600; font-size: 14px; color: #0f172a;">
                                {{ $accName }}
                            </div>

                            <div style="color: #64748b; font-size: 12.5px; margin-top: 2px;">
                                {{ $accProfile?->account_type ?? 'Standard Account' }} &bull; #{{ $acc->account_number ?? $acc->id }}
                            </div>
                        </div>
                    </div>

                    @if ($isCurrent)
                        <button type="button" disabled style="border: 1px solid #e2e8f0; background: #f8fafc; color: #94a3b8; border-radius: 6px; padding: 8px 14px; font-size: 12.5px; font-weight: 600; cursor: not-allowed;">
                            Current Account
                        </button>
                    @else
                        <form method="POST" action="{{ route('settings.switch-account.post', $acc->id) }}" style="margin: 0;">
                            @csrf
                            <input type="hidden" name="account_id" value="{{ $acc->id }}">
                            <button type="submit" style="border: 1px solid #cbd5e1; background: #ffffff; color: #1e293b; border-radius: 6px; padding: 8px 14px; font-size: 12.5px; font-weight: 600; cursor: pointer; transition: all .15s ease;">
                                Switch
                            </button>
                        </form>
                    @endif
                </div>
            @empty
                <p style="color: #64748b; font-size: 13.5px; margin: 16px 0;">No other accounts available.</p>
            @endforelse
        </div>
    </div>

    {{-- INFORMATION --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; align-items: flex-start; gap: 14px;">
            <div style="width: 32px; height: 32px; border-radius: 50%; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-weight: 700; font-size: 14px;">
                i
            </div>

            <div>
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    ACCOUNT ACCESS
                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Multiple accounts
                </h2>

                <p style="font-size: 13px; color: #64748b; margin: 0; line-height: 1.5;">
                    If you are a member of multiple client accounts, they will appear here. Switching accounts changes the client workspace and the modules available to you.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection