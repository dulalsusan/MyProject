<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        $pro = Product::latest()->get();  //to get latest product
        return view('homm',['pp'=> $pro]);
    }
    public function contact(){
        return view('contact');
    }

}
