<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMailClient extends Mailable
{
    use Queueable, SerializesModels;

    private $adminName;
    private $clientName;
    private $threadTitle;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($adminName, $clientName, $threadTitle)
    {
        $this->adminName = $adminName;
        $this->clientName = $clientName;
        $this->threadTitle = $threadTitle;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.client')->with(['adminName' => $this->adminName, 'clientName' => $this->clientName, 'threadTitle' => $this->threadTitle]);;
    }
}
