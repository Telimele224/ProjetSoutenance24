<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\MedecinRequest;
use App\Models\Medecin;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\Cast\String_;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        $query = User::where('role', 'medecin');
        $users = User::all();

        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nom', 'like', '%' . $request->search . '%')
                  ->orWhere('prenom', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('service') && $request->service != '') {
            $query->whereHas('medecin', function($q) use ($request) {
                $q->where('service_id', $request->service);
            });
        }

           // Vérifier si le paramètre de tri est présent dans l'URL
           if ($request->has('sort_by')) {
            // Supprimer le paramètre de tri de l'URL
            $query->getQuery()->orders = null;
        }


        $users = $query->paginate(10);
        $services = Service::all();

        return view('admin.medecin.index', compact('users', 'services'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $services = Service::all();
        $medecin = null; // Initialisez $medecin à null pour l'ajout

        return view('admin.medecin.form', [
            'title' => 'Ajouter un Médecin',
            'action' => route('admin.medecin.store'),
            'method' => 'post',
            'medecin' => $medecin,
            'services' => $services,
            'symt'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedecinRequest $request)
    {
        // Traitement du numéro de téléphone pour gérer le préfixe du code de pays
    $telephone = $request->input('telephone');

    if (!str_starts_with($telephone, '+224') && !str_starts_with($telephone, '224') && !str_starts_with($telephone, '00224')) {
        $telephone = '+224' . $telephone;
    } else {
        // Normaliser le numéro de téléphone pour qu'il commence par +224
        if (str_starts_with($telephone, '224')) {
            $telephone = '+224' . substr($telephone, 3);
        } elseif (str_starts_with($telephone, '00224')) {
            $telephone = '+224' . substr($telephone, 5);
        }
    }

        // dd($request->all());
        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->input('name'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'genre' => $request->input('genre'),
            'adresse' => $request->input('adresse'),
            'age' => $request->input('age'),
            'role' => $request->filled('role') ? $request->input('role') : 'medecin',
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            // 'photo' => null, // Initialisez la valeur du champ photo à null par défaut


        ]);
       // Télécharge l'avatar de l'utilisateur s'il est fourni dans la requête
       if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        if ($photo->isValid()) {
            $new_photo = $photo->getClientOriginalName();
            $path = $photo->storeAs('photos', $new_photo, 'public'); // Enregistrez la photo dans le stockage public
            $user->photo = $path; // Mettez à jour le champ photo avec le chemin d'accès de la photo
            $user->save(); // Enregistrez les modifications
        }

    }
    // Création du medecin lié à l'utilisateur
    $medecin = Medecin::create([
        'specialite' => $request->input('specialite'),
        'biographie' => $request->input('biographie'),
        'statut' => $request->input('statut'),
        'service_id' => $request->input('service_id'),
        'user_id' => $user->id,
    ]);

    return redirect()->route('admin.medecin.index')->with('success', 'Medecin ajouté avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Récupérer le médecin
        $medecin = Medecin::findOrFail($id);

        // Récupérer les horaires de disponibilité du médecin
        $horaires = $medecin->horaires;

        // Retourner la vue avec les données du médecin
        return view('admin.medecin.afficher_detaille_medecin', compact('medecin', 'horaires'));

    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function edit( $id)
    {
        $medecin = Medecin::findOrFail($id);

        return view('admin.medecin.accountactive', [
            'title' => 'Modifier un medecin',
            'action' => route('admin.medecin.update', ['medecin' => $id]),
            'method' => 'put',
            'medecin' => $medecin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
        // Autres méthodes du contrôleur

        public function update(Request $request, $id)
        {

            // Trouver le patient à mettre à jour
            $medecin = Medecin::findOrFail($id);

            $statut = $request->has('statut');
            // Mettre à jour l'utilisateur associé au patient
            $user = $medecin->user;

            $user->statut = $statut;
            // dd($user);

           $user->save();

            // Redirection avec un message de succès
            return redirect()->route('admin.medecin.index')->with('success', 'Medecin mis à jour avec succès.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
