<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $user, $l_user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $l_user)
    {
        $this->user = $user;
        $this->l_user = $l_user;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendNoti');
    }
}
