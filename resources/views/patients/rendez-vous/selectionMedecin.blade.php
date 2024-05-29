<!-- medecins_par_service.blade.php -->
@extends('en_tete.entete_patient')

@section('contenu')
<div class="container card p-3" style="margin-top: 5px; width: 90%;">
    <div class="card mb-4">
        <h5 class="text-uppercase text-center mt-3">Médecins disponibles du service</h5>
    </div>

    <form action="{{ route('rechercheMedecin') }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-md-12 allign-item-center ">
                <div class="input-group">
                    <div class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search icon-md cursor-pointer"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <input type="text" id="rechercheService" placeholder="Rechercher un medecin ici ..." name="rechercheService" class="form-control rounded-1">
                </div>
            </div>
        </div>
        <div  id="medecinList">
            {{-- @if(isset($message))
                <p class="text-danger">{{ $message }}</p>
            @else --}}
            <div class="card p-4 mt-3">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('logo/maldoctor2.svg') }}" alt="Logo du service" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-7">

                         @if(isset($message))
                            <div class="bg-secondary rounded-4 p-4 opacity-3">
                                <p class=" text-center text-white">{{ $message }}</p>
                            </div>
                         @else
                         
                        @foreach($medecins as $medecin)
                        <div class="row mb-3 align-items-center">
                            <div class="col-md-10">
                                <a href="{{ route('choisirDate_patient', ['medecinId' => $medecin->id]) }}" class="list-group-item list-group-item-action d-flex align-items-center">
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
                                <a href="{{ route('rdv.detail_medecin_patient', ['medecinId' => $medecin->id]) }}" class="btn btn-outline-primary btn-sm" title="Afficher les détails">
                                    <i class="fa fa-eye fs-22"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @endif
        </div>
    </form>
</div>

<!-- Inclure le fichier de script -->
@include('rdv/scripts')

@endsection

