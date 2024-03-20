<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CalendrierRequest;
use App\Models\Calendrier;
use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendriers = Calendrier::all();

        return view('admin.calendriers.index', compact('calendriers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $calendrier = new Calendrier();
        return view('admin.calendriers.form',[
            'calendrier' => $calendrier
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CalendrierRequest $request)
    {
        $data = $request->validated();
        Calendrier::create($data);
        return redirect()->route('admin.calendriers.index')->with('sucess', 'Ajout effectue avec success !');

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
    public function edit(Calendrier $calendrier)
    {
        return view('admin.calendriers.form', [
            'calendrier' => $calendrier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CalendrierRequest $request, Calendrier $calendrier)
    {
        $data = $request->validated();
        $calendrier->update($data);
        return redirect()->route('admin.calendriers.index')->with('sucess', 'Ajout effectue avec success !');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
