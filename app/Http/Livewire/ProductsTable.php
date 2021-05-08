<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductsTable extends Component
{

    public $type;
    public $name;

    public function mount(){
        $this->name = "Yamin MECHQI";
    }

    public function render()
    {
        return view('livewire.products-table');
    }
}
