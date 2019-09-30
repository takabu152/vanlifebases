<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AffiliateRequest extends Mailable
{
    use Queueable, SerializesModels;

    //クラスが持つ変数=プロパティを定義
    public $name;
    public $email;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('connect@vanlifebases.com')
            ->with([
                'Name' => $this->name,
                'Email' => $this->email,
                'Message' => $this->message,
            ])
            ->subject('VanlifeBasesホスティング資料請求')
            ->view('emails.affiliaterequest');
    }
}
