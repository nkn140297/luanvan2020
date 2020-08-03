<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }
    public function __construct($data)
     {
    
         $this->data = $data;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->view('view.name');
    // }
    public function build()
     {
         return $this->from('thanhnha22081998@gmail.com')->subject('Chào mừng bạn đến với công ty')->view('quanlynhansu.SendMail')->with('data', $this->data);
     }
}
