<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class updateMessage extends Mailable
{
    use Queueable, SerializesModels;
    public $notification, $e_user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notification, $e_user)
    {
        $this->notification = $notification;
        $this->e_user = $e_user;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.updateNoti');
    }
}
