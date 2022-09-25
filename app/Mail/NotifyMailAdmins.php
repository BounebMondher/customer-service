<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMailAdmins extends Mailable
{
    use Queueable, SerializesModels;

    private $adminName;
    private $threadTitle;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adminName, $threadTitle)
    {
        $this->adminName = $adminName;
        $this->threadTitle = $threadTitle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.admins')->with(['adminName' => $this->adminName, 'threadTitle' => $this->threadTitle]);
    }
}
