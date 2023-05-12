<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Models\Type;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
// 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

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

        $dishes = Dish::where('id', '>', 0);
        if (isset($request->visibility)) {
            $dishes->where('visibility', '=', $request->visibility);
        }
        $dishes = $dishes->orderBy($sort, $order)->paginate(6)->withQueryString();

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

        $data = $this->validation($request->all());
        if (Arr::exists($data, 'image')) {
            $path = Storage::put('uploads/dishes', $data['image']);
            $data['image'] = $path;
        };

        $dish = new Dish;
        $dish->fill($data);

        $data['visibility'] = $request->has('visibility') ? 1 : 0;
        $dish->save();

        if (Arr::exists($data, 'types')) $dish->types()->attach($data['types']);

        return to_route('admin.dishes.show', $dish)
            ->with('message_type', "success")
            ->with('message-content', "Il piatto con $dish->name è stato creato con successo!");
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
        return view('admin.dishes.show', compact('dish', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $types = Type::orderBy('name')->get();

        return view('admin.dishes.form', compact('dish', 'types'));
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

        $data['visibility'] = $request->has('visibility') ? 1 : 0;
        $dish->save();

        return to_route('admin.dishes.show', $dish)
            ->with('message_type', "success")
            ->with('message-content', "Il piatto con ID: $dish->title è stato modificato con successo!");
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
        if ($dish->image) {
            Storage::delete($dish->image);
        }

        $dish->delete();
        return to_route('admin.dishes.index', ['visibility' => 1])
            ->with('message_type', "danger")
            ->with('message-content', "Il piatto con $id_dish spostato nel cestino!");
    }


    // VALIDATION
    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:80',
                'description' => 'string',
                'price' => 'numeric|between:0,99.99',
                'image' => 'nullable|image|mimes:jpg,png,jpeg',
                'visibility' => 'boolean'
            ],
            [
                'name.required' => 'Il nome è richiesto',
                'name.string' => 'Il nome deve essere una stringa',
                'name.max' => 'Il nome deve avere massimo 80 caratteri',

                'description.string' => 'La descrizione deve essere una stringa',

                'price.numeric' => 'Il prezzo deve essere un numero',
                'price.between' => 'Il numero deve essere compreso tra 0 e 99,99',

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

        $dishes = Dish::onlyTrashed($sort, $order)->paginate(10)->withQueryString();

        return view('admin.dishes.trash', compact('dishes', 'sort', 'order'));
    }

    public function forceDelete(Int $id)
    {
        $id_message = $id;
        // Creo una variabile per salvarmi l'id--> per la variabile FLASH
        $id_dish = Dish::where('id', $id)->onlyTrashed()->first();
        $id_dish->forceDelete();
        return to_route('admin.dishes.index')
            ->with('message_type', "danger")
            ->with('message-content', "Il piatto con ID: $id_message è stato eliminato definitivamente!");;
    }

    public function restore(Int $id)
    {
        $id_message = $id;

        $id_dish = Dish::where('id', $id)->onlyTrashed()->first();
        $id_dish->restore();
        return to_route('admin.dishes.index')
            ->with('message_type', "success")
            ->with('message-content', "Il piatto con ID: $id_message è stato ripristinato correttamente!");;
    }
}
