<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sentmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     * 
     * 
     */
    /**
     * data array bain in a variable
    */
    public $name;
    public $email;
    public $cell;
    public $username;
    public $photo;
    public function __construct($data)
    {
        $this -> nae =$data['name'];
        $this -> email =$data['email'];
        $this -> cell =$data['cell'];
        $this -> username =$data['username'];
        $this -> photo =$data['photo'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mail');
    }
}
