<!-- medecins_par_service.blade.php -->
@extends('rdv.headerRdv')

@section('contenu')
<div class="container card" style="margin-top: 20px;width:70%">
    <div class="card-header p-3">
        <button onclick="window.history.back()" class="btn btn-outline-warning btn-sm float-start">Revenir à la page précédente</button>
        <h5 class="text-center">Profil Detaillé du Medecin </h5>
    </div>
    <div class="row" >
        <div class="col-md-6 card" >
            <!-- Avatar du médecin -->
            <div class="mb-4 border border-dark rounded p-1">
                <img src="{{ asset('avatars/' . $medecin->user->avatar) }}" alt="{{ $medecin->user->nom }}" class="w-100 img-fluid" style="height: 250px;">
            </div>


            <!-- Autres infos du médecin -->
            <div class="card-header border border-green rounded p-1"><h6>Informations personnelles </h6></div>
            <div class="card-footer bg-success text-white rounded">
                <p class="mb-0">Nom du médecin: {{ $medecin->user->nom }} {{ $medecin->user->prenom }}</p>
                <p class="mb-0">Spécialité: {{ $medecin->specialite }}</p>
                <p class="mb-0">service : {{ $medecin->service->nom }}</p>
                <p class="mb-0">Genre : {{ $medecin->user->genre }}</p>
                <p class="mb-0">Age  : {{ $medecin->user->age }}</p>
                <p class="mb-0">Adresse : {{ $medecin->user->adresse }}</p>
                <p class="mb-0">Telephone : {{ $medecin->user->telephone }}</p>
                <p class="mb-0">Email : {{ $medecin->user->email }}</p>
                <p class="mb-0">Statut : {{ $medecin->statut }}</p>
                <!-- Ajoutez ici d'autres informations du médecin si nécessaire -->
            </div>
        </div>

        <div class="col-md-6">
            <!-- Card Bootstrap pour les horaires de disponibilité -->
            <div class="card row">
                <div class="card-header text-center">
                    Horaires de disponibilité
                </div>
                <div class="card">
                    @if($horaires->lundi_debut && $horaires->lundi_fin)
                    <div class="card mb-3">
                        <div class="card-header text-center">
                            Lundi
                        </div>
                            <p style="text-align: center; font-weight:bold; ">{{ date('H:i', strtotime($horaires->lundi_debut)) }} - {{ date('H:i', strtotime($horaires->lundi_fin)) }}</p>
                    </div>
                    @endif
                    @if($horaires->mardi_debut && $horaires->mardi_fin)
                    <div class="card mb-3">
                        <div class="card-header text-center">
                            Mardi
                        </div>
                            <p style="text-align: center; font-weight:bold">{{ date('H:i', strtotime($horaires->mardi_debut)) }} - {{ date('H:i', strtotime($horaires->mardi_fin)) }}</p>
                    </div>
                    @endif
                    @if($horaires->mercredi_debut && $horaires->mercredi_fin)
                    <div class="card mb-3">
                        <div class="card-header text-center">
                            Mercredi
                        </div>
                            <p style="text-align: center; font-weight:bold">{{ date('H:i', strtotime($horaires->mercredi_debut)) }} - {{ date('H:i', strtotime($horaires->mercredi_fin)) }}</p>
                    </div>
                    @endif
                    @if($horaires->jeudi_debut && $horaires->jeudi_fin)
                    <div class="card mb-3">
                        <div class="card-header text-center">
                            Jeudi
                        </div>
                            <p style="text-align: center; font-weight:bold">{{ date('H:i', strtotime($horaires->jeudi_debut)) }} - {{ date('H:i', strtotime($horaires->jeudi_fin)) }}</p>
                    </div>
                    @endif
                    @if($horaires->vendredi_debut && $horaires->vendredi_fin)
                    <div class="card mb-3">
                        <div class="card-header text-center">
                            Vendredi
                        </div>
                            <p style="text-align: center; font-weight:bold">{{ date('H:i', strtotime($horaires->vendredi_debut)) }} - {{ date('H:i', strtotime($horaires->vendredi_fin)) }}</p>
                    </div>
                    @endif
                    @if($horaires->samedi_debut && $horaires->samedi_fin)
                    <div class="card mb-3">
                        <div class="card-header text-center">
                            Samedi
                        </div>
                            <p style="text-align: center; font-weight:bold">{{ date('H:i', strtotime($horaires->samedi_debut)) }} - {{ date('H:i', strtotime($horaires->samedi_fin)) }}</p>
                    </div>
                    @endif
                    @if($horaires->dimanche_debut && $horaires->dimanche_fin)
                    <div class="card mb-3">
                        <div class="card-header text-center">
                            Dimanche
                        </div>
                            <p style="text-align: center; font-weight:bold">{{ date('H:i', strtotime($horaires->dimanche_debut)) }} - {{ date('H:i', strtotime($horaires->dimanche_fin)) }}</p>
                    </div>
                    @endif

                    <!-- Répétez cette structure pour chaque jour de la semaine -->
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
