<?php


use App\Http\Controllers\admin\ActualiteControllers;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\adminTemoignages;
use App\Http\Controllers\admin\afficherImpression;
use App\Http\Controllers\admin\afficherImpressionMedecin;
use App\Http\Controllers\admin\afficherImpressionPatient;
use App\Http\Controllers\admin\afficherImprissionPersonnel;
use App\Http\Controllers\admin\CalendrierController;
use App\Http\Controllers\admin\GalerieController;
use App\Http\Controllers\admin\MedecinController;
use App\Http\Controllers\admin\PatientController;
use App\Http\Controllers\admin\PersonnelsController;
use App\Http\Controllers\admin\ServiceControllers;
use App\Http\Controllers\admin\TypeConsultationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Rdv\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front_end\MenuNavigation;
use App\Http\Controllers\Rdv\HoraireController;
use App\Http\Controllers\Rdv\MaladieController;
use App\Http\Controllers\Rdv\MalController;
use App\Http\Controllers\medecin\ConsultationController;
use App\Http\Controllers\medecin\ListeMedecinsController;
use App\Http\Controllers\medecin\PatientsController;
use App\Http\Controllers\medecin\ProfileMedecinController;
use App\Http\Controllers\patient\DossierMedicalController;
use App\Http\Controllers\patient\MedecinListeController;
use App\Http\Controllers\patient\ProfilePatientController;
use App\Http\Controllers\patient\TemoignageControllers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Rdv\RdvController;
use App\Http\Controllers\patient\RdvpatientController;
use App\Http\Controllers\Rdv\RecommendationServiceController;
use App\Http\Controllers\Rdv\SymptomController;
use App\Http\Requests\medecin\ConsultationRequest;
use App\Models\TypeConsultation;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\impression\AdminImpression;
use App\Http\Controllers\impression\MedecinImpression;
use App\Http\Controllers\impression\PatientImpression;
use App\Http\Controllers\impression\PersonnelImpression;
use App\Http\Controllers\medecin\OrdonnanceController;
use App\Http\Controllers\pdf\AdminPdf;
use App\Http\Controllers\pdf\MedecinPdf;
use App\Http\Controllers\pdf\Patientdf;
use App\Http\Controllers\pdf\Personnelpdf;
use App\Http\Controllers\PDFController;
use App\Models\Consultation;
use App\Models\Medecin;
use App\Models\Rdv;
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

// pour l'impression
Route::get('/export', [AdminImpression::class, 'export'])->name('export');
Route::get('/medecinimprime', [MedecinImpression::class, 'medecin'])->name('medecinimprime');
Route::get('/patientimprime', [PatientImpression::class, 'patient'])->name('patientimprime');
Route::get('/personnelimprime', [PersonnelImpression::class, 'personnel'])->name('personnelimprime');

Route::get('/afficher', [AdminPdf::class, 'afficher'])->name('afficher');
Route::get('/afficher', [MedecinPdf::class, 'afficher'])->name('afficher');



// pour le pdf
Route::get('/adminpdf', [AdminPdf::class, 'generatePDF'])->name('adminpfd.pdf');
Route::get('/medecinpdf', [MedecinPdf::class, 'medecin'])->name('medecinpdf.pdf');
Route::get('/patientpdf', [Patientdf::class, 'patient'])->name('patientpdf.pdf');
Route::get('/personnelpdf', [Personnelpdf::class, 'personnel'])->name('personnelpdf.pdf');


//Route pour la page contact
Route::post('/contact' , [MenuNavigation::class,'send'])->name('contact.send');
Route::get('/mesrendevous' , [ConsultationController::class,'listedesrendezvous'])->name('listerendezvous');



// ROUTE POUR FRONT END LES PAGES DE NAVIGATION
Route::get('/apropos',[MenuNavigation::class, 'apropos'])->name('apropos');
Route::get('/medecins',[MenuNavigation::class, 'medecins'])->name('medecins');
Route::get('/show',[MenuNavigation::class, 'essai'])->name('show');
Route::get('/contact',[MenuNavigation::class, 'contact'])->name('contact');
Route::get('/',[MenuNavigation::class, 'welcome'])->name('welcome');
Route::get('/les_departements',[MenuNavigation::class, 'departements'])->name('les_departements');
Route::get('/Blog', [MenuNavigation::class,'blog'])->name('Blog');
Route::get('/galerie', [MenuNavigation::class,'galerie'])->name('galerie');
Route::get('/Medecins', [MenuNavigation::class,'lien'])->name('Medecins');
Route::get('/home',[HomeController::class, 'redirect'])->middleware(['auth', 'verified'])->name('home');



Route::get('consultations/{id}/pdf', [ConsultationController::class, 'generatePDF'])->name('consultations.pdf');
Route::get('consultations/{id}/pdf', [DossierMedicalController::class, 'generatePDF1'])->name('consultation.pdf');

// ROUTE POUR L'ADMINISTRATEUR BACK_END
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('service',ServiceControllers::class);
    Route::resource('usersPdf',afficherImpression::class);
    Route::resource('medecinpdf',afficherImpressionMedecin::class);
    Route::resource('patientpdf',afficherImpressionPatient::class);
    Route::resource('personnelpdf',afficherImprissionPersonnel::class);
    Route::resource('actualite',ActualiteControllers::class);
    Route::resource('temoignage',adminTemoignages::class)->except('show');
    Route::resource('medecin',adminTemoignages::class)->except('show');
    Route::resource('galerie',GalerieController::class);
    Route::resource('medecin',MedecinController::class)->except('show');
    Route::resource('patient',PatientController::class)->except('show');
    Route::resource('administrateur',AdminController::class)->except('show');
    Route::resource('personnel',PersonnelsController::class);
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
// Route::get('/consultations', [ConsultationController::class, 'index'])->name('consultations.index');

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
    Route::resource('ordonance',OrdonnanceController::class);
    Route::get('medecins/consultation/rendezvous', [RdvController::class, 'mesRendezVous'])->name('mesrendezvous');
});
// Route::get('/medecins/consultation/getPatientsByDate', [ConsultationController::class, 'getPatientsByDate'])->name('medecins.consultation.getPatientsByDate');


Route::middleware('auth')->group(function () {
    Route::get('/profilee', [ProfileMedecinController::class, 'edit'])->name('profilee.edit');
    Route::patch('/profilee', [ProfileMedecinController::class, 'update'])->name('profilee.update');
    Route::delete('/profilee', [ProfileMedecinController::class, 'destroy'])->name('profilee.destroy');
});
//ROute pour le profile du patient
Route::middleware('auth')->group(function () {
    Route::get('/profilepatient', [ProfilePatientController::class, 'edit'])->name('profilepatient.edit');
    Route::patch('/profilepatient', [ProfilePatientController::class, 'update'])->name('profilepatient.update');
    Route::delete('/profilepatient', [ProfilePatientController::class, 'destroy'])->name('profilepatient.destroy');
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
Route::get('/rdvdetail_medecin/{medecinId}', [RdvController::class, 'detail_medecin'])->name('rdv.detail_medecin');
Route::get('/services/{serviceId}/details', [RdvController::class, 'detail_service'])->name('detailService');
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
Route::get('/confirmation-rdv_view', [RdvController::class,'confirmationRdv_view'])->middleware('auth')->name('confirmation_rdv_view');
Route::post('/confirmation-rdv', [RdvController::class,'confirmationRdv'])->name('confirmation_rdv');
Route::get('/verify-code', [AuthController::class,'verifyCodeView'])->name('patients.verify_code_view');
Route::post('/verify-code', [AuthController::class,'verifyCode'])->name('patients.verify_code');



//rendez-vous patient

Route::get('/recommandation-service_patient', [RdvpatientController::class, 'AfficherForm'])->name('recommandation.service_patient');
Route::post('/selectionService_patient', [RdvpatientController::class, 'recommander'])->name('selectionService_patient');
Route::get('/selection-symptomes_patient', [RdvpatientController::class, 'showSelectionSymptomes'])->name('selectionSymptomes_patient');
Route::get('/selection-maux_patient', [RdvpatientController::class, 'showSelectionMaux'])->name('selectionMaux_patient');
Route::get('/selection-maladies_patient', [RdvpatientController::class, 'showSelectionMaladies'])->name('selectionMaladies_patient');
Route::post('/recommander/serviceParSymptome_patient', [RdvpatientController::class, 'recommander_servicePar_symptome'])->name('recommander_servicePar_symptome_patient');
Route::post('/recommander/serviceParMaux_patient', [RdvpatientController::class, 'recommander_servicePar_maux'])->name('recommander_servicePar_maux_patient');
Route::post('/recommander/serviceParMaladie_patient', [RdvpatientController::class, 'recommander_servicePar_maladie'])->name('recommander_servicePar_maladie_patient');

Route::get('/afficherMedecinsParService_patient/{serviceId}', [RdvpatientController::class, 'afficherMedecinsParService'])->name('afficherMedecinsParService_patient');
Route::get('/choisirDate_patient/{medecinId}', [RdvpatientController::class, 'choisirDate'])->name('choisirDate_patient');
Route::post('/choisirHeure_patient', [RdvpatientController::class, 'choisirHeure'])->name('choisirHeure_patient');
Route::get('/confirmation-rdv_view_patient', [RdvpatientController::class,'confirmationRdv_view'])->name('confirmation_rdv_view_patient');
Route::post('/confirmation-rdv_patient', [RdvpatientController::class,'confirmationRdv'])->name('confirmation_rdv_patient');
Route::post('/ajouterRendezVous_patient', [RdvpatientController::class, 'ajouterRendezVous'])->name('ajouterRendezVous_patient');

require __DIR__.'/auth.php';
