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
use App\Models\Consultation;
use App\Models\TypeConsultation;
use App\Models\Role;
use App\Models\Horaires;
use App\Models\Patient;
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

public function rechercheService(Request $request) {
    $services = Service::query();

    // Vérifie si une recherche par nom a été effectuée
    if ($request->has('rechercheService')) {
        $searchTerm = $request->input('rechercheService');
        $services->where('nom', 'like', '%' . $searchTerm . '%');
    }

    $services = $services->select('service_id', 'nom', 'description')->get();

    return response()->json($services);
}

// Dans RdvController
public function detail_medecin($medecinId)
{
    // Récupérer le médecin
    $medecin = Medecin::findOrFail($medecinId);

    // Récupérer les horaires de disponibilité du médecin
    $horaires = $medecin->horaires;

    // Retourner la vue avec les données du médecin
    return view('rdv.show_medecin', compact('medecin', 'horaires'));
}


public function detail_service($serviceId)
    {
        $service = Service::with('medecin.user')->findOrFail($serviceId);
        $medecins = $service->medecin;  // Récupérer les médecins du service

        return view('rdv.show_service', compact('service', 'medecins'));
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

    // Récupérer la date et le jour
    $date = $request->input('date');
    $jour = Carbon::parse($date)->locale('fr')->isoFormat('dddd');

    // Mettre les données en session
    session()->put('rendezVous', [
        'medecinId' => $request->input('medecinId'),
        'dateRdv' => $date,
        'heure' => $request->input('heure'),
        'jour' => $jour,
    ]);

    session()->put('medecinId', $request->input('medecinId'));

    // Rediriger vers la vue de confirmation
    return redirect()->route('connexionInscription');
}



public function afficherMedecinsParService($serviceId)
{
    // Récupérez les médecins du service spécifié
    $service = Service::find($serviceId);
    $medecins = Medecin::where('service_id', $service->service_id)->get();

    // Vérifiez s'il n'y a aucun médecin lié au service
    if ($medecins->isEmpty()) {
        return view('rdv.selectionMedecin', compact('service'))->with('message', 'Aucun médecin n\'est lié à ce service.');
    }

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

    $medecins = $query->with('user:id,nom,prenom,photo')->get();

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
    $jour = Carbon::parse($dateRdv)->locale('fr')->isoFormat('dddd');
    $patientId = $request->input('patientId');
    $medecinId = $request->input('medecinId');

    // Vérifier que la date est supérieure à la date actuelle
    if (strtotime($dateRdv) <= strtotime(now())) {
        return redirect()->back()->with('error', 'La date doit être ultérieure à la date d\'aujourd\'hui.');
    }

    // Vérifier que l'heure est supérieure à l'heure actuelle
    // ...

    // Construire le nom des colonnes pour l'heure de début et de fin en fonction du jour de la semaine
    $colonneDebut = strtolower($jour) . '_debut';
    $colonneFin = strtolower($jour) . '_fin';

    // Récupérer les horaires de disponibilité du médecin pour le jour de la semaine donné
    $horairesDisponibles = Horaires::where('id_medecin', $medecinId)
        ->whereNotNull($colonneDebut)
        ->whereRaw("TIME($colonneDebut) <= ?", [$heure])
        ->whereRaw("TIME($colonneFin) >= ?", [$heure])
        ->get();

    // Vérifier la disponibilité du médecin à l'heure sélectionnée
    if ($horairesDisponibles->isEmpty()) {
        return redirect()->back()->with('error', 'Le médecin n\'est pas disponible ressayer ulterieurement.');
    }

    // Enregistrez le rendez-vous dans la session
    session()->put('rendezVous', [
        'medecinId' => $medecinId,
        'dateRdv' => $dateRdv,
        'heure' => $heure,
        'jour' => $jour,
    ]);

    // Rediriger vers la page de confirmation
    return redirect()->route('confirmation_rdv_view_patient');
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
        // Ajoutez vos règles de validation si nécessaire
    ]);

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

    // Récupérer les données du rendez-vous depuis la session
    $rendezVousData = session('rendezVous');

    // Vérifier si les données du rendez-vous existent en session
    if (!$rendezVousData) {
        return redirect()->back()->with('error', 'Aucun rendez-vous trouvé en session.');
    }

    // Vérifier qu'un rendez-vous n'existe pas déjà pour ce patient, ce médecin et cette date
    $existingRdv = Rdv::where('id_patient', $user->patient->id)
        ->where('id_medecin', $rendezVousData['medecinId'])
        ->where('dateRdv', $rendezVousData['dateRdv'])
        ->exists();

    if ($existingRdv) {
        return redirect()->back()->with('error', 'Vous avez déjà un rendez-vous avec ce médecin pour cette date.');
    }

    // Enregistrer le rendez-vous dans la base de données
    $rendezVous = Rdv::create([
        'id_medecin' => $rendezVousData['medecinId'],
        'id_patient' => $user->patient->id,
        'dateRdv' => $rendezVousData['dateRdv'],
        'heure' => $rendezVousData['heure'],
        'jour' => $rendezVousData['jour'],
        // Ajoutez d'autres champs si nécessaire
    ]);

    // Nettoyer la session
    session()->forget('rendezVous');

    $rendezVous = Rdv::all();
    $rendezVousAcceptes = Rdv::where('statut', 'accepte')->get();
    $rendezVousRejettes = Rdv::where('statut', 'rejette')->get();
    $rendezVousEnAttente= Rdv::where('statut', 'annuler')->get();
    return view('patients.home',[
        'rendezVous'=>$rendezVous,
        'rendezVousAcceptes' => $rendezVousAcceptes,
        'rendezVousRejettes' => $rendezVousRejettes,
        'rendezVousEnAttente' => $rendezVousEnAttente
    ])->with('success', 'La demande de rendez-vous a été confirmée avec succès');

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

public function liste_rdv_medecin(Request $request)
{
    // Récupérer l'utilisateur connecté
    $user = auth()->user();

    // Vérifier si l'utilisateur est un médecin et s'il a un médecin associé
    if ($user->role === 'medecin' && $user->medecin) {
        // L'utilisateur est un médecin et a un médecin associé
        // Récupérer l'ID du médecin
        $medecinId = $user->medecin->id;

        $statut = $request->input('filter', 'tousrendezVous');

        $query = Rdv::where('id_medecin', $medecinId)->with('patient.user');

        if ($statut != 'tousrendezVous') {
            $query->where('statut', $statut);
        }


        // Récupérer les rendez-vous du médecin avec les détails des patients
        $rendezVous = Rdv::where('id_medecin', $medecinId)->with('patient.user')->get();

        // Passer les rendez-vous à la vue
        return view('rdv.liste_rdv_medecin', ['rendezVous' => $rendezVous, 'selectedOption' => $statut,]);
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

    //   mes rendez-vous
    public function mesRendezVous() {
        $user = auth()->user();
     // Vérifier si l'utilisateur est un médecin et s'il a un médecin associé
        if ($user->role === 'medecin' && $user->medecin) {
        // L'utilisateur est un médecin et a un médecin associé
        // Récupérer l'ID du médecin
        $medecinId = $user->medecin->id;

        // Récupérer les rendez-vous du médecin avec les détails des patients
        $rendezVous = Rdv::where('id_medecin', $medecinId)->where('is_deleted', true)->with('patient.user')->get();

        return view('medecins.consultation.rendezvous', [
            'mesRendezVous' => Rdv::orderBy('created_at', 'desc')->get(),
            'users' => User::all(),
            'patients' => Patient::all(),
            'rendezVous' => $rendezVous
        ]);
    } else {
        // L'utilisateur n'est pas un médecin ou n'a pas de médecin associé
        // Rediriger l'utilisateur vers une page d'erreur ou une autre page
        // Dans cet exemple, je redirige simplement l'utilisateur vers la page d'accueil
        return redirect()->route('home')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
    }
 }

 public function filter(Request $request)
{
    $user = auth()->user();

    if ($user->role === 'medecin' && $user->medecin) {
        $medecinId = $user->medecin->id;

        $statut = $request->input('filter', 'tousrendezVous');

        $query = Rdv::where('id_medecin', $medecinId)->with('patient.user');

        if ($statut != 'tousrendezVous') {
            $query->where('statut', $statut);
        }

        $rendezVous = $query->get();

        return view('rdv.liste_rdv_medecin', [
            'rendezVous' => $rendezVous,
            'mesRendezVous' => Rdv::all(),
            'patients' => Patient::all(),
            'selectedOption' => $statut,
        ]);
    }
}



}
