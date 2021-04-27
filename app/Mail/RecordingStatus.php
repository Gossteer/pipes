<?php

namespace App\Mail;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecordingStatus extends Mailable
{
    use Queueable, SerializesModels;

    public string $status, $store_name, $store_description, $store_price, $date_recording;
    protected $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $status, string $email, Store $store, string $date_recording)
    {
        switch ($status) {
            case -1:
                $this->status = "отклонена";
                break;
            case 0:
                $this->status = "в ожидании";
                break;
            case 1:
                $this->status = "выполняется";
                break;
            case 2:
                $this->status = "выполнена";
                break;

            default:
                # code...
                break;
        }
        $this->store_name = $store->name;
        $this->store_description = $store->description;
        $this->store_price = $store->price;
        $this->date_recording = date('d.m.Y', strtotime($date_recording));
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Изменение статуса заявки')
            ->view('emails.feedback-form');
    }
}
