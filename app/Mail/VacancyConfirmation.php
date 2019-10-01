<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VacancyConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $hostbookingcheck;
    public $guest;
    public $store;
    public $bookingstatus;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($hostbookingcheck, $guest, $store, $bookingstatus)
    {
        $this->hostbookingcheck = $hostbookingcheck;
        $this->guest = $guest;
        $this->store = $store;
        $this->bookingstatus = $bookingstatus;
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
                'BookingId' => $this->hostbookingcheck->id,
                'Checkinday' => $this->hostbookingcheck->checkinday,
                'Checkoutday' => $this->hostbookingcheck->checkoutday,
                'GuestName' => $this->guest->name,
                'StoreName' => $this->store->storename,
                'BookingStatus' => $this->bookingstatus
            ])
            ->subject('Vanlifebases 施設空き状況の確認')
            ->view('emails.vacancyconfirmation');
    }
}
