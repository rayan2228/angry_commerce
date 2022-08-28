<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientMessage extends Mailable
{
    use Queueable, SerializesModels;

    protected $name, $email, $message;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($name, $email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.client_message', [
            "name" => $this->name,
            "email" => $this->email,
            "subject" => $this->subject,
            "message" => $this->message,
        ]);
    }
}
