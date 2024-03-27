<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
class ShowProduct extends Component
{

    public $list;
    public function mount(){
       $this->list = Product::all();
    }
    public function render()
    {
        // $list = Product::all();
        return view('livewire.show-product')
        ->extends('client.layouts.master');
    }
}
