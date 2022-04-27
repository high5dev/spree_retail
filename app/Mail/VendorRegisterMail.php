<?php

namespace App\Mail;

use App\Models\VendorRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VendorRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $vendor;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(VendorRequest $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->vendor->contact_email)
            ->subject('Registered Successfully')
            ->markdown('email.vendor_register');

    }
}
