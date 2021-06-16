<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('seller.products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {          
        // return $request; 
         
        $validated = $request->validate([
            'product_name' => 'required|max:255',
            'product_desc' => 'required',
            'price' => 'required',
            'category_id' => 'required|integer|min:1',
            

        ],
        [
            'required' =>':attribute is required field',
            // 'required' =>'attribute is required field'
            // message customize gareko

            'product_name.required' =>'Product name is required field, Please fill it!!! Thankyou!',
            // specific message customize gareko

            'category_id.min' => 'select any category',
         


        ]);
        $product = new Product;
        $product->user_id = Auth::id();
        $product->product_name = $request->input('product_name');
        $product->product_desc =$request->input('product_desc');    
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');

        if ($request->hasFile('img')){
            //  uploading the image to images folder
              $name = $request->file('img')->getClientOriginalName();
              $request->file('img')->storeAs('public/images',$name);
            //   return storage_path('app/public/images/');
              
            // croping the image and saving it to thumbnail folder inside images folder

            // Image resizing code yedi helper batwa garnu parema
            //   $abc = Image::make(storage_path('app/public/images/'.$name));
            //   $abc ->resize(550,750);
            //   $abc -> save(storage_path('app/public/images/thumbnail/'.$name));

            //   or sidai helper ko function lai call garda pani hunxa. Mathi ko 3-line wala code ko satta ma
              image_crop($name);
            //   image_crop($name,550,750);
              $product->image=$name;
            
                
        }     


       if( $product->save()){
           return redirect()->route('seller_index');
       }else{
           return redirect()->back();
       }
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
       
        return view('seller.products.show',['pp'=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('seller.products.edit',compact(['product','category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->product_name = $request->input('product_name');
        $product->product_desc =$request->input('product_desc');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
       if( $product->save()){
           return redirect()->route('product_list');
       }else{
           return redirect()->back();
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('seller_index');
    }
}
