<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsTable extends Component
{
    
    public $type,$open;
    public $products;
    //public $title,$price,$quantity,$status,$cover,$category_id; old
    public Product $product;

    protected $rules = [
        'product.title' => 'required|min:6',
        'product.price' => 'required',
        'product.quantity' => 'required',
        'product.status' => 'required',
        'product.cover' => 'required',
    ];

    public function mount(){
        $this->product = new Product();
        //$this->category_id=1; old
        $this->open=false;
    }

    public function open(){
        $this->open=true;
    }

    public function close(){
        $this->open=false;
        $this->resetForm();
    }

    public function resetForm(){

        $this->product->id=null;
        $this->product->title='';
        $this->product->price='';
        $this->product->quantity='';
        $this->product->status=null;
        $this->product->cover='';
    }

    public function saveOrUpdate(){
        /*$product = new Product();

        $product->title=$this->title; //old $request->input('title');
        $product->price=$this->price;
        $product->quantity=$this->quantity;
        $product->status=$this->status;
        $product->cover=$this->cover;
        $product->category_id=$this->category_id; old*/

        $this->validate();

        Product::updateOrCreate(
            ['id' => $this->product->id],
            [
            'title' => $this->product->title,
            'price' => $this->product->price,
            'quantity' => $this->product->quantity,
            'status' => $this->product->status,
            'cover' => $this->product->cover,
            'category_id' => 1,
            ]
        );

        $this->close();
        $this->resetForm();
    }

    public function edit($id){
        $this->product = Product::findOrFail($id);
        $this->open();
    }

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products-table');
    }
}
