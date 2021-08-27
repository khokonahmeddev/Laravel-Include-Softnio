<?php

namespace App\Modules\Softnio\Mail\User;

use App\Modules\Softnio\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): PasswordResetMail
    {
        return $this->view('App\Modules\Softnio::mail.password_reset')
            ->subject('User Verify Link')
            ->with(['user' => $this->user]);
    }
}
