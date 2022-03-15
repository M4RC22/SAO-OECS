<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notificationForwardFormEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $formType;
    public $orgName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formType, $orgName)
    {
        $this -> formType = $formType;
        $this -> orgName = $orgName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.submittedForwardFormNotif')
                    ->subject('Approval Pending')
                    ->from('lmbinotapa@student.apc.edu.ph');
    }
}
