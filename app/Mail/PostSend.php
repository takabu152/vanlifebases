<?php

// php artisan make:mail PostSendをターミナルで叩く

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User; // 追記

class PostSend extends Mailable
{
    use Queueable, SerializesModels;

    //クラスが持つ変数=プロパティを定義
    public $user;
    public $book;

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
        // dd($book);
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
                'StoreName' => $this->storename
            ])
            ->subject('Vanlifebases 予約申込')
            ->view('emails.bookingrequestmail');
    }
}
