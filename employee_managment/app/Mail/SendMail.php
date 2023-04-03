<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    // public $pasword;

    public function __construct($user)
    {
        // \Log::info($pasword);
        $this->data=$user;
        // $this->data=$pasword;
    }

   
    public function build()
    {
        return $this->from('reena.technotery@gmail.com')->subject('welcome mail')->view('admin.modules.employee.viewmail')->with('data',$this->data);
    }

   
}
