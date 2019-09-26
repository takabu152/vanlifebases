<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User; // 追記
use App\Booking; // 追記
use App\Store; // 追記

class CancelReqMail extends Mailable
{
    use Queueable, SerializesModels;

    //クラスが持つ変数=プロパティを定義
    public $user;
    public $book;
    public $store;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $book, $storename)
    {
        $this->user = $user;
        $this->book = $book;
        $this->storename = $storename;
        // dd($storename);
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
                'UserName' => $this->user->name,
                'Checkinday' => $this->book->checkinday,
                'Checkoutday' => $this->book->checkoutday,
                'StoreName' => $this->storename,
            ])
            ->subject('Vanlifebases キャンセル申込')
            ->view('emails.cancelrequestmail');
    }
}
