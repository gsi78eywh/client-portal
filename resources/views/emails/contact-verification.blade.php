<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify your ORDO email address</title>
</head>
<body style="margin:0; padding:0; background-color:#f8fafc; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color:#1e293b;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;">
        <tr>
            <td align="center" style="padding: 40px 16px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 520px; background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
                    <!-- BRAND HEADER -->
                    <tr>
                        <td style="background-color: #0d1b2a; padding: 28px 32px; text-align: left;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                        <div style="font-size: 22px; font-weight: 800; color: #ffffff; letter-spacing: 0.05em;">ORDO</div>
                                        <div style="font-size: 11px; color: #94a3b8; letter-spacing: 0.08em; text-transform: uppercase; margin-top: 2px;">COMMERCIAL CLIENT PORTAL</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- CONTENT BODY -->
                    <tr>
                        <td style="padding: 32px;">
                            <div style="font-size: 13px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 8px;">
                                EMAIL VERIFICATION
                            </div>

                            <h1 style="font-size: 22px; font-weight: 700; color: #0f172a; margin: 0 0 16px 0; line-height: 1.3;">
                                Verify your ORDO email address
                            </h1>

                            <p style="font-size: 14px; line-height: 1.6; color: #475569; margin: 0 0 20px 0;">
                                Hello {{ $recipientName }},
                            </p>

                            <p style="font-size: 14px; line-height: 1.6; color: #475569; margin: 0 0 24px 0;">
                                Please use the 6-digit verification code below to confirm your email address and continue your ORDO registration:
                            </p>

                            <!-- OTP BOX -->
                            <div style="background-color: #f1f5f9; border: 1px dashed #cbd5e1; border-radius: 10px; padding: 24px 20px; text-align: center; margin: 0 0 24px 0;">
                                <div style="font-size: 11px; font-weight: 600; color: #64748b; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 8px;">
                                    ONE-TIME VERIFICATION CODE
                                </div>
                                <div style="font-size: 36px; font-weight: 800; letter-spacing: 0.3em; color: #0f172a; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace; padding-left: 0.3em;">
                                    {{ $otp }}
                                </div>
                            </div>

                            <!-- EXPIRATION & SECURITY NOTICE -->
                            <div style="background-color: #fef2f2; border-left: 4px solid #ef4444; border-radius: 0 8px 8px 0; padding: 12px 16px; margin: 0 0 24px 0;">
                                <p style="font-size: 13px; line-height: 1.5; color: #991b1b; margin: 0 0 4px 0; font-weight: 600;">
                                    This code expires in 10 minutes.
                                </p>
                                <p style="font-size: 13px; line-height: 1.5; color: #b91c1c; margin: 0;">
                                    Do not share this code with anyone. ORDO will never ask for your code.
                                </p>
                            </div>

                            <p style="font-size: 12px; line-height: 1.5; color: #94a3b8; margin: 0; border-top: 1px solid #f1f5f9; padding-top: 16px;">
                                If you did not request this verification code, you can safely ignore this email or contact support.
                            </p>
                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="background-color: #f8fafc; padding: 20px 32px; border-top: 1px solid #e2e8f0; font-size: 12px; color: #64748b; text-align: left; line-height: 1.6;">
                            <strong style="color: #0f172a;">ORDO</strong><br>
                            Business. Organized.<br>
                            John Kelly &amp; Company
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
