<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class SearchController extends Controller
{
    public function search(){
        $product = Product::latest();
        $category = Category::latest();
        if( request('search') !== ''){
            $product->where('product_name','like','%'.request('search').'%')
                ->orWhere('product_desc','like','%'.request('search').'%');
        }
        if( request('search') !== ''){
            $category->where('category_name','like','%'.request('search').'%')
                ->orWhere('category_desc','like','%'.request('search').'%');
        }
        
        $product = $product->get();
        $category = $category->get();
      
       
        return view('seller.dashboard.search',['product'=> $product,'category'=>$category]);

    }
}
