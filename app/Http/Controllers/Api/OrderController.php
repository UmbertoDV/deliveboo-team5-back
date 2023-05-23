<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Type;
use App\Models\Order;
use Illuminate\Support\Arr;

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
        // dd($request);
        // $cart = $request->input('cart');

        // Esegui le operazioni desiderate con i dati ricevuti

        // $order = new Order;
        // $restaurant = Restaurant::where('id',  $cart['cart'][0]['restaurant_id'])->first();
        // return response()->json([$cart], 200);
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
        $data = [$request->all()];

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $address = $request->input('address');
        $telephone = $request->input('telephone');
        $note = $request->input('note');
        $total = $request->input('total');


        $order = new Order();

        $order->name = $name;
        $order->surname = $surname;
        $order->email = $email;
        $order->address = $address;
        $order->telephone = $telephone;
        $order->note = $note;
        $order->total = $total;

    
        
        $order->save();
        $cart=$request->input('cart');

        //  foreach ($cart as $dish) {
        //     $dishId = $dish['dish_id']; 
        //     $quantity = $dish['quantity']; 
        //     $order->dishes()->attach($dishId, ['quantity' => $quantity]);
        // }

        // $order->load('dishes');

        // $order->fill($request->all());
        // $order->save();


        // Restituisci i dati come parte della risposta JSON
        return response()->json([$cart, 200]);
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
