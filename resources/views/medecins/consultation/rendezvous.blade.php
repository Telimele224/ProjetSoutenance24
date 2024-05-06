@extends('en_tete.entete_medecin')

@section('contenu')

@if(session('success'))
    <div id="success-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-xxl-6">
        <div class="row card-header mb-0">
            <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4 mt-0">
                <h1 class="page-title">Listes des rendez vous</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><span><a href="{{route('medecins.consultation.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | Une consultation</a></span></li>
                    </ol>
                </div>
            </div>
        </div>
       <div class="row mt-0">
          <div class="card-body">

            <div class="table-responsive">
                <table class="table border-top table-bordered mb-0 text-nowrap">
                    <thead class="table-success">
                        <tr>
                            <th>Numero</th>
                            <th>Prenom et Nom</th>
                            <th>Telephone</th>
                            <th>Date et Heure</th>
                            <th>Status</th>
                            <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mesRendezVous as $k => $mrv)
                             @if (Auth::user()->id === $mrv->id_medecin)
                            <tr>
                                <td>{{ $k+1 }} </td>
                                <td>{{ $mrv->patient->user->prenom }} {{ $mrv->patient->user->nom }}</td>
                                <td>{{ $mrv->patient->telephone }}</td>
                                <td>{{ $mrv->dateRdv }} à {{ $mrv->heure }} </td>
                                <td>{{ $mrv->statut }}</td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       </div>
    </div>
 </div>
<!-- JavaScript pour afficher la fenêtre modale -->

<script>
    // Attendre 10 secondes (10000 millisecondes) avant de masquer le message de succès
    setTimeout(function(){
        $('#success-message').fadeOut();
    }, 5000);
</script>
@endsection
