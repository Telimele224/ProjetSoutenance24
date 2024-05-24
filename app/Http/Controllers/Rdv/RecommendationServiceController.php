<?php

namespace App\Http\Controllers\Rdv;

use App\Http\Controllers\Controller;

use App\Models\Disease;
use App\Models\Illness;
use App\Models\Symptom;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;


class RecommendationServiceController extends Controller
{

public function showSelectionSymptomes()
{
    // Récupérer la liste des symptômes
    $symptomes = Symptom::all();
    return view('rdv.selection_symptomes', compact('symptomes'));
}

public function showSelectionMaux()
{
    // Récupérer la liste des maux
    $maux = Illness::all();
    return view('rdv.selection_maux', compact('maux'));
}

public function showSelectionMaladies()
{
    // Récupérer la liste des maladies
    $maladies = Disease::all();
    return view('rdv.selection_maladies', compact('maladies'));
}


    public function AfficherForm()
    {
         return view('rdv.recommandService');
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

     // Vérifiez s'il n'y a aucun médecin lié au service
     if ($services->isEmpty()) {
        return back()->with('error', 'Aucune maladie  n\'est lié à ce service.');
    }

    // Retourner la vue avec les services recommandés
    return view('rdv.selectionService', compact('services'));
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
    return view('rdv.selectionService', compact('services'));
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
    return view('rdv.selectionService', compact('services'));
}



}
