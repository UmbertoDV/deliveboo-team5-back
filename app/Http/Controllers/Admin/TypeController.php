<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = (!empty($sort_request = $request->get('sort'))) ? $sort_request : "updated_at";
        $order = (!empty($order_request = $request->get('order'))) ? $order_request : "DESC";
        
        $types = Type::sortable()->paginate(10)->withQueryString();

        return view('admin.types.index', compact('types', 'sort', 'order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = new Type;
        return view('admin.types.form', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:80',
            'color' => 'required|string|max:7|min:7',
        ],
        [
            'name.required' => 'Il nome è obbligatorio',
            'name.string' => 'Il nome deve essere un testo',
            'name.max' => 'Il nome non deve superare gli 80 caratteri',
            'color.required' => 'Il colore è obbligatorio',
            'color.string' => 'Seleziona il colore dal color picker',
            'color.max' => 'Seleziona il colore dal color picker',
            'color.min' => 'Seleziona il colore dal color picker',
        ]
    );

    $data = ($request->all());
    if(Arr::exists($data, 'image')){
        $path_image = Storage::put('uploads/types', $data['image']);
        $data['image'] = $path_image;
    };
    
    $type = new Type();
    $type->fill($data);
    $type->save();
    
    return to_route('admin.types.index')
        ->with('message_content', "Type $type->id creata con successo");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.form', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|string|max:80',
            'color' => 'required|string|max:7|min:7',
        ],
        [
            'name.required' => 'Il nome è obbligatorio',
            'name.string' => 'Il nome deve essere un testo',
            'name.max' => 'Il nome non deve superare gli 80 caratteri',
            'color.required' => 'Il colore è obbligatorio',
            'color.string' => 'Seleziona il colore dal color picker',
            'color.max' => 'Seleziona il colore dal color picker',
            'color.min' => 'Seleziona il colore dal color picker',
        ]
    );
    // if(Arr::exists($data, 'image')){
    //     if($type->image) Storage::delete($type->image);
    //     $path_image = Storage::put('uploads/types', $data['image']);
    //     $data['image'] = $path_image;
    // };

    $data = ($request->all());
    if(Arr::exists($data, 'image')){
        if($type->image) Storage::delete($type->image);
        $path_image = Storage::put('uploads/types', $data['image']);
        $data['image'] = $path_image;
    };

    $type->fill($data);
    $type->save();

    
    return to_route('admin.types.index')
        ->with('message_content', "Type $type->id modificata con successo");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $id_type = $type->id;
        if($type->image) Storage::delete($type->image);

        $type->delete();

        return to_route('admin.types.index')
            ->with('message_type', "danger")
            ->with('message_content', "Type $id_type spostata nel cestino");
    }

    public function trash(Request $request){

        $sort = (!empty($sort_request = $request->get('sort'))) ? $sort_request : "updated_at";
        $order = (!empty($order_request = $request->get('order'))) ? $order_request : "DESC";
        $types = Type::onlyTrashed()->orderBy($sort, $order)->paginate(10);
        $types->appends($_GET);

        return view('admin.types.trash', compact('types', 'sort', 'order'));
    }

    public function restore(Int $id)
    {
        $type = Type::where('id', $id)->onlyTrashed()->first();
        $type->restore();

        return to_route('admin.types.index')
            ->with('message_type', "danger")
            ->with('message_content', "Type con ID $id ripristinato");
    }
    public function forceDelete(Int $id)
    {
        $type = Type::where('id', $id)->onlyTrashed()->first();
        $id_type = $type->id;
        if($type->image) Storage::delete($type->image);

        // $type->tags()->detach();

        $type->forceDelete();

        return to_route('admin.types.trash')
            ->with('message_type', "danger")
            ->with('message_content', "Type $id_type eliminato definitivamente");
    }
}