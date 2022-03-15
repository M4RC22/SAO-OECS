<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notificationforwardSaoEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $formType;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formType)
    {
        $this -> formType = $formType;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.forwardSaoNotif')
                    ->subject('Form Forwaded')
                    ->from('lmbinotapa@student.apc.edu.ph');
    }
}
