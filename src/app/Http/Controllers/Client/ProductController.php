<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
class ProductController extends Controller
{
    //
    public function getList(){
        $list = Product::all();
        if(!empty($list)) {
            return view('client.shop.index', compact('list'));
        }
        return view('client.shop.index');
    }
    public function getDetailProduct($id){
        $product = Product::find($id);
        return view('client.shop.detailProduct', compact('product'));
    }
    // public function addFavourite(){
    //     return view('client.shop.favourite');
    // }
    public function search(Request $request){
        $search = $request->search;
        $data = Product::where(function($query) use ($search){
            $query->where('name','like',"%$search%")->orWhere('price_sell','like',"%$search%");
        })
        ->orWhereHas('category',function($query) use ($search){
            $query->where('name','like',"%$search%")->orWhere('description','like',"%$search%");               
        })
        ->orWhereHas('brand',function($query) use ($search){
            $query->where('name','like',"%$search%")->orWhere('description','like',"%$search%");               
        })
        ->get();
        return view('client.shop.index',compact('data','search'));
    }
    public function searchCategory($name){
        $category = Category::where(function($query) use ($name){
            $query->where('name',$name);
        })
        ->get();
        return view('client.shop.index',compact('category'));
    }
}
