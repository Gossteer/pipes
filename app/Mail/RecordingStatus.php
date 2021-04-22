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

    public $phone_number, $message_form;
    protected $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $status, string $email, Store $store)
    {
        switch ($status) {
            case -1:
                $this->message_form = "Ваша заявка отклонена";
                break;
            case 0:
                $this->message_form = "Ваша заявка в ожидании";
                break;
            case 1:
                $this->message_form = "Ваша заявка выполняется";
                break;
            case 2:
                $this->message_form = "Ваша заявка выполнена";
                break;

            default:
                # code...
                break;
        }
        $this->message_form .= " Название заказа: {$store->name}; \n
        Описание: {$store->description}; \n
        Цена: {$store->price}&#8381";

        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
            ->subject('Форма обратной связи')
            ->view('emails.feedback-form');
    }
}
