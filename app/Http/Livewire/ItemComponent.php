<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Item;

class ItemComponent extends Component
{
    public $data, $name, $sale_price,$update_id;
    public $updateForm = false;

    public function render()
    {
        $this->data = Item::latest()->get();
        return view('livewire.item-component');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [   
            'name' => 'required|max:255',
            'sale_price' => 'required|numeric'
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|max:255',
            'sale_price' => 'required|numeric'
        ]);

        Item::create([
            'name' => $this->name,
            'sale_price' => $this->sale_price
        ]);
         $this->name = '';
         $this->sale_price = '';
         session()->flash('status', 'Item created successfully.');

    }

    public function edit($id)
    {
        $item = Item::find($id);
        $this->update_id = $id;
        $this->name = $item->name;
        $this->sale_price = $item->sale_price;

        $this->updateForm = true;
    }

    public function update()
    {
        $this->validate([
            'update_id' => 'required|numeric',
            'name' => 'required|max:255',
            'sale_price' => 'required|numeric'
        ]);

        if ($this->id) {
            $item = Item::find($this->update_id);
            $item->update([
                'name' => $this->name,
                'sale_price' => $this->sale_price
            ]);

            $this->name = '';
            $this->sale_price = '';
            $this->updateForm = false;
            session()->flash('status', 'Item updated successfully.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $item = Item::find($id);
            $item->delete();
            $this->name = '';
            $this->sale_price = '';
            $this->updateForm = false;
            session()->flash('status', 'Item deleted successfully.');
        }
    }
}
