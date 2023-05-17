<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Arr;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $restaurant = new Restaurant;
        $types = Type::all();
        return view('auth.register', compact('types', 'restaurant'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();

        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'name_restaurant' => 'required|string|max:255',
                'address' => 'required|string|max:100',
                'telephone' => 'required|string|max:15',
                'description' => 'string',
                'p_iva' => 'required|string|max:11|min:11',
                'types' => 'nullable|exists:types,id',
                'image' => 'nullable|image|mimes:jpg,png,jpeg'
            ],
            [
                'name.required' => 'Il nome è obbligatorio',
                'name.string' => 'Il nome deve essere una stringa',
                'name.max' => 'Il nome deve avere massimo 255 caratteri',

                'surname.required' => 'Il cognome  è obbligatorio',
                'surname.string' => 'Il cognome deve essere una stringa',
                'surname.max' => 'Il cognome deve avere massimo 255 caratteri',

                'name_restaurant.required' => 'Il nome del ristorante è obbligatorio',
                'name_restaurant.string' => 'Il nome del ristorante deve essere una stringa',
                'name_restaurant.max' => 'Il nome del ristorante deve avere massimo 255 caratteri',

                'address.required' => "L'indirizzo del ristorante è obbligatorio",
                'address.string' => "L'indirizzo del ristorante deve essere una stringa",
                'address.max' => "L'indirizzo del ristorante deve avere massimo 100 caratteri",

                'email.required' => "L'email è obbligatoria",
                'email.string' => "La mail deve essere una stringa",
                'email.max' => "La mail può contenere massimo 80 caratteri",
                'email.email' => "Il formato dell'email non è corretto",
                'email.unique' => "Questa email è stata già usata",

                'password.required' => 'La password è obbligatoria',

                'telephone.required' => 'Il numero del ristorante è obbligatorio',
                'telephone.string' => 'Il numero del ristorante deve essere una stringa',
                'telephone.max' => 'Il numero del ristorante deve avere massimo 15 caratteri',

                'description.string' => 'La descrizone del ristorante deve essere una stringa',

                'p_iva.required' => "La partita iva è obbligatoria",
                'p_iva.string' => "La partita iva deve essere una stringa",
                'p_iva.max' => "La partita iva deve avere 11 caratteri",
                'p_iva.min' => "La partita iva deve avere 11 caratteri",

                'type_id.exists' => "L'id non è valido",

                'image.image' => "Inserisci un file, per favore",
                'image.mimes' => "I formati consentiti sono: jpg, png o jpeg"
            ]
        );


        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (!empty($data['image'])) {
            $path = Storage::put('uploads/restaurants', $data['image']);
            $data['image'] = $path;
        };

        $restaurant = Restaurant::create([
            'user_id' => $user->id,
            'name_restaurant' => $request->name_restaurant,
            'address' => $request->address,
            'p_iva' => $request->p_iva,
            'telephone' => $request->telephone,
            'description' => $request->description,
            'types' => $request->types,
            'image' => isset($data['image']) ? $data['image'] : asset('https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png')
        ]);


        // Se esiste il dato Types allora "attaccalo" al restaurant.
        if (Arr::exists($data, "types")) $restaurant->types()->attach($data["types"]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
