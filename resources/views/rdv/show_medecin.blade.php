<!-- medecins_par_service.blade.php -->
@extends('rdv.headerRdv')

@section('contenu')
<div class="container card" style="margin-top: 20px;width:70%">
    <div class=" card row " >
        <div class="col-sm-4">
            <button onclick="window.history.back()" class="btn btn-outline-primary mt-2 float-start"><i class="fa fa-arrow-left"></i></button>
        </div>
        <div class="col-sm-12">
                <h4 class=" text-center bolder text-uppercase">Profil détaillé du médecin </h4>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-6 card" >
            <!-- Avatar du médecin -->
            <div class=" align-item-center rounded-circle border overflow-hidden me-2 mt-4 mb-4" style="width: 200px; height: 200px;">
                <img src="{{ asset('avatars/' . $medecin->user->avatar) }}" alt="{{ $medecin->user->name }}" class="w-100 img-fluid border-radus-20" style="height: 500px;">
            </div>
            <!-- Autres infos du médecin -->
            <div class="card-header border border-green text-uppercase p-1"><h6>Informations personnelles </h6></div>
            <div class="card ">

                <p class="mb-0"><span class="text-uppercase" style="font-weight: bolder; text: uppercase">Nom du médecin : </span>{{ $medecin->user->nom }} {{ $medecin->user->prenom }}</p>
                <p class="mb-0"><span class="text-uppercase" style="font-weight: bolder; text: uppercase">Spécialité : </span>{{ $medecin->specialite }}</p>
                <p class="mb-0"><span class="text-uppercase" style="font-weight: bolder; text: uppercase">Service : </span> {{ $medecin->service->nom }}</p>
                <p class="mb-0"><span class="text-uppercase" style="font-weight: bolder; text: uppercase">Genre : </span>{{ $medecin->user->genre }}</p>
                <p class="mb-0"><span class="text-uppercase" style="font-weight: bolder; text: uppercase">âge : </span>{{ $medecin->user->age }}</p>
                <p class="mb-0"><span class="text-uppercase" style="font-weight: bolder; text: uppercase">Adresse : </span> {{ $medecin->user->adresse }}</p>
                <p class="mb-0"><span class="text-uppercase" style="font-weight: bolder; text: uppercase">Téléphone : </span>{{ $medecin->user->telephone }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Horaires de disponibilité
                </div>
                <div class="row">
                    @if(!empty($horair->lundi_debut) && !empty($horair->lundi_fin))
                        <div class="card col-md-5 ms-4 mb-3">
                            <div class="card-header text-center">
                                Lundi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->lundi_debut)) }} - {{ date('H:i', strtotime($horair->lundi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->mardi_debut) && !empty($horair->mardi_fin))
                        <div class="card col-md-5 ms-4 mb-3">
                            <div class="card-header text-center">
                                Mardi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->mardi_debut)) }} - {{ date('H:i', strtotime($horair->mardi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->mercredi_debut) && !empty($horair->mercredi_fin))
                        <div class="card col-md-5 ms-4 mb-3">
                            <div class="card-header text-center">
                                Mercredi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->mercredi_debut)) }} - {{ date('H:i', strtotime($horair->mercredi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->jeudi_debut) && !empty($horair->jeudi_fin))
                        <div class="card col-md-5 ms-4 mb-3">
                            <div class="card-header text-center">
                                Jeudi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->jeudi_debut)) }} - {{ date('H:i', strtotime($horair->jeudi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->vendredi_debut) && !empty($horair->vendredi_fin))
                        <div class="card col-md-5 ms-4 mb-3">
                            <div class="card-header text-center">
                                Vendredi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->vendredi_debut)) }} - {{ date('H:i', strtotime($horair->vendredi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->samedi_debut) && !empty($horair->samedi_fin))
                        <div class="card col-md-5 ms-4 mb-3">
                            <div class="card-header text-center">
                                Samedi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->samedi_debut)) }} - {{ date('H:i', strtotime($horair->samedi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->dimanche_debut) && !empty($horair->dimanche_fin))
                        <div class="card col-md-5 ms-4 mb-3">
                            <div class="card-header text-center">
                                Dimanche
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->dimanche_debut)) }} - {{ date('H:i', strtotime($horair->dimanche_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                </div>
            </div>
        </div>



    </div>
</div>

@endsection
