<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendDetailBookingToCustomer extends Mailable
{
    use Queueable, SerializesModels;
    public $detail;
  
    public function __construct($detail)
    {
        //
        $this->detail = $detail;
    }

    public function build()
    {
        
        return $this->from($this->detail['landlordEmail'],$this->detail['landlordName'])
        ->subject('Send detail of house and room')
        ->view('emails.send_detail_to_customer')->with($this->detail);

    }
}