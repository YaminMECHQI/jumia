<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsTable extends Component
{
    public $type,$open;
    public $products;
    public $title,$price,$quantity,$status,$cover,$category_id;

    public function mount(){
        $this->category_id=1;
        $this->open=false;
        $this->products = Product::all();
    }

    public function open(){
        $this->open=true;
    }

    public function save(){
        
    }

    public function edit($id){

    }

    public function render()
    {
        return view('livewire.products-table');
    }
}
