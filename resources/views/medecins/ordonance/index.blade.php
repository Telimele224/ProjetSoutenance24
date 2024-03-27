@extends('en_tete.entete_medecin')

@section('contenu')

@if(session('success'))
    <div id="success-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-xxl-6">
        <div class="row card-header ">
            <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4 mt-0">
                <h1 class="page-title">Listes des Ordonances</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><span><a href="{{route('medecins.ordonance.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | Ordonance</a></span></li>
                    </ol>
                </div>
            </div>
        </div>
       <div class="row">
          <div class="card-body">
            <!-- Formulaire de recherche -->
            <form action="{{ route('medecins.ordonance.index') }}" method="GET" class="mb-3">
                <div class="input-group row">
                    <div class="col-md-10">
                        <input type="text" name="search" class="form-control" placeholder="Rechercher par numéro de téléphone ou code">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary text-end">Rechercher</button>
                    </div>

                </div>
            </form>

            <div class="table-responsive">
                <table class="table border-top table-bordered mb-0 text-nowrap">
                    <thead class="table-success">
                        <tr>
                            <th>Numero</th>
                            <th>Nom Patient</th>
                            <th>Type Consultation</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Frais</th>
                            <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordonances as $k => $ordonance)
                            <tr>
                                <td>{{ $k + 1 }}</td>
                                {{-- @if($ordonance->patient) <!-- Vérifiez si la ordonance est liée à un patient -->
                                <td>{{ $ordonance->patient->user->prenom }}  {{ $ordonance->patient->user->nom }}</td>
                                @else --}}
                                    {{-- <td colspan="2">Aucun patient associé</td> <!-- Si la ordonance n'est pas liée à un patient -->
                                @endif
                                <td>{{ $ordonance->typeordonance->name }}</td> --}}
                                {{-- <td>{{ $ordonance->code }}</td> --}}
                                {{-- <td>{{ $ordonance->status }}</td>
                                <td>{{ $ordonance->frais }}</td> --}}
                                <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                                <td>
                                    <div class="avatar-list text-end">
                                        <span class="avatar rounded-circle bg-blue-dark">
                                            <a href=""><i class="fe fe-eye fs-15"></i></a>
                                        </span>
                                        <span class="avatar rounded-circle bg-blue">
                                            <a href="" class="text-decoration-none text-default"><i class="fa fa-edit fs-15"></i></a>
                                        </span>
                                        <span class="avatar rounded-circle bg-blue">
                                            <a href="" class="text-decoration-none text-default"><i class="fa fa-edit fs-15"></i></a>
                                        </span>

                                    </div>
                                </td>
                            </tr>
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
