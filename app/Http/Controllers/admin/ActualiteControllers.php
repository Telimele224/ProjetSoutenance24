<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualiteRequest;
use App\Http\Requests\admin\ActualiteRequest as AdminActualiteRequest;
use App\Http\Requests\admin\UpdateActualites;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActualiteControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.actualite.index', [
            'actualites' => Actualite::orderBy('created_at', 'desc')->paginate(10)
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $actulite = new Actualite();
        return view('admin.actualite.form',[
            'actualite' => $actulite
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminActualiteRequest $request )
    {
        $data = $request->validated();
        // dd($data);
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            if($avatar->isValid()){
                $new_avatar = $avatar->getClientOriginalName();
                $data['avatar'] = $avatar->storeAs('actualites', $new_avatar, 'public');
            }
        }
        Actualite::create($data);
        return redirect()->route('admin.actualite.index')->with('sucess', 'Ajout effectue avec success !');

    }

    /**
     * Display the specified resource.
     */
    public function show(Actualite $actualite)
    {
        return view('admin.actualite.show',[
            'actualite' => $actualite
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actualite $actualite)
    {
        return view('admin.actualite.form', [
            'actualite' => $actualite
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActualites $request, Actualite $actualite)
    {
        $data = $request->validated();
        // dd($data);
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            if($actualite->avatar){
                Storage::disk('public')->delete($actualite->avatar);
            }
            $new_avatar = $avatar->getClientOriginalName();
            $data['avatar'] = $avatar->storeAs('actualites', $new_avatar, 'public');
        }
        //Ajout de l'image de l'avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            if($actualite->avatar){
                Storage::disk('public')->delete($actualite->avatar);
            }
            $new_avatar = $avatar->getClientOriginalName();
            $data['avatar'] = $avatar->storeAs('actualites', $new_avatar, 'public');
        }
        //
        $actualite->update($data);
        return redirect()->route('admin.actualite.index')->with('sucess', 'Ajout effectue avec success !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actualite $actualite)
    {
        if($actualite->avatar){
            Storage::disk('public')->delete($actualite->avatar);
        }
        $actualite->delete();
        return redirect()->route('admin.service.index')->with('sucess', 'suppression effectue avec success !');
    }

}
