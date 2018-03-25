<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendInvitation extends Mailable
{
    use Queueable, SerializesModels;
    public $property;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($property)
    {
        $this->property = $property;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendInvation');
    }
}
