<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TemoignageRequest;
use App\Models\Temoignage;
use Illuminate\Support\Facades\Auth;

class adminTemoignages extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.temoignage.index',[
            'temoignages'=> Temoignage::orderBy('created_at','desc')->paginate(10),

        ]);
    }

    public function listeTemoignage()
    {
        return view('admin.temoignage.temoignagepublier',[
            'temoignages'=> Temoignage::orderBy('created_at','desc')->paginate(10),

        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $temoignange = new Temoignage();
        return view('admin.temoignage.form', [
            'temoignage' => $temoignange
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TemoignageRequest $request)
    {
        $data = $request->validated();
        $data['user_id']=Auth::user()->id;
        Temoignage::create($data);
        return redirect()->route('admin.temoignage.index')->with('sucess', "Votre temoignagne a été envoyer avec succès , en attente d'une évaluation... !");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Temoignage $temoignage)
    {
        return view('admin.temoignage.form',[
            'temoignage' => $temoignage
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TemoignageRequest $request, Temoignage $temoignage)
    {
        $data = $request->validated();

        //Vérifier si la case à cocher "publier" est cochée
            if ($request->has('publier')) {
                $data['publier'] = 1; // Si cochée, attribuer la valeur 1
            } else {
                $data['publier'] = 0; // Sinon, attribuer la valeur par défaut 0
            }
        $temoignage->update($data);
        return redirect()->route('admin.temoignage.index')->with('sucess', "Votre Temoignage a été modifié avec succès, en Attente d'une évalution... !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Temoignage $temoignage)
    {
        $temoignage->delete();
        return redirect()->route('admin.temoignage.index')->with('sucess', 'Suppression effectue avec success !');
    }
}
