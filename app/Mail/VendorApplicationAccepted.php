<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorApplicationAccepted extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $r_pass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,$r_pass)
    {
        $this->user = $user;
        $this->r_pass = $r_pass;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->user->email)
            ->subject('Vendor Request Accepted')
            ->markdown('email.vendor_request_accepted');
    }
}
