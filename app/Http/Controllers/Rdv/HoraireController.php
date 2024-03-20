<?php

namespace App\Http\Controllers\Rdv;

use App\Http\Controllers\Controller;

use App\Models\Horaires;
use App\Models\Medecin;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class HoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérez tous les horaires avec les médecins associés
        $horaires = Horaires::with('medecin')->get();

        // Passez les horaires à la vue
        return view('admin.medecin.Horaires.index', compact('horaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medecins = Medecin::all();
        return view("admin.medecin.Horaires.addHoraire",compact("medecins",));
    }

    //affiche la vue de selection du medecin pour l'horaire
    public function selectMedecinForm()
    {
        $medecins = Medecin::all();
        return view('admin.medecin.select_medecin', compact('medecins'));
    }

    public function selectMedecin(Request $request)
    {
        $request->validate([
            'id_medecin' => 'required|exists:medecins,id',
        ]);

        $medecin = Medecin::find($request->id_medecin);
        return view('admin.medecin.Horaires.addHoraire', compact('medecin'));
    }


    public function home()
    {
        return view("Front_end.home");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
                // Validez les données du formulaire
                $request->validate([
                    'lundi_debut' => 'date_format:H:i',
                    'lundi_fin' => 'date_format:H:i',
                    'mardi_debut' => 'date_format:H:i',
                    'mardi_fin' => 'date_format:H:i',
                    'mercredi_debut' => 'date_format:H:i',
                    'mercredi_fin' => 'date_format:H:i',
                    'jeudi_debut' => 'date_format:H:i',
                    'jeudi_fin' => 'date_format:H:i',
                    'vendredi_debut' => 'date_format:H:i',
                    'vendredi_fin' => 'date_format:H:i',
                    'samedi_debut' => 'date_format:H:i',
                    'samedi_fin' => 'date_format:H:i',
                    'dimanche_debut' => 'date_format:H:i',
                    'dimanche_fin' => 'date_format:H:i',
                ]);

                // Récupérez le médecin
                $medecin = Medecin::find($id);
                  // Vérifiez si le médecin a déjà un horaire
               if ($medecin->horaires()->exists()) {
                // Le médecin a déjà un horaire
                return redirect()->route("admin.emplois.selectMedecin")->with('error', 'Le médecin a déjà un horaire. Vous ne pouvez pas ajouter un nouvel horaire.');
            }

                // Créez un nouvel horaire
                $horaire = new Horaires([
                    'lundi_debut' => $request->input('lundi_debut'),
                    'lundi_fin' => $request->input('lundi_fin'),
                    'mardi_debut' => $request->input('mardi_debut'),
                    'mardi_fin' => $request->input('mardi_fin'),
                    'mercredi_debut' => $request->input('mercredi_debut'),
                    'mercredi_fin' => $request->input('mercredi_fin'),
                    'jeudi_debut' => $request->input('jeudi_debut'),
                    'jeudi_fin' => $request->input('jeudi_fin'),
                    'vendredi_debut' => $request->input('vendredi_debut'),
                    'vendredi_fin' => $request->input('vendredi_fin'),
                    'samedi_debut' => $request->input('samedi_debut'),
                    'samedi_fin' => $request->input('samedi_fin'),
                    'dimanche_debut' => $request->input('dimanche_debut'),
                    'dimanche_fin' => $request->input('dimanche_fin'),
                ]);

                // Sauvegardez l'horaire pour le médecin
                $medecin->horaires()->save($horaire);

                // Redirigez ou effectuez d'autres opérations en conséquence
                return redirect()->route("admin.horaires.index")->with('success', 'Horaire ajouté avec succès.');
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
    public function edit(Horaires $horaire)
    {
        return view('admin.medecin.Horaires.edit', compact('horaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horaires $horaire)
    {


       // Mettez à jour l'horaire existant
    $horaire->update($request->all());

    // Redirection après la mise à jour
    return redirect()->route("admin.horaires.index")->with('success', 'Horaire modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
          // Recherchez l'horaire par son ID
    $horaire = Horaires::find($id);

    // Vérifiez si l'horaire existe
    if (!$horaire) {
        return back()->with('error', 'Horaire non trouvé.');
    }

    // Supprimez l'horaire
    $horaire->delete();

    // Redirection avec un message de succès
    return redirect()->route("admin.horaires.index")->with('success', 'Horaire supprimé avec succès.');
    }
}
