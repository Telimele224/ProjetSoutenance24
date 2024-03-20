<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\GalerieRequest;
use App\Models\Galerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.galerie.index', [
            'galeries' => Galerie::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $galerie = new Galerie();
        return view ('admin.galerie.form',[
            'galerie' => $galerie
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalerieRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            if($photo->isValid()){
                $new_photo = $photo->getClientOriginalName();
                $data['photo'] = $photo->storeAs('galerie', $new_photo, 'public');
            }
        }
        Galerie::create($data);
        return redirect()->route('admin.galerie.index')->with('sucess', 'Ajout effectue avec success !');

    }

    /**
     * Display the specified resource.
     */
    public function show(Galerie $galerie)
    {
        return view('admin.galerie.form',[
            'galerie' => $galerie
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galerie $galerie)
    {
        if($galerie->photo){
            Storage::disk('public')->delete($galerie->photo);
        }
        $galerie->delete();
        return redirect()->route('admin.galerie.index')->with('sucess', 'suppression effectue avec success !');
    }
}
