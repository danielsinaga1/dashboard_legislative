<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NonConformityRejectedAdministrator extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $nonConformity, $username;
    public function __construct($nonConformity, $username)
    {
        $this->nonConformity = $nonConformity;
        $this->username = $username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.rejected-administrator')->with([
            'username' => $this->username,
            'reportNumber' => $this->nonConformity->no_laporan,
            'idReport' => $this->nonConformity->id,
        ]);
    }
}
