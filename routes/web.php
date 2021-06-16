<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/









Route::get('/', function () {
    return view('welcome');
});




Route::get('/', function () {
    $pro = Product::latest()->get();  //to get latest product
    return view('home',['pp'=> $pro]);
});


Route::get('/dashboard', function () {
    
    return view('dashboard');
   })->middleware(['auth'])->name('dashboard');

   require __DIR__.'/auth.php';






Route::get('/create_product',function(){
    Product::create([

        'product_name' => 'bike',
        'product_desc' => 'This is a bike',
        'price' => '250000'
    ]);

});


Route::get('/product-details/{id}', function ($id) {
    $pro = Product::find($id);
    return view('product-details',['pp'=> $pro]);
});

// next way of routing for details view
// Route::get('/product-details/{id}', function (Product $id) {       here {id}=$id   same nai hunu parxa   and 'Product'is a model class.
//     return view('product-details',['pp'=> $id]);
// });
    


Route::get('/categories/{category}',function(Category $category){
    $product =  Product::whereCategoryId($category->id)->get();  //product ko category call gareko
    $category = Category::get();
    return view('category',['product'=>$product,'category'=>$category]);
});
// or yesari pani garna milxa
Route::get('/categoriesproduct/{category}',function(Category $category){
    // $product =  Product::whereCategoryId($category->id)->get();
    $product = $category->products;   //category ko products call gareko

    return view('categoriesproduct',['product'=>$product,'category'=>$category]);
});






Route::get('/demo', function () {
    return view('demo');

    
});




// Now using Cotrollers instead of all doing in route

Route::get('/homm',[ProductsController::class,'index']);
Route::get('/contact',[ProductsController::class,'contact']);




Route::middleware(['auth'])->group(function(){
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    // single single middleware rakhnu pare ma. mathi ekai choti grouping garera rakheko xa
    // Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('/admin/products',[App\Http\Controllers\Admin\ProductsController::class,'index'])->name('product_list');
    Route::get('/admin/products/create',[App\Http\Controllers\Admin\ProductsController::class,'create'])->name('product_create');
    Route::post('/admin/products/store',[App\Http\Controllers\Admin\ProductsController::class,'store']);

    Route::post('/admin/products/store',[App\Http\Controllers\Admin\ProductsController::class,'store']);
    Route::get('/admin/products/edit/{product}',[App\Http\Controllers\Admin\ProductsController::class,'edit'])->name('product_edit');
    Route::Post('/admin/products/update/{product}',[App\Http\Controllers\Admin\ProductsController::class,'update'])->name('product_update');
    Route::get('/admin/products/delete/{product}',[App\Http\Controllers\Admin\ProductsController::class,'destroy'])->name('product_delete');



    // urls for categories
    Route::get('/admin/categories',[CategoriesController::class,'index'])->name('category_list');
    Route::get('/admin/categories/create',[CategoriesController::class,'create'])->name('category_create');
    Route::post('/admin/categories/store',[CategoriesController::class,'store'])->name('category_store');
    Route::get('/admin/categories/edit/{cat}',[CategoriesController::class,'edit'])->name('category_edit');
    Route::Post('/admin/categories/update/{category}',[CategoriesController::class,'update'])->name('category_update');
    Route::get('/admin/categories/delete/{category}',[CategoriesController::class,'destroy'])->name('category_delete');

});




// Routes for seller
Route::get('/seller/dashboard', [App\Http\Controllers\Seller\DashboardController::class, 'dashboard'])->name('seller_dashboard');
Route::get('/seller/index', [App\Http\Controllers\Seller\DashboardController::class, 'index'])->name('seller_index');
Route::get('/seller/products/create', [App\Http\Controllers\Seller\ProductsController::class, 'create'])->name('seller_products_create');
Route::post('/seller/products/store', [App\Http\Controllers\Seller\ProductsController::class, 'store'])->name('seller_products_store');
Route::get('/seller/products/edit/{product}',[App\Http\Controllers\Seller\ProductsController::class,'edit'])->name('seller_product_edit');
Route::Post('/seller/products/update/{product}',[App\Http\Controllers\Seller\ProductsController::class,'update'])->name('seller_product_update');
Route::get('/seller/products/delete/{product}',[App\Http\Controllers\Seller\ProductsController::class,'destroy'])->name('seller_product_delete');
Route::get('/seller/products/show/{product}',[App\Http\Controllers\Seller\ProductsController::class,'show'])->name('seller_product_show');
Route::get('/seller/search', [App\Http\Controllers\Seller\SearchController::class, 'search'])->name('seller_search');




// Routes for Search
Route::get('/search',[SearchController::class,'search'])->name('search');



Route::get('seller/categories/{category}',function(Category $category){
    $product =  Product::whereCategoryId($category->id)->get();  //product ko category call gareko
    $category = Category::get();
    return view('seller.category.category_items',['product'=>$product,'category'=>$category]);
});

// Resourceful controller for cart and order
Route::resource('order',App\Http\Controllers\OrderController::class);
Route::resource('cart',App\Http\Controllers\OrderItemController::class)->middleware('auth');



