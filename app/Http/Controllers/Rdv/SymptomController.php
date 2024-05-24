<?php
namespace App\Http\Controllers\Rdv;

use App\Http\Controllers\Controller;

use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index()
    {
        $symptoms = Symptom::all();
        return view('admin.service.symptomes.index', compact('symptoms'));
    }

    public function getSymptoms(Request $request){
        $symptoms=[];
        if($search=$request->nom){
            $symptoms=Symptom::where('nom','LIKE',"%$search%")->get();
        }
        return response()->json($symptoms);

    }

    public function create(){
        return view('admin.service.symptomes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:symptoms',
        ]);

        Symptom::create([
            'nom' => $request->nom,
        ]);

        return redirect()->route('admin.symptomes.index')->with('success', 'Symptôme ajouté avec succès.');
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
    public function destroy(string $id)
    {
        //
    }
}
