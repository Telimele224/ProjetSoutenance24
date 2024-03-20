<?php

namespace App\Http\Controllers\Rdv;

use App\Http\Controllers\Controller;

use App\Mail\RendezVousAccepte;
use App\Mail\RendezVousAnnule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\User;
use App\Models\Medecin;
use App\Models\Role;
use App\Models\Horaires;
use App\Models\Rdv;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\LaratrustUserTrait;

class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    return view('rdv.headerRdv');
}

public function rdvC(Request $request){
        $services = Service::all();

            return view("rdv.selectionService", compact("services",));
}

public function rechercheService(Request $request){
        $services = Service::query();

        // Vérifie si une recherche par nom a été effectuée
        if ($request->has('rechercheService')) {
            $searchTerm = $request->input('rechercheService');
            $services->where('nom', 'like', '%' . $searchTerm . '%');
        }

        $services = $services->select('service_id', 'nom')->get();

        return response()->json($services);
}


public function choisirDate($medecinId)
{
    $medecin = Medecin::findOrFail($medecinId);
    $horair = $medecin->horaires;
    // Récupérez les horaires disponibles du médecin
    $horairesDisponibles = $this->getHorairesDisponibles($medecin);

     // Séparez les horaires disponibles par jour
    $horairesParJour = $this->separerHorairesParJour($horairesDisponibles);

    return view('rdv.choisirDate', compact('medecin', 'horairesParJour', 'horair'));
}


public function getHorairesDisponibles(Medecin $medecin)
{
        // Récupérer les horaires disponibles pour le médecin
        $horaires = $medecin->horaires()
            ->where(function ($query) {
                // Ajoutez une clause where pour chaque jour de la semaine
                $query->where(function ($query) {
                    $query->whereDate('lundi_debut', '>=', Carbon::today())
                        ->orWhereNull('lundi_debut');
                })
                ->orWhere(function ($query) {
                    $query->whereDate('mardi_debut', '>=', Carbon::today())
                        ->orWhereNull('mardi_debut');
                })
                ->orWhere(function ($query) {
                    $query->whereDate('mercredi_debut', '>=', Carbon::today())
                        ->orWhereNull('mercredi_debut');
                })
                ->orWhere(function ($query) {
                    $query->whereDate('jeudi_debut', '>=', Carbon::today())
                        ->orWhereNull('jeudi_debut');
                })
                ->orWhere(function ($query) {
                    $query->whereDate('vendredi_debut', '>=', Carbon::today())
                        ->orWhereNull('vendredi_debut');
                })
                ->orWhere(function ($query) {
                    $query->whereDate('samedi_debut', '>=', Carbon::today())
                        ->orWhereNull('samedi_debut');
                })
                ->orWhere(function ($query) {
                    $query->whereDate('dimanche_debut', '>=', Carbon::today())
                        ->orWhereNull('dimanche_debut');
                });
            })
            ->orderBy('lundi_debut')
            ->take(5)
            ->get();

        // Retourner les horaires disponibles
        return $horaires;
}


protected function separerHorairesParJour($horaires)
{
    $horairesParJour = [];

    foreach ($horaires as $horaire) {
        $jours = [
            'lundi' => Carbon::parse('next monday'),
            'mardi' => Carbon::parse('next tuesday'),
            'mercredi' => Carbon::parse('next wednesday'),
            'jeudi' => Carbon::parse('next thursday'),
            'vendredi' => Carbon::parse('next friday'),
            'samedi' => Carbon::parse('next saturday'),
            'dimanche' => Carbon::parse('next sunday'),
        ];
        foreach ($jours as $jour => $date) {
            if ($horaire->{$jour . '_debut'} && $horaire->{$jour . '_fin'}) {
                // Le médecin travaille ce jour-là
                $debut = Carbon::parse($horaire->{$jour . '_debut'});
                $fin = Carbon::parse($horaire->{$jour . '_fin'});

                // Calculer la durée des plages horaires disponibles
                $dureePlage = $debut->diffInMinutes($fin) > 240 ? 60 : 45;

                // Ajoutez les horaires disponibles pour ce jour
                for ($heure = $debut; $heure->lt($fin); $heure->addMinutes($dureePlage)) {
                    $horairesParJour[$jour][] = $date->copy()->setTime($heure->hour, $heure->minute);
                }
            }
        }

    }

    return $horairesParJour;
}

public function connexionInscription(){
    return view('rdv.connexionInscription');
}



public function choisirHeure(Request $request)
{
         // Valider les données du formulaire
            $request->validate([
                'medecinId' => 'required|numeric',
                'date' => 'required|date',
                'heure' => 'required|date_format:H:i',
                'jour' => 'required|string',
            ]);


                // Définir la locale de Carbon sur le français
                Carbon::setLocale('fr');



        // Créer un nouvel rendez-vous en utilisant la méthode create
        $rendezVous = Rdv::create([
            'id_medecin' => $request->input('medecinId'),
            'dateRdv' => $request->input('date'),
            'heure' => $request->input('heure'),
            'jour' => Carbon::parse($request->input('jour'))->locale('fr')->isoFormat('dddd'), // Convertir le jour en français
        ]);

        // Stocker l'ID du rendez-vous en session
        session()->put('rendezVous', $rendezVous);
        session()->put('medecinId', $request->input('medecinId'));

        // Rediriger vers la vue de connexion ou d'inscription avec un message de succès
        return redirect()->route('connexionInscription')->with('success', 'Rendez-vous ajouté avec succès.');
}



public function afficherMedecinsParService($serviceId)
{
    // Récupérez les médecins du service spécifié
    $service = Service::find($serviceId);
    $medecins = Medecin::where('service_id',  $service->service_id)->get();

    return view('rdv.selectionMedecin', compact('service', 'medecins'));
}




public function rechercheMedecin(Request $request)
{
    $serviceId = $request->input('serviceId');

    $query = Medecin::query()->where('service_id', $serviceId);

    // Vérifie si une recherche par nom a été effectuée
    if ($request->has('rechercheMedecin')) {
        $searchTerm = $request->input('rechercheMedecin');
        $query->whereHas('user', function ($subQuery) use ($searchTerm) {
            $subQuery->where(DB::raw('CONCAT(nom, " ", prenom)'), 'like', '%' . $searchTerm . '%');
        });
    }

    $medecins = $query->with('user:id,nom,prenom,avatar')->get();

    return response()->json($medecins);
}



 public function ajouterRendezVous(Request $request)
{
    $request->validate([
        'dateRdv' => 'required|date',
        'heure' => 'required',
        'jour' => 'string',

        ]);
    // Récupérer les données du formulaire
    $dateRdv = $request->input('dateRdv');
    $heure = $request->input('heure');
    $jour = $request->input('jour');
    $patientId = $request->input('patientId');
    $medecinId = $request->input('medecinId');

    // Vérifier que la date est supérieure à la date actuelle
    if (strtotime($dateRdv) <= strtotime(now())) {
        return redirect()->back()->with('error', 'La date doit être ultérieure à aujourd\'hui.');
    }

    // Vérifier que l'heure est supérieure à l'heure actuelle
    $heureActuelle = now()->format('H:i');
    // if (strtotime($heure) <= strtotime($heureActuelle)) {
    //     return redirect()->back()->with('error', 'L\'heure doit être ultérieure à l\'heure actuelle.');
    // }

    // Convertir la date fournie en jour de la semaine en français
    $jourSemaine = Carbon::parse($dateRdv)->locale('fr')->isoFormat('dddd');

    // Construire le nom des colonnes pour l'heure de début et de fin en fonction du jour de la semaine
    $colonneDebut = strtolower($jourSemaine) . '_debut';
    $colonneFin = strtolower($jourSemaine) . '_fin';

    // Récupérer les horaires de disponibilité du médecin pour le jour de la semaine donné
    $horairesDisponibles = Horaires::where('id_medecin', $medecinId)
        ->whereNotNull($colonneDebut) // S'assurer que l'horaire pour ce jour est défini
        ->whereRaw("TIME($colonneDebut) <= ?", [$heure]) // Vérifier que l'horaire de début est avant ou égal à l'heure sélectionnée
        ->whereRaw("TIME($colonneFin) >= ?", [$heure]) // Vérifier que l'horaire de fin est après ou égal à l'heure sélectionnée
        ->get();

    // Vérifier que le médecin est disponible à l'heure sélectionnée pour ce jour
    if ($horairesDisponibles->isEmpty()) {
        return redirect()->back()->with('error', 'Le médecin n\'est pas disponible à cette heure.');
    }

    // Si toutes les vérifications passent, ajoutez le rendez-vous
    $rendezVous = new Rdv([
        'dateRdv' => $dateRdv,
        'heure' => $heure,
        'jour' => $jour,
        'id_patient' => null, // Le patient sera associé plus tard
        'id_medecin' => $medecinId,

    ]);

    $rendezVous->save();

    // Stocker les données du rendez-vous dans la session
    session()->put('rendezVous', $rendezVous);

    // Rediriger vers la page de connexion/inscription du patient
    return redirect()->route('connexionInscription')->with('success', 'Rendez-vous ajouté avec succès.');
}


public function confirmationRdv_view()
{
 // Récupérer le rendez-vous depuis la session
$rendezVous = session('rendezVous');

// Vérifier si le rendez-vous existe en session
if (!$rendezVous) {
    return redirect()->back()->with('error', 'Aucun rendez-vous trouvé.');
}
// Passer le rendez-vous à la vue de confirmation
return view('rdv.confirmationRdv_view', compact('rendezVous'));
}



public function confirmationRdv(Request $request)
{
    // Valider les données du formulaire
    $request->validate([
        'rendezVousId' => 'required|numeric',
    ]);

    // Récupérer le rendez-vous à partir de l'ID fourni
    $rendezVous = Rdv::findOrFail($request->input('rendezVousId'));

    // Vérifier si l'utilisateur est connecté
    if (!auth()->check()) {
        return back()->with('error', 'Veuillez vous connecter pour confirmer le rendez-vous.');
    }

    // Récupérer l'utilisateur connecté
    $user = auth()->user();

    // Vérifier si l'utilisateur est un patient
    if (!$user->patient) {
        return back()->with('error', 'Seuls les patients peuvent confirmer un rendez-vous.');
    }

    // Vérifier qu'un rendez-vous n'existe pas déjà pour ce patient, ce médecin et cette date
    $existingRdv = Rdv::where('id_patient', $user->patient->id)
        ->where('id_medecin', $rendezVous->id_medecin)
        ->where('dateRdv', $rendezVous->dateRdv)
        ->exists();

    if ($existingRdv) {
        return redirect()->back()->with('error', 'Vous avez déjà un rendez-vous avec ce médecin pour cette date.');
    }

    // Mettre à jour le rendez-vous avec l'ID du patient
    $rendezVous->id_patient = $user->patient->id;
    $rendezVous->save();

    // Rediriger vers une autre page avec un message de succès
    return redirect()->route('patients.dashboard_patient')->with('success', 'La demande de rendez-vous a été confirmée avec succès. Veuillez patienter !');
}



public function liste_rdv_patient()
{
    // Récupérer l'utilisateur connecté
    $user = auth()->user();

    // Vérifier si l'utilisateur est un patient et s'il a un patient associé
    if ($user->role === 'patient' && $user->patient) {
        // L'utilisateur est un patient et a un patient associé
        // Récupérer les rendez-vous du patient avec les détails du médecin
        $rendezVous = Rdv::where('id_patient', $user->patient->id)->with('medecin')->get();

        // Passer les rendez-vous à la vue
        return view('rdv.liste_rdv_patient', ['rendezVous' => $rendezVous]);
    } else {
        // L'utilisateur n'est pas un patient ou n'a pas de patient associé
        // Rediriger l'utilisateur vers une page d'erreur ou une autre page
        // Dans cet exemple, je redirige simplement l'utilisateur vers la page d'accueil
        return redirect()->route('home')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
    }
}

public function liste_rdv_medecin()
{
    // Récupérer l'utilisateur connecté
    $user = auth()->user();

    // Vérifier si l'utilisateur est un médecin et s'il a un médecin associé
    if ($user->role === 'medecin' && $user->medecin) {
        // L'utilisateur est un médecin et a un médecin associé
        // Récupérer l'ID du médecin
        $medecinId = $user->medecin->id;

        // Récupérer les rendez-vous du médecin avec les détails des patients
        $rendezVous = Rdv::where('id_medecin', $medecinId)->where('is_deleted', false)->with('patient.user')->get();

        // Passer les rendez-vous à la vue
        return view('rdv.liste_rdv_medecin', ['rendezVous' => $rendezVous]);
    } else {
        // L'utilisateur n'est pas un médecin ou n'a pas de médecin associé
        // Rediriger l'utilisateur vers une page d'erreur ou une autre page
        // Dans cet exemple, je redirige simplement l'utilisateur vers la page d'accueil
        return redirect()->route('home')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
    }
}


public function accepterRendezVous($id)
{
    // Récupérer le rendez-vous
    $rendezVous = Rdv::findOrFail($id);

    // Changer le statut du rendez-vous en "accepté"
    $rendezVous->statut = 'accepté';
    $rendezVous->save();

    // Envoyer un e-mail de confirmation au patient
    $patientUser = $rendezVous->patient->user;
    Mail::to($patientUser->email)->send(new RendezVousAccepte($patientUser,$rendezVous));

    // Rediriger vers la liste des rendez-vous avec un message de succès
    return back()->with('success', 'Le rendez-vous a été accepté avec succès.');
}

public function annulerRendezVous(Request $request,$id)
{
    // Trouver le rendez-vous à annuler
    $rendezVous = Rdv::findOrFail($id);

    // Récupérer la raison de l'annulation à partir de la demande
    $raisonAnnulation = $request->input('raison_annulation');

    // Annuler le rendez-vous en mettant à jour son statut
    $rendezVous->statut = 'Annulé';
    $rendezVous->is_deleted = true; // Marquer comme supprimé
    $rendezVous->raison_annulation = $raisonAnnulation;
    $rendezVous->save();

    // Envoyer un e-mail d'annulation au patient
    $patientUser = $rendezVous->patient->user;
    $raisonAnnulation = request()->input('raison_annulation');
    Mail::to($patientUser->email)->send(new RendezVousAnnule($patientUser,$rendezVous, $raisonAnnulation));

    // Rediriger vers une autre page avec un message de succès
    return back()->with('success', 'Le rendez-vous a été annulé avec succès.');
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
