<!-- medecins_par_service.blade.php -->
@extends('rdv.headerRdv')

@section('contenu')
<div class="container card p-3" style="margin-top: 20px;width:60% ;">
    <div class="card">
        <h5 class="text-uppercase text-center">Médecins disponible du service</h5>
    </div>

    <form action="{{ route('rechercheMedecin') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="rechercheMedecin ">RECHERCHER <i class="fa fa-search"></i> :</label>
            <input type="text" id="rechercheMedecin" placeholder="Entrer le nom du medecin" name="rechercheMedecin" class="form-control">
        </div>

        <div class="form-group -mb-1 mt-1">
            <h6 class="text-uppercase">Liste des médecins du service : {{ $service->nom }}</h6>
        </div>

        <div class="list-group service-list mt-2 mb-5" id="medecinList">
            @if(isset($message))
                 <p>{{ $message }}</p>
            @else
                @foreach($medecins as $medecin)
                <div class="row ">
                    <div class="col-md-10">
                       <a href="{{ route('choisirDate', ['medecinId' => $medecin->id]) }}" class="list-group-item list-group-item-action d-flex align-items-center">

                        <!-- Avatar du médecin -->

                            <div class="rounded-circle overflow-hidden me-2" style="width: 60px; height: 60px;">
                                <img src="{{ asset('storage/' . $medecin->user->photo) }}" alt="{{ $medecin->user->nom }}" class="w-100 h-100 object-fit-cover">
                            </div>


                        <!-- Nom et spécialité du médecin -->
                        <div>
                            <p style="font-size: 18px; font-weight: bold; margin-bottom: 0;">{{ $medecin->user->nom }} {{ $medecin->user->prenom }}</p>
                            <p style="font-size: 14px; margin-bottom: 0;">{{ $medecin->specialite }}</p>
                        </div>

                        <!-- Bouton "Afficher les détails" avec l'icône eye -->

                       </a>
                    </div>
                    <div class="col-md-2 card">
                        <a href="{{ route('rdv.detail_medecin', ['medecinId' => $medecin->id]) }}" class="btn btn-outline-primary" title="Afficher les détails">
                            <i class="fa fa-eye fs-25 "></i>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </form>
</div>





<!-- Inclure le fichier de script -->
@include('rdv/scripts')


@endsection
