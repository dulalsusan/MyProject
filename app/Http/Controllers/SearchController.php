<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    // public function search(){
    //     $product = Product::latest();
    //     if( request('search') !== ''){
    //         $product->where('product_name','like','%'.request('search').'%')
    //             ->orWhere('product_desc','like','%'.request('search').'%');
    //     }
    //     $product = $product->get();
    //     $category = Category::all();
    //     return view('search',['product'=>$product,'cat'=>$category]);

    // }



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
       
        // return view('home',['pp'=>$product,'category'=>$category]);    exsting page mai pathako
        return view('search',['product'=>$product,'category'=>$category]);     // new page banayera pathako


    }
}

// respective sql command for above's  'SEARCH' function
// SELECT * FROM products Where product_name like '%mobile%' or product_desc like '%mobile%'
