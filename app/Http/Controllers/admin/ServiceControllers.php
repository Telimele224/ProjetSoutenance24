<?php

namespace App\Http\Controllers\admin;
use App\Models\Symptom;
use App\Models\Illness;
use App\Models\Disease;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ServiceRequest;
use App\Http\Requests\admin\UpdateServiceRequest;
use App\Http\Requests\admin\MiseAjourServiceRequest;
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
        $serviceSymptoms = [];
        $serviceIllnesses=[];
        $serviceDiseases =[];
        return view("admin.service.form",['service' => $service] ,compact("services","symptoms", "illnesses", "diseases","serviceSymptoms","serviceIllnesses","serviceDiseases"));

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
    public function store(ServiceRequest $request)
{
    $data = $request->validated();

    // Vérifie si l'un des champs (symptômes, maux ou maladies) est renseigné
    if (!$request->filled('symptoms') && !$request->filled('illnesses') && !$request->filled('diseases')) {
        return redirect()->back()->withInput()->withErrors(['error' => 'Veuillez renseigner au moins un symptôme, un mal ou une maladie.']);
    }

    // Vérification et traitement des fichiers photo et avatar
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        if ($photo->isValid()) {
            $new_photo = $photo->getClientOriginalName();
            $data['photo'] = $photo->storeAs('services', $new_photo, 'public');
        }
    }

    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        if ($avatar->isValid()) {
            $new_avatar = $avatar->getClientOriginalName();
            $data['avatar'] = $avatar->storeAs('services', $new_avatar, 'public');
        }
    }

    // Création du service avec les données validées
    $service=Service::create($data);

     // Association des symptômes, maladies et maux au service
     $service->symptoms()->sync($request->input('symptoms',[]));
     $service->illnesses()->sync($request->input('illnesses',[]));
     $service->diseases()->sync($request->input('diseases',[]));

    // Redirection avec un message de succès
    return redirect()->route('admin.service.index')->with('sucess', 'Ajout effectué avec succès !');
}


    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('admin.service.show',[
            'service' => $service
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $service = Service::findOrFail($id);
    $symptoms = Symptom::all();
    $illnesses = Illness::all();
    $diseases = Disease::all();

    // Récupérer les symptômes, maux et maladies liés au service
    $serviceSymptoms = $service->symptoms->pluck('id')->toArray();
    $serviceIllnesses = $service->illnesses->pluck('id')->toArray();
    $serviceDiseases = $service->diseases->pluck('id')->toArray();

    return view("admin.service.form", compact("service", "symptoms", "illnesses", "diseases", "serviceSymptoms", "serviceIllnesses", "serviceDiseases"));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(MiseAjourServiceRequest $request, Service $service)
    {
        // Valider les données de la requête
        $data = $request->validated();

        // Vérifier si l'un des champs (symptômes, maux ou maladies) est renseigné
        if (!$request->filled('symptoms') && !$request->filled('illnesses') && !$request->filled('diseases')) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Veuillez renseigner au moins un symptôme, un mal ou une maladie.']);
        }

        // Vérification et traitement des fichiers photo et avatar
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            if ($photo->isValid()) {
                $new_photo = $photo->getClientOriginalName();
                $data['photo'] = $photo->storeAs('services', $new_photo, 'public');
            }
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            if ($avatar->isValid()) {
                $new_avatar = $avatar->getClientOriginalName();
                $data['avatar'] = $avatar->storeAs('services', $new_avatar, 'public');
            }
        }

        // Mettre à jour le service avec les données validées
        $service->update($data);

        // Redirection avec un message de succès
        return redirect()->route('admin.service.index')->with('success', 'Modification effectuée avec succès !');
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
