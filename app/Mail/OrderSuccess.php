<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Orders;

class OrderSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $order, $admin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Orders $order, $admin = false)
    {
        $this->order = $order;
        $this->admin = $admin;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.success');
    }
}