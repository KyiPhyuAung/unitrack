<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminPasswordOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $otp,
        public int $minutesValid = 10
    ) {}

    public function build()
    {
        return $this->subject('Unitrack Admin Verification Code')
            ->view('emails.admin_password_otp');
    }
}
