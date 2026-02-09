<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Unitrack Reminder</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f6f7fb; padding:24px;">
    <div style="max-width:560px; margin:0 auto; background:#ffffff; border-radius:14px; padding:22px; border:1px solid #eceff5;">
        <h2 style="margin:0 0 12px;">🔔 Task Reminder</h2>

        <p style="margin:0 0 12px; color:#444;">
            Hi {{ $task->user?->name ?? 'there' }} 👋
        </p>

        <p style="margin:0 0 16px; color:#444;">
            This is your Unitrack reminder for:
        </p>

        <div style="padding:14px 16px; background:#f2f4ff; border-radius:12px;">
            <div style="font-size:18px; font-weight:700; margin-bottom:6px;">
                ✅ {{ $task->title }}
            </div>
            @if($task->description)
                <div style="color:#555; margin-bottom:8px;">
                    📝 {{ $task->description }}
                </div>
            @endif
            <div style="color:#555;">
                📅 {{ $task->task_date }}
                @if($task->task_time)
                    • ⏰ {{ $task->task_time }}
                @endif
            </div>
        </div>

        <p style="margin:16px 0 0; color:#666; font-size:13px;">
            Open Unitrack and mark it as done ✅
        </p>

        <p style="margin:18px 0 0; color:#999; font-size:12px;">
            © {{ date('Y') }} Unitrack
        </p>
    </div>
</body>
</html>