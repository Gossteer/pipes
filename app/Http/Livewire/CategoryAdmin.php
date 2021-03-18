<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryAdmin extends Component
{
    public $name;
    public $categories;
    public $addHidden = true, $text_button, $method_store;

    public function render()
    {
        return view('livewire.category-admin', ['categories' => $this->categories]);
    }

    public function addHidden(string $method_store, string $text_button, bool $addHidden = null)
    {
        $this->method_store = $method_store;
        $this->text_button = $text_button;
        $this->addHidden = $addHidden ?? !$this->addHidden;
    }

    public function addStore()
    {
        $categories = Category::create([
            'name' => $this->name,
        ]);

        $this->clear();

        $this->categories->push($categories);
    }

    public function deleteStore(int $id)
    {
        $this->categories->find($id)->delete();
        $this->categories = $this->categories->except([$id]);
    }

    public function getUpdate(int $id)
    {
        $categories = $this->categories->find($id);

        $this->name = $categories->name;

        $this->addHidden("updateStore($categories->id)",'Изменить',false);
    }

    public function updateStore($id)
    {
        $this->categories->find($id)->update([
            'name' => $this->name,
        ]);

        $this->clear();
    }

    private function clear()
    {
        $this->name = '';
    }
}
