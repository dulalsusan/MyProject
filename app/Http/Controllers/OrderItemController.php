<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class OrderItemController extends Controller
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
        //
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
          $order_id = session('order_id', 0);  //Check if there valid order_id in the session

        if($order_id<1){   //or,, $order_id >= 1
            // creating if there is no order_id in the session
            $order = new Order();
            $order->user_id = Auth::id();
            $order->order_status = 'cart';
            $order->sub_total = 0;
            $order->discount =  0;
            $order->shipping_price = 0;
            $order->total_price = 0;
            $order->shipping_address = ' ';
            $order->save();
            session(['order_id'=>$order->id]);
            $order_id = $order->id;
        }

        $order_item = new OrderItem();
        $order_item->order_id = $order_id;
        $order_item->product_id = $request->input('product_id');
        $product = Product::find($order_item->product_id);
        $order_item->product_price = $product->price;
        $order_item->quantity = $request->input('quantity');
        $order_item->total = $order_item->quantity *  $order_item->product_price;
        $order_item->save();
        // updating order table with total price
        $order = Order::find($order_id);
        $order->sub_total += $order_item->total;
        $order->discount =  $order->sub_total * (10/100);  //10% discount rakheko
        $order->shipping_price = 50;
        $order->total_price = $order->sub_total - ($order->discount) + $order->shipping_price;
        $order->save();
        return redirect(route('order.index'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
