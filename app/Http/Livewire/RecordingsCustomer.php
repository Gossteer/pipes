<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecordingsCustomer extends Component
{
    public $recordings;
    public $name, $description, $category_id, $price;
    public $addHidden = true, $text_button, $method_store;

    public function render()
    {
        return view('livewire.recordings-customer');
    }
}
