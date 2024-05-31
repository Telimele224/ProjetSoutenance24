@extends('en_tete.entete_medecin')

@section('title', 'Détails de l\'ordonnance')

@section('contenu')
<div class="car">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">INFORMATION PATIENT :</div>
                    </div>

                    <div class="card-body">
                        <div class="p-5">
                            <div class="card-header row gy-4">
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
                                <div class="card-title">PRESCRIPTIONS :</div>
                            </div>
                            <!-- Afficher toutes les ordonnances de la consultation -->
                            @foreach($ordonances as $ordonance)
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
                            @endforeach
                        </div>
                        <div class="card-header mt-3">
                            <div class="card-title"></div>
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
@endsection
