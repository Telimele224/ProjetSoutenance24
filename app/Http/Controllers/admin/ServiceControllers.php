<?php

namespace App\Http\Controllers\admin;
use App\Models\Symptom;
use App\Models\Illness;
use App\Models\Disease;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ServiceRequest;
use App\Http\Requests\admin\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.service.index', [
            'services' => Service::orderBy('created_at', 'desc')->paginate(10)
        ]);


    }
    public function create()
    {   $service = new Service();
        $services =Service::all();
        $symptoms = Symptom::all();
        $illnesses = Illness::all();
        $diseases = Disease::all();

        return view("admin.service.form",['service' => $service] ,compact("services","symptoms", "illnesses", "diseases"));

    }

    // public function create()
    // {
    //     $service = new Service();
    //     return view('admin.service.form',[
    //         'service' => $service
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request )
    {
        $data = $request->validated();
        // dd($data);
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            if($photo->isValid()){
                $new_photo = $photo->getClientOriginalName();
                $data['photo'] = $photo->storeAs('services', $new_photo, 'public');
            }
        }
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            if($avatar->isValid()){
                $new_avatar = $avatar->getClientOriginalName();
                $data['avatar'] = $avatar->storeAs('services', $new_avatar, 'public');
            }
        }

        Service::create($data);
        return redirect()->route('admin.service.index')->with('sucess', 'Ajout effectue avec success !');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('admin.service.form',[
            'service' => $service
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.form', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();
        // dd($data);
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            if($service->photo){
                Storage::disk('public')->delete($service->photo);
            }
            $new_photo = $photo->getClientOriginalName();
            $data['photo'] = $photo->storeAs('services', $new_photo, 'public');
        }
        //Ajout de l'image de l'avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            if($service->avatar){
                Storage::disk('public')->delete($service->avatar);
            }
            $new_avatar = $avatar->getClientOriginalName();
            $data['avatar'] = $avatar->storeAs('services', $new_avatar, 'public');
        }
        //
        $service->update($data);
        return redirect()->route('admin.service.index')->with('sucess', 'Ajout effectue avec success !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // dd($service);
        if($service->photo){
            Storage::disk('public')->delete($service->photo);
            Storage::disk('public')->delete($service->avatar);
        }
        $service->delete();
        return redirect()->route('admin.service.index')->with('sucess', 'suppression effectue avec success !');
    }

}
