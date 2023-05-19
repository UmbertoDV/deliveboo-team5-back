<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::paginate(8);
        foreach ($restaurants as $restaurant) {
            $restaurant->description = $restaurant->getAbstract();
            $restaurant->image = $restaurant->getImageUri();
        }

        return response()->json($restaurants);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::where('id', $id)
            ->first();

        if ($restaurant->image)
            $restaurant->image = url('storage/' . $restaurant->image);


        else
            $restaurant->image = 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png';

        // se l'id del post non esiste ritorna un'errore 404
        if (!$restaurant) return response(null, 404);

        return response()->json($restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getRestaurantByType($type_id)
    {
        $restaurants = Restaurant::whereHas('types', function ($query) use ($type_id) {
            $query->where('type_id', $type_id)->orderBy('updated_at', 'DESC');
        })->get();

        foreach ($restaurants as $restaurant) {
            $restaurant->description = $restaurant->getAbstract();
            $restaurant->image = $restaurant->getImageUri();
        }

        $type = Type::find($type_id);

        return response()->json($restaurants);
    }


    public function types()
    {
        $types = Type::all();
        return response()->json([
            'success' => true,
            'types' => $types,
        ]);
    }
}
