<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PersonnelsRequest;
use App\Http\Requests\admin\PersonnelsRequestUpdate;
use App\Models\Actualite;
use App\Models\Personnel;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.personnel.index',[
            'personnels' => Personnel::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personnel = new Personnel();
        return view('admin.personnel.form',[
            'personnel' => $personnel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonnelsRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            if($photo->isValid()){
                $new_photo = $photo->getClientOriginalName();
                $data['photo'] = $photo->storeAs('personnels', $new_photo, 'public');
            }
        }
        Personnel::create($data);
        return redirect()->route('admin.personnel.index')->with('sucess', 'Ajout effectue avec success !');


    }

    /**
     * Display the specified resource.
     */
    public function show(Personnel $personnel)
    {
        return view('admin.personnel.show',[
            'personnel' => $personnel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $personnel)
    {
        return view('admin.personnel.form', [
            'personnel' => $personnel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonnelsRequestUpdate $request, Personnel $personnel)
    {
        $data = $request->validated();
        // dd($data);
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            if($personnel->photo){
                Storage::disk('public')->delete($personnel->photo);
            }
            $new_photo = $photo->getClientOriginalName();
            $data['photo'] = $photo->storeAs('personnels', $new_photo, 'public');
        }
        //Ajout de l'image de l'photo
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            if($personnel->photo){
                Storage::disk('public')->delete($personnel->photo);
            }
            $new_photo = $photo->getClientOriginalName();
            $data['photo'] = $photo->storeAs('personnels', $new_photo, 'public');
        }
        //
        $personnel->update($data);
        return redirect()->route('admin.personnel.index')->with('sucess', 'Ajout effectue avec success !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personnel $personnel)
    {
        if($personnel->photo){
            Storage::disk('public')->delete($personnel->photo);
        }
        $personnel->delete();
        return redirect()->route('admin.personnel.index')->with('sucess', 'suppression effectue avec success !');
    }
}
