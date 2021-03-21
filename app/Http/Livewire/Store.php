<?php

namespace App\Http\Livewire;

use App\Models\Recording;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Store extends Component
{
    public $stores, $recording_dates;
    public $updateMode = false;
    public $date_recording, $comment_customer, $store_id, $user_id;

    public function render()
    {
        return view('livewire.store');
    }

    public function mount()
    {
        $this->user_id = Auth::user()->id ?? null;
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $this->store_id = $id;
    }

    public function close()
    {
        $this->updateMode = false;
        $this->store_id = null;
        $this->comment_customer = null;
        $this->date_recording = null;
    }

    public function recording()
    {
        $this->date_recording = date('Y-m-d', strtotime($this->date_recording));
        if ( in_array($this->date_recording, $this->recording_dates)) {
            $this->date_recording = null;
        }
        $validatedDate = $this->validate([
            'date_recording' => 'required|date',
            'store_id' => 'required|exists:stores,id',
            'comment_customer' => 'nullable|string',
            'user_id' => 'required|exists:users,id'
        ]);

        Recording::create($validatedDate);

        $this->updateMode = false;
        $this->store_id = null;
        $this->comment_customer = null;
        $this->date_recording = null;
    }
}
