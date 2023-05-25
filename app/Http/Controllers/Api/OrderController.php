<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Type;
use App\Models\Order;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;
use App\Mail\RestaurantNotificationMail;

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

         foreach ($cart as $dish) {
            $dishId = $dish['id']; 
            $quantity = $dish['quantity']; 
            $order->dishes()->attach($dishId, ['quantity' => $quantity]);
        }

        // $order->load('dishes');

        // $order->fill($request->all());
        $order->save();
        // Invia l'email di conferma all'utente
        Mail::to($email)->send(new OrderConfirmationMail($order));

        // Invia l'email di notifica al ristoratore
        $restaurantEmail = 'restaurant@example.com'; 
        Mail::to($restaurantEmail)->send(new RestaurantNotificationMail($order));       


        // Restituisci i dati come parte della risposta JSON
        return response()->json([$cart]);
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
