<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notificationDeniedFormEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $formType;
    public $feedback;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formType, $feedback)
    {
        $this -> formType = $formType;
        $this -> feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.deniedFormNotif')
                    ->subject('Forms Denied')
                    ->from('lmbinotapa@student.apc.edu.ph');
    }
}
