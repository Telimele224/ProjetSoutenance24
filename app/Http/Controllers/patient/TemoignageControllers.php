<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\TemoignageRequest;
use App\Models\Temoignage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemoignageControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('patients.temoignage.index',[
            'temoignages'=> Temoignage::orderBy('created_at','desc')->paginate(10),

        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $temoignange = new Temoignage();
        return view('patients.temoignage.form', [
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
         //
        Temoignage::create($data);
        return redirect()->route('patients.temoignage.index')->with('sucess', "Votre temoignagne a été envoyer avec succès , en attente d'une évaluation... !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Temoignage $temoignage)
    {
        return view('patients.temoignage.form',[
            'temoignage' => $temoignage
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TemoignageRequest $request, Temoignage $temoignage)
    {
        //
        $data = $request->validated();
        $data['user_id']=Auth::user()->id;
        $temoignage->update($data);
        return redirect()->route('patients.temoignage.index')->with('sucess', "Votre Temoignage a été modifié avec succès, en Attente d'une évalution... !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Temoignage $temoignage)
    {
        $temoignage->delete();
        return redirect()->route('patients.temoignage.index')->with('sucess', 'Suppression effectue avec success !');
    }
}
