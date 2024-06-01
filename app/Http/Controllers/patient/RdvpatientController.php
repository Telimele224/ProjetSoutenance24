<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medecin;
use App\Models\Horaires;
use App\Models\Rdv;
use App\Models\Symptom;
use App\Models\Service;
use App\Models\Disease;
use App\Models\Illness;
use Carbon\Carbon;

class RdvpatientController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function showSelectionSymptomes()
    {
        // Récupérer la liste des symptômes
        $symptomes = Symptom::all();
        return view('patients.rendez-vous.selection_symptomes', compact('symptomes'));
    }

    public function showSelectionMaux()
    {
        // Récupérer la liste des maux
        $maux = Illness::all();
        return view('patients.rendez-vous.selection_maux', compact('maux'));
    }

    public function showSelectionMaladies()
    {
        // Récupérer la liste des maladies
        $maladies = Disease::all();
        return view('patients.rendez-vous.selection_maladies', compact('maladies'));
    }


        public function AfficherForm()
        {
             return view('patients.rendez-vous.recommandService');
        }


        public function recommander_servicePar_symptome(Request $request)
        {
            // Valider les données du formulaire
            $request->validate([
                'symptomes' => 'required|array|min:1', // Les symptômes doivent être un tableau avec au moins un élément
            ], [
                'symptomes.required' => 'Vous devez sélectionner au moins un symptôme.',
                'symptomes.array' => 'La sélection des symptômes est invalide.',
                'symptomes.min' => 'Vous devez sélectionner au moins un symptôme.',
            ]);

            // Récupérer les symptômes sélectionnés
            $symptomes = $request->input('symptomes', []);

            // Construction de la requête pour récupérer les services
            $servicesQuery = Service::query();

            // Joindre la table pivot service_symptom_illness_disease
            $servicesQuery->join('service_symptom_illness_disease', 'services.service_id', '=', 'service_symptom_illness_disease.service_id');

            // Ajouter les contraintes en fonction des symptômes sélectionnés
            if (!empty($symptomes)) {
                $servicesQuery->whereIn('service_symptom_illness_disease.symptom_id', $symptomes);
            }

            // Récupérer les services recommandés
            $services = $servicesQuery->distinct()->get();

            // Retourner la vue avec les services recommandés
            return view('patients.rendez-vous.selectionService', compact('services'));
        }



        public function recommander_servicePar_maux(Request $request)
        {
            // Valider les données du formulaire
            $request->validate([
                'maux' => 'required|array|min:1', // Les maux doivent être un tableau avec au moins un élément
            ], [
                'maux.required' => 'Vous devez sélectionner au moins un mal.',
                'maux.array' => 'La sélection des maux est invalide.',
                'maux.min' => 'Vous devez sélectionner au moins un mal.',
            ]);

            // Récupérer les maux sélectionnés
            $maux = $request->input('maux', []);

            // Construction de la requête pour récupérer les services
            $servicesQuery = Service::query();

            // Joindre la table pivot service_symptom_illness_disease
            $servicesQuery->join('service_symptom_illness_disease', 'services.service_id', '=', 'service_symptom_illness_disease.service_id');

            // Ajouter les contraintes en fonction des maux sélectionnés
            if (!empty($maux)) {
                $servicesQuery->whereIn('service_symptom_illness_disease.illness_id', $maux);
            }

            // Récupérer les services recommandés
            $services = $servicesQuery->distinct()->get();

            // Retourner la vue avec les services recommandés
            return view('patients.rendez-vous.selectionService', compact('services'));
        }



        public function recommander_servicePar_maladie(Request $request)
        {
            // Valider les données du formulaire
            $request->validate([
                'maladies' => 'required|array|min:1', // Les maladies doivent être un tableau avec au moins un élément
            ], [
                'maladies.required' => 'Vous devez sélectionner au moins une maladie.',
                'maladies.array' => 'La sélection des maladies est invalide.',
                'maladies.min' => 'Vous devez sélectionner au moins une maladie.',
            ]);

            // Récupérer les maladies sélectionnées
            $maladies = $request->input('maladies', []);

            // Construction de la requête pour récupérer les services
            $servicesQuery = Service::query();

            // Joindre la table pivot service_symptom_illness_disease
            $servicesQuery->join('service_symptom_illness_disease', 'services.service_id', '=', 'service_symptom_illness_disease.service_id');

            // Ajouter les contraintes en fonction des maladies sélectionnées
            if (!empty($maladies)) {
                $servicesQuery->whereIn('service_symptom_illness_disease.disease_id', $maladies);
            }

            // Récupérer les services recommandés
            $services = $servicesQuery->distinct()->get();

            // Retourner la vue avec les services recommandés
            return view('patients.rendez-vous.selectionService', compact('services'));
        }




    // Dans RdvController
    public function detail_medecin_patient($medecinId)
    {
        // Récupérer le médecin
        $medecin = Medecin::findOrFail($medecinId);

        // Récupérer les horaires de disponibilité du médecin
        $horaires = $medecin->horaires;

        // Retourner la vue avec les données du médecin
        return view('patients.rendez-vous.show_medecin', compact('medecin', 'horaires'));
    }


    public function detail_service_patient($serviceId)
        {
            $service = Service::with('medecin.user')->findOrFail($serviceId);
            $medecins = $service->medecin;  // Récupérer les médecins du service

            return view('patients.rendez-vous.show_service', compact('service', 'medecins'));
        }


    public function afficherMedecinsParService($serviceId)
    {
    // Récupérez les médecins du service spécifié
    $service = Service::find($serviceId);
    $medecins = Medecin::where('service_id',  $service->service_id)->get();

      // Vérifiez s'il n'y a aucun médecin lié au service
      if ($medecins->isEmpty()) {
        return view('patients.rendez-vous.selectionMedecin', compact('service'))->with('message', 'Aucun médecin n\'est lié à ce service.');
    }

    return view('patients.rendez-vous.selectionMedecin', compact('service', 'medecins'));
    }



    public function choisirDate($medecinId)
    {
    $medecin = Medecin::findOrFail($medecinId);
    $horair = $medecin->horaires;
    // Récupérez les horaires disponibles du médecin
    $horairesDisponibles = $this->getHorairesDisponibles($medecin);

     // Séparez les horaires disponibles par jour
    $horairesParJour = $this->separerHorairesParJour($horairesDisponibles);

    return view('patients.rendez-vous.choisirDate', compact('medecin', 'horairesParJour', 'horair'));
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

// public function connexionInscription(){
//     return view('rdv.connexionInscription');
// }



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

    // Rediriger vers la vue de confirmation
    return redirect()->route('confirmation_rdv_view_patient');
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
        return redirect()->back()->with('error', 'La date doit être ultérieure à aujourd\'hui.');
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
        return redirect()->back()->with('error', 'Le médecin n\'est pas disponible à cette heure.');
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
    return view('patients.rendez-vous.confirmationRdv_view', compact('rendezVous'));
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

public function annuler_rendezvous(){
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

public function listeRendezVousPatient(Request $request)
{
    $user = auth()->user();

    if ($user->role === 'patient' && $user->patient) {
        $patientId = $user->patient->id;

        $query = Rdv::where('id_patient', $patientId)
            ->whereIn('statut', ['accepté', 'consulté'])
            ->with(['medecin.user', 'consultations']);

        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('dateRdv', $request->date);
        }

        $rendezVous = $query->get();

        return view('patients.rendez-vous.mesrendezvous', [
            'rendezVous' => $rendezVous,
            'selectedOption' => $request->get('filter', 'all'),
        ]);
    } else {
        return redirect()->back()->with('error', 'Accès non autorisé');
    }
}

public function filterRendezVousByDate(Request $request)
{
    $user = auth()->user();

    if ($user->role === 'patient' && $user->patient) {
        $patientId = $user->patient->id;

        $query = Rdv::where('id_patient', $patientId)
            ->whereIn('statut', ['accepté', 'consulté'])
            ->with(['medecin.user', 'consultations']);

        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('dateRdv', $request->date);
        }

        $rendezVous = $query->get();

        return view('patients.rendez-vous.mesrendezvous', [
            'rendezVous' => $rendezVous,
            'selectedOption' => $request->get('filter', 'all'),
        ]);
    }

    return redirect()->back()->with('error', 'Accès non autorisé');
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
