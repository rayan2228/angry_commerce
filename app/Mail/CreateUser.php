<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateUser extends Mailable
{
    use Queueable, SerializesModels;

    protected $created_by, $email, $password,$role;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($created_by,$email,$password,$role)
    {
        $this->created_by = $created_by;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.create_user',[
            'created_by'=> $this->created_by,
            'email'=> $this->email,
            'password'=> $this->password,
            'role'=> $this->role,
        ]);
    }
}
