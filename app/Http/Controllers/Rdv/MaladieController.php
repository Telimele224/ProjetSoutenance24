<?php

namespace App\Http\Controllers\Rdv;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Disease;

class MaladieController extends Controller
{
    public function index()
    {
        $diseases = Disease::all();
        return view('admin.service.maladies.index', compact('diseases'));
    }

    public function create(){
        return view('admin.service.maladies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:diseases',
        ]);

        Disease::create([
            'nom' => $request->nom,
        ]);

        return redirect()->route('admin.maladies.index')->with('success', 'Maladie ajoutée avec succès.');
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
