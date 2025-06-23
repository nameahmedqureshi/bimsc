<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;

class UserCreatedMail extends Mailable
{
    public $user;
    public $resetUrl;

    public function __construct(User $user, $resetUrl)
    {
        $this->user = $user;
        $this->resetUrl = $resetUrl;
    }

    public function build()
    {
        return $this->subject('Welcome! Set Your Password')
                    ->view('emails.user-created');
    }
}