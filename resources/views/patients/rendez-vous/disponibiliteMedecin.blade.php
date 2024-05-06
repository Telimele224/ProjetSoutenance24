@extends('en_tete.entete_patient')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <!-- Informations sur le médecin -->
                <div class="card">
                    <div class="card-header">
                        Informations sur le médecin
                    </div>
                    <div class="card-body">
                        <!-- Avatar et autres informations -->
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('avatars/' . $medecin->user->avatar) }}" alt="{{ $medecin->user->nom }}" class="rounded-circle me-3" style="width: 80px; height: 80px; object-fit: cover;">
                            <div>
                                <h5 class="card-title">{{ $medecin->user->nom }} {{ $medecin->user->prenom }}</h5>
                                <p class="card-text">{{ $medecin->specialite }}</p>
                                <!-- Ajoutez ici d'autres informations sur le médecin -->
                            </div>
                        </div>
                        <!-- Autres informations sur le médecin ici -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Emploi du temps du médecin -->
                <div class="card">
                    <div class="card-header">
                        Emploi du temps
                    </div>
                    <div class="card-body">
                        <!-- Utilisez une boucle pour afficher les jours et les horaires -->
                        @foreach($emploiDuTemps as $jour => $horaires)
                            <div class="card mb-3">
                                <div class="card-header">
                                    {{ $jour }}
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach($horaires as $horaire)
                                        <li class="list-group-item">{{ $horaire['heure_debut'] }} - {{ $horaire['heure_fin'] }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@extends('back_end.rdv.headerRdv')

@section('contenu')
<div class="container card" style="margin-top: 20px;width:50%">
    <div class="card-header">
        <h5 class="text-center">Médecins disponibles du service</h5>
    </div>

    <form action="{{ route('rechercheMedecin') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="rechercheMedecin">Rechercher un médecin par nom et prénom :</label>
            <input type="text" id="rechercheMedecin" name="rechercheMedecin" class="form-control">
        </div>

        <div class="form-group -mb-1 mt-1">
            <h6>Liste des médecins du service : {{ $service->nom }}</h6>
        </div>

        <div class="list-group service-list mt-2 mb-5" id="medecinList">
            @if($medecins->isEmpty())
                <p>Aucun médecin trouvé.</p>
            @else
                @foreach($medecins as $medecin)
                    <a href="{{ route('medecins.show', ['medecin' => $medecin->id]) }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px;">
                            <img src="{{ asset('avatars/' . $medecin->user->avatar) }}" alt="{{ $medecin->user->nom }}" class="w-100 h-100 object-fit-cover">
                        </div>
                        <div>
                            <p style="font-size: 18px; font-weight: bold; margin-bottom: 0;">{{ $medecin->user->nom }} {{ $medecin->user->prenom }}</p>
                            <p style="font-size: 14px; margin-bottom: 0;">{{ $medecin->specialite }}</p>
                        </div>
                        <a href="{{ route('medecins.show', ['medecin' => $medecin->id]) }}" class="ms-auto btn btn-sm btn-outline-primary">Détails</a>
                    </a>
                @endforeach
            @endif
        </div>
    </form>
</div>
@endsection



























{{-- <!-- disponibilites_medecin.blade.php -->
@extends('welcome')

@section('contenu')
<div class="container mt-5">
    <h5 class="mb-4 text-center">Finalisez votre Prise de Rendez-vous</h5>

    <div class="row">

        <!-- Colonne des dates -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info">
                    Sélection de date
                </div>
                <div class="card-body">

                    <form action="{{ route('ajouterRendezVous') }}" method="POST">
                         @csrf
                        <div class="row">
                            <input type="hidden" name="patientId" value="{{ $patientId }}">
                        <div class="mb-3 col-sm-6">
                            <label for="dateRdv" class="form-label">Sélectionnez une date</label>
                            <input type="date" class="form-control" id="dateRdv" name="dateRdv" onchange="updateDay()">
                            @error('dateRdv')<span class="badge badge-danger bg-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3 col-sm-6">
                            <label for="heure" class="form-label">Sélectionnez une heure</label>
                            <input type="time" class="form-control" id="heure" name="heure">
                            @error('heure')<span class="badge badge-danger bg-danger">{{ $message }}</span>@enderror

                        </div>
                       </div>
                        <div class="mb-3 ">
                            <label for="jour" class="form-label">Jour</label>
                            <input type="text" class="form-control" id="jour" name="jour" readonly>
                            @error('jour')<span class="badge badge-danger bg-danger">{{ $message }}</span>@enderror
                        </div>

                        @if(Session::has('success'))
                        <div id="successMessage" class="alert alert-success" style="height: 50px; margin-bottom: 15px">
                            {{ Session::get('success') }}
                        </div>
                        @elseif(Session::has('error'))
                        <div id="successMessage" class="alert alert-danger " style="height: 50px;margin-bottom:15px">
                        {{Session::get('error') }}
                        </div>

                        @endif

                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-info" type="submit">valider</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>


    </div>
</div>

<script>
    function updateDay() {
        // Récupérer la date sélectionnée
        var selectedDate = document.getElementById('dateRdv').value;

        // Créer un objet Date avec la date sélectionnée
        var dateObject = new Date(selectedDate);

        // Obtenir le jour de la semaine (en anglais)
        var dayOfWeek = dateObject.toLocaleDateString('fr', { weekday: 'long' });

        // Mettre à jour le champ "jour" avec le jour de la semaine
        document.getElementById('jour').value = dayOfWeek;
    }
       setTimeout(function() {
            $("#successMessage").fadeOut().empty();
       }, 10000);
</script>
@endsection --}}
