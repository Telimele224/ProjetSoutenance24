<?php


use App\Http\Controllers\admin\ActualiteControllers;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\adminTemoignages;
use App\Http\Controllers\admin\CalendrierController;
use App\Http\Controllers\admin\calendrierControllers as AdminCalendrierControllers;
use App\Http\Controllers\admin\GalerieController;
use App\Http\Controllers\admin\MedecinController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\admin\ServiceControllers;
use App\Http\Controllers\admin\TypeConsultationController;
use App\Http\Controllers\Rdv\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front_end\MenuNavigation;
use App\Http\Controllers\Rdv\HoraireController;
use App\Http\Controllers\Rdv\MaladieController;
use App\Http\Controllers\Rdv\MalController;
use App\Http\Controllers\medecin\ConsultationController;
use App\Http\Controllers\medecin\ListeMedecinsController;
use App\Http\Controllers\medecin\PatientsController;
use App\Http\Controllers\patient\DossierMedicalController;
use App\Http\Controllers\patient\MedecinListeController;
use App\Http\Controllers\patient\TemoignageControllers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Rdv\RdvController;
use App\Http\Controllers\Rdv\RecommendationServiceController;
use App\Http\Controllers\Rdv\SymptomController;
use App\Http\Requests\medecin\ConsultationRequest;
use App\Models\TypeConsultation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ROUTE POUR FRONT END LES PAGES DE NAVIGATION
Route::get('/apropos',[MenuNavigation::class, 'apropos'])->name('apropos');
Route::get('/medecins',[MenuNavigation::class, 'medecins'])->name('medecins');
Route::get('/show',[MenuNavigation::class, 'essai'])->name('show');
Route::get('/contact',[MenuNavigation::class, 'contact'])->name('contact');
Route::get('/',[MenuNavigation::class, 'welcome'])->name('welcome');
Route::get('/les_departements',[MenuNavigation::class, 'departements'])->name('les_departements');
Route::get('/Blog', [MenuNavigation::class,'blog'])->name('Blog');
Route::get('/Medecins', [MenuNavigation::class,'lien'])->name('Medecins');


Route::get('/home',[HomeController::class, 'redirect'])->middleware(['auth', 'verified'])->name('home');
Route::get('consultations/{id}/pdf', [ConsultationController::class, 'generatePDF'])->name('consultations.pdf');
Route::get('consultations/{id}/pdf', [DossierMedicalController::class, 'generatePDF1'])->name('consultation.pdf');




// ROUTE POUR L'ADMINISTRATEUR BACK_END
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('service',ServiceControllers::class);
    Route::resource('actualite',ActualiteControllers::class);
    Route::resource('temoignage',adminTemoignages::class)->except('show');
    Route::resource('medecin',adminTemoignages::class)->except('show');
    Route::resource('galerie',GalerieController::class);
    Route::resource('medecin',MedecinController::class)->except('show');
    Route::resource('patient',PatientController::class)->except('show');
    Route::resource('administrateur',AdminController::class)->except('show');
    Route::resource('typeconsultation',TypeConsultationController::class)->except('show');
    Route::resource('horaires',HoraireController::class);
    Route::resource('symptomes',SymptomController::class);
    Route::resource('maladies',MaladieController::class);
    Route::resource('maux',MalController::class);
    Route::resource('calendriers',CalendrierController::class);



    Route::get('medecins/{medecin}', [MedecinController::class, 'show'])->name('medecins.show');
    // Route::ressource('administrateur',AdminController::class)->except('show');
});
Route::post('horaireStore/{id}', [HoraireController::class,'store'])->name('horaireStore');


//Afficher les temoignage publier
Route::get('/admin/listeTemoignage', [adminTemoignages::class, 'listeTemoignage'])->name('admin.temoignage.temoignagepublier');
Route::get('/consultations', [ConsultationController::class, 'index'])->name('consultations.index');

//ROUTE POUR LE PATIENTS BACK_END
Route::prefix('patients')->name('patients.')->group(function () {
    Route::resource('temoignage',TemoignageControllers::class)->except('show');
    Route::resource('medecin',MedecinListeController::class)->except('show','create','store','update','edit','destroy');
    Route::resource('Dossier_medical',DossierMedicalController::class);

    // Route::resource('calendrier',calendrierControllers::class)->except('show');
});

//ROUTE POUR LE MEDECINS BACK_END
Route::prefix('medecins')->name('medecins.')->group(function () {
    // Route::resource('calendrier',calendrierControllers::class)->except('show');
    Route::resource('consultation', ConsultationController::class);
    Route::resource('patient', PatientsController::class)->except('show');
    Route::resource('monequipe', ListeMedecinsController::class)->except('show');
});

// routes pour l'authentification

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/emplois/create', [HoraireController::class ,'selectMedecinForm'])->name('admin.emplois.create');
Route::get('/admin/emplois/selectMedecin', [HoraireController::class ,'selectMedecin'])->name('admin.emplois.selectMedecin');




// LES ROUTES LIER AU RDV

Route::get('/rendezVous',[RdvController::class,'index'])->name('rendezVous');
Route::get('/rdvCreate',[RdvController::class,'create'])->name('rdvCreate');
Route::post('/ajouterRendezVous', [RdvController::class, 'ajouterRendezVous'])->name('ajouterRendezVous');
Route::post('/rdvStore',[RdvController::class,'store'])->name('rdvStore');
Route::get('/rdvEdit/{id}',[RdvController::class,'edit'])->name('rdvEdit');
Route::put('/rdvUpdate/{id}',[RdvController::class,'update'])->name('rdvUpdate');
Route::delete('/rdvDelete/{id}',[RdvController::class,'destroy'])->name('rdvDelete');
Route::get('/information-medecin/{id}', [RdvController::class,'getInformationsMedecin'])->name('InformationMedecin');


Route::get('/liste_rdv_patient',[RdvController::class,'liste_rdv_patient'])->name('liste_rdv_patient');
Route::get('/liste_rdv_medecin',[RdvController::class,'liste_rdv_medecin'])->name('liste_rdv_medecin');
Route::post('/accepter-rendez-vous/{id}', [RdvController::class, 'accepterRendezVous'])->name('accepter_rendez_vous');
Route::post('/annuler-rendez-vous/{id}', [RdvController::class, 'annulerRendezVous'])->name('annuler_rendez_vous');

Route::get('/recommandation-service', [RecommendationServiceController::class, 'AfficherForm'])->name('recommandation.service');
Route::post('/selectionService', [RecommendationServiceController::class, 'recommander'])->name('selectionService');
Route::get('/selection-symptomes', [RecommendationServiceController::class, 'showSelectionSymptomes'])->name('selectionSymptomes');
Route::get('/selection-maux', [RecommendationServiceController::class, 'showSelectionMaux'])->name('selectionMaux');
Route::get('/selection-maladies', [RecommendationServiceController::class, 'showSelectionMaladies'])->name('selectionMaladies');
Route::post('/recommander/serviceParSymptome', [RecommendationServiceController::class, 'recommander_servicePar_symptome'])->name('recommander_servicePar_symptome');
Route::post('/recommander/serviceParMaux', [RecommendationServiceController::class, 'recommander_servicePar_maux'])->name('recommander_servicePar_maux');
Route::post('/recommander/serviceParMaladie', [RecommendationServiceController::class, 'recommander_servicePar_maladie'])->name('recommander_servicePar_maladie');


Route::get('/rechercheService', [RdvController::class, 'rechercheService'])->name('rechercheService');
Route::get('/rechercheMedecin', [RdvController::class, 'rechercheMedecin'])->name('rechercheMedecin');
Route::get('/afficherMedecinsParService/{serviceId}', [RdvController::class, 'afficherMedecinsParService'])->name('afficherMedecinsParService');
Route::get('/rdvC', [RdvController::class, 'rdvC'])->name('rdvC');

Route::get('/disponibiliteMedecin/{medecinId}', [medecinController::class,'afficherDisponibiliteMedecin'])->name('disponibiliteMedecin');
Route::get('/connexionInscription', [RdvController::class, 'connexionInscription'])->name('connexionInscription');
Route::post('/patient/login', [patientsController::class, 'patientLogin'])->name('patientLogin');

Route::get('/choisirDate/{medecinId}', [RdvController::class, 'choisirDate'])->name('choisirDate');
Route::post('/choisirHeure', [RdvController::class, 'choisirHeure'])->name('choisirHeure');

Route::post('/nouveau_patient',[AuthController::class,'nouveauPatient'])->name('patients.nouveau_patient');
Route::get('/login_patient_view',[AuthController::class,'login_patient_view'])->name('patients.login_patient_view');
Route::post('/login_patient',[AuthController::class,'login_patient'])->name('patients.login_patient');

// Route::post('/afficher_detaille_medecin/{medecinId}',[MedecinController::class,'afficher_detaille_medecin'])->name('medecins.afficher_detaille_medecin_view');
Route::get('/login_medecin_view',[AuthController::class,'login_medecin_view'])->name('medecins.login_medecin_view');
Route::post('/login_medecin',[AuthController::class,'login_medecin'])->name('medecins.login_medecin');

Route::get('/dashboard_patient', [AuthController::class,'dashboard_patient_view'])->name('patients.dashboard_patient');
Route::get('/dashboard_medecin', [AuthController::class,'dashboard_medecin_view'])->name('medecins.dashboard_medecin');
Route::get('/confirmation-rdv_view', [RdvController::class,'confirmationRdv_view'])->name('confirmation_rdv_view');
Route::post('/confirmation-rdv', [RdvController::class,'confirmationRdv'])->name('confirmation_rdv');
Route::get('/verify-code', [AuthController::class,'verifyCodeView'])->name('patients.verify_code_view');
Route::post('/verify-code', [AuthController::class,'verifyCode'])->name('patients.verify_code');



require __DIR__.'/auth.php';
