<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\http\Requests\StoreProductRequest;
use App\Models\Product;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $category = Category::latest()->get();
        return view('admin.category.category',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $category = Category::all();
        return view('admin.category.create',['categories'=>$category]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name'=> 'required|unique:categories|max:100',
            'slug'=> 'required|unique:categories',
            'category_desc'=> 'required',

        ],
        [
             'max' => ' This is tooo max',
             'required' => ' :attribute is must required',
             'category_desc.required'=>'Category description pani rakhnu hola!!!',

        ]);
 
        // $slug = strtolower( str_replace(' ','-',$request->input('category_name')));
        // $categories = Category::whereSlug($slug)->get();
        // if( $categories->count() > 0){
        //     return redirect()->back()->withErrors(['Slug must be unique']);
        // }

        $category = new Category;
        $category->category_name =$request->input('category_name');
        $category->category_desc =$request->input('category_desc');
        // $category->slug =  $slug;
        $category->slug =$request->input('slug');
        $category->parent_id = $request->input('parent_id');
        if($category->save()){
               return redirect()->route('category_list');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $cat)
    {
        return view('admin/category/edit',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
          $category->category_name = $request->input('category_name');
          $category->category_desc = $request->input('category_desc');
        //   $category->slug =$request->input('slug');
          if($category->save()){
              return redirect()->route('category_list');
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
    public function destroy(Category $category)
    {
        $$category->delete();
        return redirect('/admin/categories');   //url use garera return garda
        // return redirect()->route('category_list'); //Route use garera return garda
    }
}
