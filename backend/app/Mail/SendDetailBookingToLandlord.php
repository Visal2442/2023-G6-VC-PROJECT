<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendDetailBookingToLandlord extends Mailable
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
        
        return $this->from($this->detail['email'],$this->detail['firstName'])
        ->subject('Send detail of house and room')
        ->view('emails.send_detail_to_landlord')->with($this->detail);

    }
}