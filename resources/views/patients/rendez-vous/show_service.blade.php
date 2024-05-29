@extends('en_tete.entete_patient')

@section('contenu')
<div class="container-fluid card" style="margin-top: 20px;width:70%">
    <div class=" card row " >
        <div class="col-sm-4">
            <button onclick="window.history.back()" class="btn btn-outline-primary mt-2 float-start"><i class="fa fa-arrow-left"></i></button>
        </div>
        <div class="col-sm-12">
                <p class=" text-center bolder">VEUILEZ SELECTIONNER UN MAUX OU DES MAUX  :</p>
        </div>
    </div>
    {{-- <button onclick="window.history.back()" class="btn btn-outline-warning btn-sm float-start">Revenir à la page précédente</button> --}}
    <div class="card p-3">

        <div class="mb-4 d-flex align-items-center ">
                <div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px;">
                    <img src="{{ asset('storage/' . $service->avatar) }}" alt="{{ $service->nom }}" class="w-100 h-100 object-fit-cover" >
                </div>
            <h5 class="mb-0 text-center text-uppercase">{{ $service->nom }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 card">
            <!-- Logo et nom du service -->

            <!-- Photo du service -->
            <div class="mb-4   p-1" style="height: 200px;">
                <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->nom }}" class="w-100 mt-2 img-fluid" style="height: 200px;">
            </div>

            <!-- Description du service -->
        </div>
        <div class="col-md-6">
            <!-- Card Bootstrap pour les médecins associés -->
            <div class="card row">
                <div class="card-header text-uppercase">
                    Médecins associés
                </div>
                <div class="card-body">
                    @if($medecins->isEmpty())
                        <p class="text-center">Aucun médecin trouvé pour ce service.</p>
                    @else
                        @foreach($medecins as $medecin)
                            <div class="card mb-3">
                                <div class="card-header text-center">
                                    <div class="rounded-circle overflow-hidden me-2" style="width: 30px; height: 30px;">
                                        <img src="{{ asset('storage/' . $medecin->user->photo) }}" alt="{{ $medecin->user->nom }}" class="w-100 h-100 object-fit-cover">
                                    </div>
                                    {{ $medecin->user->nom }} {{ $medecin->user->prenom }}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
            <h6 class="text-uppercase">Description du service</h6>
        <div class="card p-4">
            <textarea class="mb-0  " style="border: none;" disabled>{{ $service->description }} </textarea>
        </div>
    </div>
</div>
@endsection
