<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::paginate(3);
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
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
        $restaurant->fill($data);
        $restaurant->save();
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
        return view('admin.restaurants.form', compact('restaurant'));
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
                'email' => 'string|max:80',
                'telephone' => 'required|string|max:15',
                'description' => 'string',
                'p_iva' => 'required|string',
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

                'telephone.required' => 'Il numero del ristorante è obbligatorio',
                'telephone.string' => 'Il numero del ristorante deve essere una stringa',
                'telephone.max' => 'Il numero del ristorante deve avere massimo 15 caratteri',

                'description.string' => 'La descrizone del ristorante deve essere una stringa',

                'p_iva.required' => "La partita iva è obbligatoria",
                'p_iva.string' => "La partita iva deve essere una stringa",

                'image.image' => "Inserisci un file, per favore",
                'image.mimes' => "I formati consentiti sono: jpg, png o jpeg",
                
                
            ]
        )->validate();
        return $validator;
    }
}
