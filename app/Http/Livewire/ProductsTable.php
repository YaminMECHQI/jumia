<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithSearching;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsTable extends Component
{
    
    use WithFileUploads;
    use WithSearching;
    public $type,$open,$cover;
    public $products;
    //public $title,$price,$quantity,$status,$cover,$category_id; old
    public Product $product;

    protected $rules = [
        'product.title' => 'required|min:6',
        'product.price' => 'required',
        'product.quantity' => 'required',
        'product.status' => 'required',
        'cover' => 'image|max:1024',
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
        //dd($this->cover->);
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
            'cover' => $this->cover->hashName(),
            'category_id' => 1,
            ]
        );

        $this->cover->store('public');

        $this->emit('productAdded');
        
        if($this->product->id != null){
            session()->flash('message', 'Product successfully Updated');
        }else{
            session()->flash('message', 'Product successfully added');
        }
        
        $this->close();
        $this->resetForm();

    }

    public function edit($id){
        $this->product = Product::findOrFail($id);
        $this->open();
    }

    public function delete($id){
        Product::find($id)->delete();
    }

    public function render()
    {
        $this->products = Product::where('title','like','%'.$this->search.'%')->get();
        return view('livewire.products-table');
    }
}
