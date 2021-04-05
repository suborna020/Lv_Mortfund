<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserPassToken extends Mailable
{
    use Queueable, SerializesModels;
    public $token,$user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token,$user)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = $this->token;
        $user = $this->user;
        return $this->view('ui.pages.users.account.mail_user_token',compact('token','user'))->subject('Token for Mortfund password change');
    }
}
