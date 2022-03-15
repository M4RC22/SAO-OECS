<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notificationRolesMemberOnlyEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $emailData;
    public $orgName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailData, $orgName)
    {
        $this -> emailData= $emailData;
        $this -> orgName= $orgName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.rolesMemberOnlyNotif')
                    ->subject('Added in the Student Organization')
                    ->from('lmbinotapa@student.apc.edu.ph');
    }
}
