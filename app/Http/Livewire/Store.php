<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Store extends Component
{
    public $stores;

    public function render()
    {
        return view('livewire.store');
    }
}
