@extends('en_tete.entete_medecin')

@section('title', 'Détails de l\'ordonnance')

@section('contenu')
<div class="car">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                          INFORMATION PATIENT :
                        </font></font></div>
                    </div>

                    <div class="card-body">
                        <div class="p-5">
                            <div class=" card-header row gy-4">
                                <div class="col-xl-3 col-lg-5 col-md-6 col-sm-12">
                                    <h4><strong class="text-uppercase">Nom:</strong> {{ $patient->nom }}</h4>
                                </div>
                                <div class="col-xl-3 col-lg-5 col-md-6 col-sm-12">
                                    <h4><strong class="text-uppercase">Prénom:</strong> {{ $patient->prenom }}</h4>
                                </div>
                                <div class="col-xl-3 col-lg-5 col-md-6 col-sm-12">
                                    <h4><strong class="text-uppercase">Âge:</strong> {{ $patient->age }}</h4>
                                </div>
                                <div class="col-xl-3 col-lg-5 col-md-6 col-sm-12">
                                    <h4><strong class="text-uppercase">Poids:</strong> {{ $patient->patient->poids }}</h4>
                                </div>
                                <div class="col-xl-3 col-lg-5 col-md-6 col-sm-12">
                                    <h4><strong class="text-uppercase">Téléphone:</strong> {{ $patient->telephone }}</h4>
                                </div>
                            </div>
                            <div class="card-header mt-3">
                                <div class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                  PRESCRIPTIONS :
                                </font></font></div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <h4 class="hidden"><strong class="text-uppercase">Consultation associée:</strong>   {{ $ordonance->consultation->id }}</h4>
                            </div>
                            <div class="row gy-4">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <h4><strong class="text-uppercase">Nom du médicament:</strong>   {{ $ordonance->name }}</h4>
                                 </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <h4><strong class="text-uppercase">Posologie:</strong>  {{ $ordonance->posologie }}</h4>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <h4><strong class="text-uppercase">Mode d'utilisation:</strong>  {{ $ordonance->mode_utilisation }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-header mt-3">
                            <div class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                             
                            </font></font></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('medecins.ordonance.index') }}" class="btn btn-primary">Retour</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- <div class="card">
    <div class="card-body">
        <h6 class="card-title">Informations du patient:</h6>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nom:</strong> {{ $patient->nom }}</p>
                <p><strong>Prénom:</strong> {{ $patient->prenom }}</p>
                <p><strong>Prénom:</strong> {{ $patient->poids }}</p>
                <p><strong>Âge:</strong> {{ $patient->age }}</p>
                <p><strong>Âge:</strong> {{ $patient->telephone }}</p>
                <!-- Ajoutez d'autres détails du patient selon vos besoins -->
            </div>
        </div>
        <hr>
        <h6 class="card-title">Détails de l'ordonnance:</h6>
        <div class="row">
            <div class="col-md-6">
                <p class="hidden"><strong>Consultation associée:</strong> {{ $ordonance->consultation->id }}</p>
                <p><strong>Nom du médicament:</strong> {{ $ordonance->name }}</p>
                <p><strong>Posologie:</strong> {{ $ordonance->posologie }}</p>
                <p><strong>Mode d'utilisation:</strong> {{ $ordonance->mode_utilisation }}</p>
                <!-- Ajoutez d'autres détails de l'ordonnance selon vos besoins -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('medecins.ordonance.index') }}" class="btn btn-primary">Retour</a>
            </div>
        </div>
    </div>
</div> --}}
@endsection
