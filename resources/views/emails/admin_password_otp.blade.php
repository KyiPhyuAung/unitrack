<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Unitrack Admin OTP</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f8f9fa; padding:24px;">
    <div style="max-width:560px; margin:0 auto; background:#ffffff; border-radius:14px; padding:24px; border:1px solid #e9ecef;">
        <h2 style="margin:0 0 12px;">🔐 Admin verification</h2>
        <p style="margin:0 0 16px; color:#555;">
            Use this code to continue resetting your admin password. This code expires in <strong>{{ $minutesValid }} minutes</strong>.
        </p>

        <div style="font-size:32px; letter-spacing:6px; font-weight:800; padding:14px 16px; background:#f1f3f5; border-radius:12px; text-align:center;">
            {{ $otp }}
        </div>

        <p style="margin:16px 0 0; color:#777; font-size:13px;">
            If you did not request this, you can ignore this email.
        </p>

        <p style="margin:18px 0 0; color:#999; font-size:12px;">
            © {{ date('Y') }} Unitrack
        </p>
    </div>
</body>
</html>
