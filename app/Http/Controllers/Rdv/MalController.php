<?php
namespace App\Http\Controllers\Rdv;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Illness;

class MalController extends Controller
{
    public function index()
    {
        $illnesses = Illness::all();
        return view('admin.service.maux.index', compact('illnesses'));
    }

    public function create(){
        return view('admin.service.maux.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|unique:illnesses',
        ]);

        Illness::create([
            'nom' => $request->nom,
        ]);

        return redirect()->route('admin.maux.index')->with('success', 'Maux ajouté avec succès.');
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
