<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\TypeConsultationRequest;
use App\Models\TypeConsultation;
use Illuminate\Http\Request;

class TypeConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.typeconsultation.index', [
            'typeconsultations' => TypeConsultation::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeconsultation = new TypeConsultation();
        return view ('admin.typeconsultation.form',[
            'typeconsultation' => $typeconsultation
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeConsultationRequest $request)
    {
        $data = $request->validated();
        TypeConsultation::create($data);
        return redirect()->route('admin.typeconsultation.index')->with('sucess', 'Ajout effectue avec success !');

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
    public function edit(TypeConsultationRequest $typeconsultation)
    {
        return view('admin.typeconsultation.form', [
            'typeconsultation' => $typeconsultation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeConsultationRequest $request, TypeConsultation $typeconsultation)
    {
        $data = $request->validated();
        $typeconsultation->update($data);
        return redirect()->route('admin.typeconsultation.index')->with('sucess', 'Ajout effectue avec success !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeConsultation $typeconsultation)
    {
        $typeconsultation->delete();
        return redirect()->route('admin.typeConsultation.index')->with('sucess', 'suppression effectue avec success !');
    }
}
