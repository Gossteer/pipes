<?php

namespace App\Http\Livewire;

use App\Models\Store;
use Livewire\Component;

class StoreAdmin extends Component
{
    public $stores;
    public $categories;
    public $name, $description, $category_id, $price;
    public $addHidden = true, $text_button, $method_store;

    public function render()
    {
        return view('livewire.store-admin', ['stores' => $this->stores]);
    }

    public function addHidden(string $method_store = null, string $text_button = null, bool $addHidden = null)
    {
        $this->clear();
        $this->method_store = $method_store;
        $this->text_button = $text_button;
        $this->addHidden = $addHidden ?? !$this->addHidden;
    }

    public function addStore()
    {
        $store = Store::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' =>  $this->category_id
        ]);

        $this->clear();

        $this->stores->push($store);
    }

    public function deleteStore(int $id)
    {
        $this->stores->find($id)->delete();
        $this->stores = $this->stores->except([$id]);
    }

    public function getUpdate(int $id)
    {
        $store = $this->stores->find($id);

        $this->addHidden("updateStore($store->id)",'Изменить',false);

        $this->name = $store->name;
        $this->description = $store->description;
        $this->price = $store->price;
        $this->category_id = $store->category_id;


    }

    public function updateStore($id)
    {
        $this->stores->find($id)->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' =>  $this->category_id
        ]);

        $this->clear();
    }

    private function clear()
    {
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->category_id = '';
    }
}
