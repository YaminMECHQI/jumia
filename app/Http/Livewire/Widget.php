<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Widget extends Component
{
    public $total;

    protected $listeners = ['productAdded' => 'updateTotal'];

    public function mount(){
        $this->total = Product::count();
    }

    public function updateTotal(){
        $this->total = Product::count();
    }

    public function render()
    {
        return view('livewire.widget');
    }
}
