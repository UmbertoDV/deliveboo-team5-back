<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\User;


use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $dishes = Dish::where('id', '>', 0);

        $user_id = $request->user()->id;
        $restaurant = User::find($user_id)->restaurant;
        if ($restaurant) {
            $dishes = $restaurant->dishes;
        }

        return view('admin.welcome', compact('dishes', 'restaurant'));
    }
}
