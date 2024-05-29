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
            <form action="{{ route('medecins.ordonance.index') }}" method="GET" class="search-form">
                <div class="input-group col-xl-5 col-lg-4 col-md-4 col-sm-4 mb-4">
                  <div class="input-group-text">
                    <button type="submit"><i class="fa fa-search feather feather-search icon-md cursor-pointer"></i></button>
                  </div>
                  <input type="text"  name="search" class=" rounded-1  form-control" id="searchForm" placeholder="Cherche ici...| par numero de téléphone">
                </div>
              </form>
            {{-- <form action="{{ route('medecins.ordonance.index') }}" method="GET" class="mb-3">
                <div class="input-group row gy-4">
                    <div class="icon col-xl-5 col-lg-4 col-md-4 col-sm-4">
                        <input type="text" name="search" class=" rounded-3 form-control" placeholder="Rechercher par numéro de téléphone ou code">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary text-end"><i c></i></button>
                    </div>

                </div>
            </form> --}}

            <div class="table-responsive">
                <table class="table border-top table-bordered text-center mb-0 text-nowrap">
                    <thead class="table-success">
                        <tr>
                            <th>Numero</th>
                            <th>Nom Patient</th>
                            <th>N° Téléphone</th>
                            <th>Médicament</th>
                            <th>Posologie</th>
                            <th>Mode d'utilisation</th>

                            <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordonances as $k => $ordonance)
                            <tr>
                                <td>{{ $k + 1 }}</td>
                                <!-- Vérifiez si la ordonnance est liée à une consultation, un rdv et un patient -->
                                @if($ordonance->consultation && $ordonance->consultation->rdv && $ordonance->consultation->rdv->patient && $ordonance->consultation->rdv->patient->user)
                                    <td>{{ $ordonance->consultation->rdv->patient->user->prenom }}  {{ $ordonance->consultation->rdv->patient->user->nom }}</td>
                                @else
                                    <!-- Si l'ordonnance n'est pas liée à un patient -->
                                    <td colspan="2">Aucun patient associé</td>
                                @endif
                                <td>{{ $ordonance->consultation->rdv->patient->user->telephone }}</td>
                                <td>{{ $ordonance->name }}</td>
                                <td>{{ $ordonance->posologie }}</td>
                                <td>{{ $ordonance->mode_utilisation }}</td>
                                <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                                <td>
                                    <div class="avatar-list text-end">
                                        <span class="avatar rounded-circle bg-blue-priamry">
                                            <a href="{{route('medecins.ordonance.show',$ordonance) }}"><i class="fe fe-eye fs-15"></i></a>
                                        </span>
                                        <span class="avatar rounded-circle btn btn-info">
                                            <a href="{{route('medecins.ordonance.edit', ['ordonance' => $ordonance->id])}}" class="text-decoration-none text-default"><i class="fa fa-edit fs-15"></i></a>
                                        </span>
                                        <span class="avatar rounded-circle btn btn-dark">
                                            <a href="#" class="text-decoration-none text-default"><i class="icon icon-printer"></i></a>
                                        </span>
                                        <span class="avatar rounded-circle btn btn-secondary">
                                            <a href="" class="text-decoration-none text-default"><i class="fa fa-file-pdf-o fs-15"></i></a>
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

<script>
    // Attendre 5 secondes (5000 millisecondes) avant de masquer le message de succès
    setTimeout(function(){
        $('#success-message').fadeOut();
    }, 5000);
</script>
@endsection
