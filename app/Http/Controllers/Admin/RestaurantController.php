<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        $type = Type::orderBy('name')->get();
        $user_id = Auth::id();
        $restaurants = Restaurant::where('user_id', $user_id)->get();
        $restaurant = User::find($user_id)->restaurant;
        // dd($restaurant);

        return view('admin.restaurants.index', compact('restaurants', 'user_id', 'restaurant', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant, Request $request)
    {
        $types = Type::orderBy('name')->get();
        return view('admin.restaurants.form', compact('restaurant', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $data = $this->validation($request->all());

        if (Arr::exists($data, 'image')) {
            $path = Storage::put('uploads/restaurants', $data['image']);
            $data['image'] = $path;
        };
        $restaurant = new Restaurant;

        $id = Auth::id();
        $restaurant->fill($data);
        $restaurant->user_id = $id;
        $restaurant->save();

        if (Arr::exists($data, 'types')) $restaurant->types()->attach($data['types']);
        // dd($restaurant);

        return redirect()->route('admin.restaurants.show', $restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $types = Type::orderBy('name')->get();
        //
        $restaurant_type = $restaurant->types->pluck('id')->toArray();
        return view('admin.restaurants.form', compact('restaurant', 'restaurant_type', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $data = $this->validation($request->all());

        if (Arr::exists($data, 'image')) {
            if ($restaurant->image) Storage::delete($restaurant->image);

            $path = Storage::put('uploads/restaurants', $data['image']);
            $data['image'] = $path;
        };

        if (Arr::exists($data, 'types')) $restaurant->types()->sync($data['types']);
        else $restaurant->types()->detach();

        $restaurant->update($data);
        return redirect()->route('admin.restaurants.show', $restaurant);
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)

    {
        if ($restaurant->image) {
            Storage::delete($restaurant->image);
        }
        $restaurant->delete();
        return redirect()->route('admin.restaurants.index');
    }


    //VALIDATION
    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:80',
                'address' => 'required|string|max:100',
                'email' => 'string|max:80|email:rfc,dns',
                'telephone' => 'required|string|max:15',
                'description' => 'string',
                'p_iva' => 'required|string|max:11|min:11',
                'types' => 'nullable|exists:types,id',
                'image' => 'nullable|image|mimes:jpg,png,jpeg'

            ],
            [
                'name.required' => 'Il nome del ristorante è obbligatorio',
                'name.string' => 'Il nome del ristorante deve essere una stringa',
                'name.max' => 'Il nome del ristorante deve avere massimo 80 caratteri',

                'address.required' => "L'indirizzo del ristorante è obbligatorio",
                'address.string' => "L'indirizzo del ristorante deve essere una stringa",
                'address.max' => "L'indirizzo del ristorante deve avere massimo 100 caratteri",

                'email.string' => "La mail deve essere una stringa",
                'email.max' => "La mail può contenere massimo 80 caratteri",
                'email.email' => "Il formato dell'email non è corretto",

                'telephone.required' => 'Il numero del ristorante è obbligatorio',
                'telephone.string' => 'Il numero del ristorante deve essere una stringa',
                'telephone.max' => 'Il numero del ristorante deve avere massimo 15 caratteri',

                'description.string' => 'La descrizone del ristorante deve essere una stringa',

                'p_iva.required' => "La partita iva è obbligatoria",
                'p_iva.string' => "La partita iva deve essere una stringa",
                'p_iva.max' => "La partita iva deve avere 11 caratteri",
                'p_iva.min' => "La partita iva deve avere 11 caratteri",

                'type_id.exists' => "L'Id non è valido",

                'image.image' => "Inserisci un file, per favore",
                'image.mimes' => "I formati consentiti sono: jpg, png o jpeg",


            ]
        )->validate();
        return $validator;
    }
}
