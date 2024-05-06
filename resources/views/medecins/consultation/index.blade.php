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
                        <li class="breadcrumb-item"><span><a href="{{route('medecins.consultation.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | Consultation</a></span></li>
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
                            <th>N°</th>
                            <th>Prenom et Nom</th>
                            <th>Type Consultation</th>
                            <th>Status</th>
                            <th>Frais</th>
                            <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultations as $k => $consultation)
                            <tr>
                                <td>{{ $k + 1 }}</td>
                                <td>{{ $consultation->rdv->patient->user->prenom }}  {{ $consultation->rdv->patient->user->nom }}</td>
                                <td>{{ $consultation->typeConsultation->name }}</td>
                                <td>{{ $consultation->status }}</td>
                                <td>{{ $consultation->frais }}</td>
                                <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                                <td>
                                    <div class="avatar-list text-end">
                                        <span class="avatar rounded-circle bg-blue-dark">
                                            <a href="{{route('medecins.consultation.show',$consultation) }}"><i class="fe fe-eye fs-15"></i></a>
                                        </span>
                                        <span class="avatar rounded-circle bg-blue">
                                            <a href="{{route('medecins.consultation.edit',$consultation) }}" class="text-decoration-none text-default"><i class="fa fa-edit fs-15 text-white"></i></a>
                                        </span>
                                        <span class="avatar rounded-circle bg-red">
                                            <a href="{{ route('consultation.pdf', $consultation->id) }}" class="text-decoration-none text-default"><i class="fa fa-trash fs-15 text-white "></i></a>
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
