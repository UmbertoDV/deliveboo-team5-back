<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Type;
use App\Models\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = $request->input('cart');
        // Esegui le operazioni desiderate con i dati ricevuti

        $order = new Order;
        // $restaurant = Restaurant::where('id',  $cart['cart'][0]['restaurant_id'])->first();
        return response()->json([$cart], 200);
        // $data = $request->all();

        // $restaurant = Restaurant::all();
        // $restaurant->orders()->save($order);
        // $order->save();
        // foreach ($data['cart'] as $dish_info) {
        //     $dish = Dish::all()->where('id', '=', $dish_info['id'])->first();
        //     $order->dishes()->save($dish, ['quantity' => $dish_info['quantity']]);
        // }

        // $newOrder = Order::all()->where('id', '=', $order->id)->first();

        // return response()->json(
        //     [$newOrder, $restaurant]
        // );
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
