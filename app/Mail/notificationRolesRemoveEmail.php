<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notificationRolesRemoveEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $orgName;
    public $orgPos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orgName, $orgPos)
    {
        $this -> orgName= $orgName;
        $this -> orgPos= $orgPos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.rolesRemoveNotif')
                    ->subject('Removed in the Student Organization')
                    ->from('lmbinotapa@student.apc.edu.ph');
    }
}
