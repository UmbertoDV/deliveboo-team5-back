<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Models\Type;
use App\Models\Restaurant;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\User;
// 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $visibility = $request->visibility;

        $sort = (!empty($sort_request = $request->get('sort'))) ? $sort_request : 'updated_at';
        $order = (!empty($order_request = $request->get('order'))) ? $order_request : 'ASC';

        // if (isset($request->visibility)) {
            //     $dishes->where('visibility', '=', $request->visibility);
            // }
            
        $dishes = Dish::where('id', '>', 0);
        $user_id = $request->user()->id;
        $restaurant = User::find($user_id)->restaurant;
        // dd($restaurant);
        if ($restaurant) {
            $dishes = $restaurant->dishes;
        }
        // dd($dishes);

        // $dishes = $dishes->sortByDesc($sort)->paginate(6)->withQueryString();

        return view('admin.dishes.index', compact('dishes', 'sort', 'order', 'visibility'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Dish $dish)
    {
        $dish = new Dish;

        $types = Type::orderBy('id')->get();

        return view('admin.dishes.form', compact('dish', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user()->id;
        $dish = Dish::all();

        $data = $this->validation($request->all());
        if (Arr::exists($data, 'image')) {
            $path = Storage::put('uploads/dishes', $data['image']);
            $data['image'] = $path;
        };

        $dish = new Dish;
        $dish->fill($data);

        // $data['visibility'] = $request->has('visibility') ? 1 : 0;

        // Collegamento con id_restaurant
        $user_id = $request->user()->id;
        $restaurant = User::find($user_id)->restaurant;
        $dish->restaurant_id = $restaurant->id;

        $dish->save();

        if (Arr::exists($data, 'types')) $dish->types()->attach($data['types']);

        return to_route('admin.dishes.index', $dish)
            ->with('message_type', "success")
            ->with('message', "Il piatto '$dish->name' è stato creato con successo!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $types = Type::orderBy('name')->get();
        // ROTTA SHOW!
        $rest = null;
        $id_user = Auth::user()->id;
        $restaurant_logged_user = Restaurant::where('user_id', '=', $id_user)->get();
        $id_ristorante_del_piatto = $dish->restaurant_id;

        foreach ($restaurant_logged_user as $rest) {
            $rest = $rest->id;
        }
        if ($id_ristorante_del_piatto != $rest) {
            return redirect()->action([DishController::class, 'index']);
        } else {
            return view('admin.dishes.show', compact('dish', 'types'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish, Request $request)
    {
        $types = Type::orderBy('name')->get();

        $rest = null;
        $id_user = Auth::user()->id;
        $restaurant_logged_user = Restaurant::where('user_id', '=', $id_user)->get();
        $id_ristorante_del_piatto = $dish->restaurant_id;

        foreach ($restaurant_logged_user as $rest) {
            $rest = $rest->id;
        }
        if ($id_ristorante_del_piatto != $rest) {
            return redirect()->action([DishController::class, 'index']);
        } else {
            return view('admin.dishes.form', compact('dish', 'types'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $data = $this->validation($request->all());

        if (Arr::exists($data, 'image')) {
            if ($dish->image) Storage::delete($dish->image);

            $path = Storage::put('uploads/dishes', $data['image']);
            $data['image'] = $path;
        };

        $dish->fill($data);

        // $data['visibility'] = $request->has('visibility') ? 1 : 0;
        $dish->save();

        return to_route('admin.dishes.index', $dish)
            ->with('message_type', "success")
            ->with('message', "Il piatto con ID: $dish->id è stato modificato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $id_dish = $dish->id;

        $dish->delete();
        return to_route('admin.dishes.index')
            ->with('message_type', "danger")
            ->with('message', "Il piatto con $id_dish è stato spostato nel cestino!");
    }


    // VALIDATION
    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:80',
                'description' => 'string',
                'price' => 'numeric|between:0.5,99.99',
                'image' => 'nullable|image|mimes:jpg,png,jpeg',
                'visibility' => 'boolean'
            ],
            [
                'name.required' => 'Il nome è richiesto',
                'name.string' => 'Il nome deve essere una stringa',
                'name.max' => 'Il nome deve avere massimo 80 caratteri',

                'description.string' => 'La descrizione deve essere una stringa',

                'price.numeric' => 'Il prezzo deve essere un numero',
                'price.between' => 'Il prezzo deve essere compreso tra 0,5 e 99,99',

                'image.image' => 'Perfavore inserisci un file',
                'image.mimes' => 'I formati accettati sono: jpg, png o jpeg',

            ]
        )->validate();
        return $validator;
    }

    // SOFT-DELETE ********************************************
    public function trash(Request $request)
    {
        $sort = (!empty($sort_request = $request->get('sort'))) ? $sort_request : 'updated_at';
        $order = (!empty($order_request = $request->get('order'))) ? $order_request : 'ASC';

        $dishes = Dish::onlyTrashed($sort, $order)->paginate(10);
        $dishes->appends($_GET);

        return view('admin.dishes.trash', compact('dishes', 'sort', 'order'));
    }

    public function forceDelete(Int $id)
    {
        $id_message = $id;

        // Creo una variabile per salvarmi l'id--> per la variabile FLASH
        $dish = Dish::where('id', $id)->onlyTrashed()->first();
        if ($dish->image) {
            Storage::delete($dish->image);
        }
        $dish->forceDelete();

        return to_route('admin.dishes.trash')
            ->with('message_type', "danger")
            ->with('message', "Il piatto con ID: $id_message è stato eliminato definitivamente!");
    }

    public function restore(Int $id)
    {
        $id_message = $id;

        $id_dish = Dish::where('id', $id)->onlyTrashed()->first();
        $id_dish->restore();
        return to_route('admin.dishes.index')
            ->with('message_type', "success")
            ->with('message-content', "Il piatto con ID: $id_message è stato ripristinato correttamente!");
    }
}