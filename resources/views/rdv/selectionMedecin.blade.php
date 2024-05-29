<!-- medecins_par_service.blade.php -->
@extends('rdv.headerRdv')

@section('contenu')
<div class="container card p-3" style="margin-top: 20px; width: 60%;">
    <div class="card mb-4">
        <h5 class="text-uppercase text-center mt-3">Médecins disponibles du service</h5>
    </div>

    <form action="{{ route('rechercheMedecin') }}" method="GET">
        @csrf
        <div class="form-group mb-3">
            <label for="rechercheMedecin">RECHERCHER <i class="fa fa-search"></i> :</label>
            <input type="text" id="rechercheMedecin" placeholder="Entrer le nom du médecin" name="rechercheMedecin" class="form-control">
        </div>

        <div class="form-group mb-3">
            <h6 class="text-uppercase">Listes des médecins du service : {{ $service->nom }}</h6>
        </div>

        <div class="" id="medecinList">
            @if(isset($message))
                <p class="text-danger">{{ $message }}</p>
            @else
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('logo/maldoctor2.svg') }}" alt="Logo du service" style="max-width: 100%; height: auto;">
                </div>
                <div class="col-md-7">
                    @foreach($medecins as $medecin)
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-10">
                            <a href="{{ route('choisirDate', ['medecinId' => $medecin->id]) }}" class="list-group-item list-group-item-action d-flex align-items-center">
                                <!-- Avatar du médecin -->
                                <div class="rounded-circle overflow-hidden me-3" style="width: 40px; height: 40px;">
                                    <img src="{{ asset('storage/' . $medecin->user->photo) }}" alt="{{ $medecin->user->nom }}" class="w-100 h-100 object-fit-cover">
                                </div>
                                <!-- Nom et spécialité du médecin -->
                                <div>
                                    <p class="mb-0" style="font-size: 12px; font-weight: bold;">{{ $medecin->user->nom }} {{ $medecin->user->prenom }}</p>
                                    <p class="mb-0" style="font-size: 10px;">{{ $medecin->specialite }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 d-flex justify-content-center">
                            <a href="{{ route('rdv.detail_medecin', ['medecinId' => $medecin->id]) }}" class="btn btn-outline-primary btn-sm" title="Afficher les détails">
                                <i class="fa fa-eye fs-22"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </form>
</div>

<!-- Inclure le fichier de script -->
@include('rdv/scripts')

@endsection

