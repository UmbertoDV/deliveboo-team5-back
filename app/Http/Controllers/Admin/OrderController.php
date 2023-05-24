<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
            $user_id = Auth::id();
            $restaurant = User::find($user_id)->restaurant;

            $restaurantId = $restaurant->id;

            $orders = Order::whereIn('id', function ($query) use ($restaurantId) {
                $query->select('order_id')
                    ->from('dish_order')
                    ->whereIn('dish_id', function ($subQuery) use ($restaurantId) {
                        $subQuery->select('id')
                            ->from('dishes')
                            ->where('restaurant_id', $restaurantId);
                    });
            })->paginate(8);
            dump($orders);
            // $orders = Order::paginate(8);
            return view('admin.orders.index', compact('orders'));
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function trash(Request $request)
    {
        $orders = Order::onlyTrashed()->paginate(8);
        $orders->appends($_GET);
        return view('admin.orders.trash', compact('orders'));
    }

    public function forceDelete(Int $id)
    {
        $id_order = Order::where('id', $id)->onlyTrashed($id)->first();
        $id_order->forceDelete();

        return to_route('admin.orders.index');
    }

    public function restore(Int $id)
    {
        $id_order = Order::where('id', $id)->onlyTrashed($id)->first();
        $id_order->restore();

        return to_route('admin.orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index');
    }
}