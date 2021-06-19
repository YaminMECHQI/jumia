<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProductCharts extends Component
{
    public $productsCount;

    public function mount(){
        $this->productsCount = Product::count();
    }

    public function render()
    {
        $chart = (new LarapexChart)->pieChart()
        ->setTitle('Top 3 scorers of the team.')
        ->setSubtitle('Season 2021.')
        ->addData([$this->productsCount, 50, 30])
        ->setLabels(['Products', 'Published', 'Pending']);

        return view('livewire.product-charts',compact('chart'));
    }
}
