<?php

namespace App\Http\Livewire;

use App\Mail\RecordingStatus;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class RecordingsAdmin extends Component
{
    public $recordings;

    public function render()
    {
        return view('livewire.recordings-admin');
    }

    public function nextStep(int $recording_id)
    {
        $recording = $this->recordings->find($recording_id);

        if ( $recording->status === 2) {
            session()->flash('message', 'Дальше только в рай');

            return;
        }

        $recording->status += 1;
        $recording->save();

        Mail::to($recording->user->email)
        // ->cc(env('MAIL_FROM_ADDRESS'))
        ->send(new RecordingStatus($recording->status, $recording->user->email, $recording->store, $recording->date_recording));
    }

    public function backStep(int $recording_id)
    {
        $recording = $this->recordings->find($recording_id);

        if ( $recording->status === -1) {
            session()->flash('message', 'За нами Москва, отступать некуда');

            return;
        }

        $recording->status -= 1;
        $recording->save();

        Mail::to($recording->user->email)
        // ->cc(env('MAIL_FROM_ADDRESS'))
        ->send(new RecordingStatus($recording->status, $recording->user->email, $recording->store, $recording->date_recording));
    }
}
