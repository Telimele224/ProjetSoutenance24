<?php

namespace App\Http\Controllers\medecin;

use App\Http\Controllers\Controller;
use App\Http\Requests\medecin\OrdonnanceRequest;
use App\Models\Ordonance;
use Illuminate\Http\Request;

class OrdonnanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('medecins.ordonance.index', [
            'ordonances' => Ordonance::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ordonance = new Ordonance();
        return view('medecins.ordonance.form',[
            'ordonance' => $ordonance
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdonnanceRequest $request)
    {
        $data = $request->validated();
        Ordonance::create($data);
        return redirect()->route('medecins.ordonance.index')->with('sucess', 'Ajout effectue avec success !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordonance $ordonance)
    {
        return view('medecins.ordonance.show',[
            'ordonance' => $ordonance
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordonance $ordonance)
    {
        return view('medecins.ordonance.form', [
            'ordonance' => $ordonance
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdonnanceRequest $request, Ordonance $ordonance)
    {
        $data = $request->validated();
        $ordonance->update($data);
        return redirect()->route('admin.ordonance.index')->with('sucess', 'Modification effectue avec success !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordonance $ordonance)
    {
        $ordonance->delete();
        return redirect()->route('admin.ordonance.index')->with('sucess', 'suppression effectue avec success !');
    }
}
