<?php

namespace App\Console\Commands;

use App\Mail\TaskReminderMail;
use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTaskReminders extends Command
{
    protected $signature = 'tasks:send-reminders';
    protected $description = 'Send email reminders for tasks where notify_at is due';

    public function handle(): int
    {
        $now = now();

        $tasks = Task::query()
            ->whereNotNull('notify_at')
            ->whereNull('reminded_at')
            ->where('notify_at', '<=', $now)
            ->where('status', '!=', 'done')   // ✅ skip done tasks
            ->with('user')
            ->limit(50)
            ->get();

        $sent = 0;

        foreach ($tasks as $task) {
            if (!$task->user || !$task->user->email) {
                $task->reminded_at = $now;
                $task->save();
                continue;
            }

            Mail::to($task->user->email)->send(new TaskReminderMail($task));

            $task->reminded_at = $now;
            $task->save();

            $sent++;
        }

        $this->info("Sent {$sent} reminder(s).");
        return Command::SUCCESS;
    }
}