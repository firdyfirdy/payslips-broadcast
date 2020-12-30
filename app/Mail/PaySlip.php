<?php

namespace App\Mail;

use App\Models\PaySlip as ModelsPaySlip;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaySlip extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The pay slip instance.
     *
     * @var \App\Models\PaySlip
     */
    public $pay_slip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModelsPaySlip $pay_slip)
    {
        $this->pay_slip = $pay_slip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.slip');
    }
}
