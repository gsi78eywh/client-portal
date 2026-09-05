<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Town Hall | ORDO</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f7f7f9;
            color: #222;
        }

        .header {
            background: #ffffff;
            border-bottom: 1px solid #e5e5e5;
            padding: 22px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .account {
            text-align: right;
        }

        .account-name {
            font-weight: 600;
        }

        .account-type {
            font-size: 13px;
            color: #777;
            text-transform: uppercase;
            margin-top: 4px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 30px;
        }

        .welcome {
            margin-bottom: 35px;
        }

        .welcome h1 {
            margin: 0 0 10px;
            font-size: 34px;
        }

        .welcome p {
            margin: 0;
            color: #666;
            font-size: 16px;
        }

        .account-card {
            background: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 14px;
            padding: 28px;
            margin-bottom: 30px;
        }

        .account-card h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .account-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-label {
            font-size: 12px;
            color: #888;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
        }

        .modules {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .module {
            display: block;
            background: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 14px;
            padding: 24px;
            text-decoration: none;
            color: #222;
            transition: 0.2s;
        }

        .module:hover {
            border-color: #999;
            transform: translateY(-2px);
        }

        .module h3 {
            margin: 0 0 8px;
        }

        .module p {
            margin: 0;
            color: #777;
            font-size: 14px;
            line-height: 1.5;
        }

        .logout {
            margin-top: 35px;
        }

        .logout button {
            border: 0;
            background: #222;
            color: #fff;
            padding: 11px 18px;
            border-radius: 8px;
            cursor: pointer;
        }

        @media (max-width: 800px) {
            .modules {
                grid-template-columns: 1fr;
            }

            .account-info {
                grid-template-columns: 1fr;
            }

            .header {
                padding: 18px 20px;
            }

            .container {
                padding: 35px 20px;
            }
        }
    </style>
</head>

<body>

<header class="header">

    <div class="brand">
        ORDO
    </div>

    <div class="account">
        <div class="account-name">
            {{ $user->name }}
        </div>

        <div class="account-type">
            Business Account
        </div>
    </div>

</header>


<main class="container">

    <section class="welcome">

        <h1>
            Town Hall
        </h1>

        <p>
            Good afternoon, {{ $user->name }}.
            Here is what needs your attention across your professional practice.
        </p>

    </section>


    <section class="account-card">

        <h2>
            Account
        </h2>

        <div class="account-info">

            <div>
                <div class="info-label">
                    Account Type
                </div>

                <div class="info-value">
                    Business
                </div>
            </div>

            <div>
                <div class="info-label">
                    Organization
                </div>

                <div class="info-value">
                    John Kelly & Company
                </div>
            </div>

            <div>
                <div class="info-label">
                    Email
                </div>

                <div class="info-value">
                    {{ $user->email }}
                </div>
            </div>

            <div>
                <div class="info-label">
                    Account Status
                </div>

                <div class="info-value">
                    Active
                </div>
            </div>

        </div>

    </section>


    <section class="modules">

        <a href="{{ route('entity-governance') }}" class="module">
            <h3>Entity & Governance</h3>
            <p>
                Manage organizational structure, governance and entity information.
            </p>
        </a>

        <a href="{{ route('compliance') }}" class="module">
            <h3>Compliance</h3>
            <p>
                Review compliance requirements and important obligations.
            </p>
        </a>

        <a href="{{ route('finance') }}" class="module">
            <h3>Finance</h3>
            <p>
                View financial information and related activities.
            </p>
        </a>

        <a href="{{ route('human-capital') }}" class="module">
            <h3>Human Capital</h3>
            <p>
                Manage people-related information and organizational resources.
            </p>
        </a>

        <a href="{{ route('records') }}" class="module">
            <h3>Records</h3>
            <p>
                Access and manage your organization's records.
            </p>
        </a>

        <a href="{{ route('transmittals') }}" class="module">
            <h3>Transmittals</h3>
            <p>
                Track documents and transmittals.
            </p>
        </a>

        <a href="{{ route('jkc.activity-reports') }}" class="module">
            <h3>Activity Reports</h3>
            <p>
                Review recent activity and reports.
            </p>
        </a>

        <a href="{{ route('jkc.support') }}" class="module">
            <h3>Support</h3>
            <p>
                Get assistance and contact support.
            </p>
        </a>

        <a href="{{ route('settings.account-profile') }}" class="module">
            <h3>Account Profile</h3>
            <p>
                View and manage your account profile.
            </p>
        </a>

    </section>


    <div class="logout">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button type="submit">
                Log out
            </button>

        </form>

    </div>

</main>

</body>
</html>