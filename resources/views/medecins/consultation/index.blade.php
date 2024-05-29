@extends('en_tete.entete_medecin')

@section('contenu')

@if(session('success'))
    <div id="success-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="row row-cards">
    <div class="col-xl-12">
        <div class="card p-0">
            <div class="card-body p-4">
                <div class="row align-items-center justify-content-around">
                    <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4">
                        <ul class="nav item2-gl-menu float-end my-2" role="tablist">
                            <li class="border-end"><a href="#tab-11" class="show active" data-bs-toggle="tab" title="List style" aria-selected="true" role="tab"><i class="fa fa-list"></i></a></li>
                            <li><a href="#tab-12" data-bs-toggle="tab" class="" title="Grid" aria-selected="false" role="tab" tabindex="-1"><i class="fa fa-th"></i></a></li>
                            <ol class="breadcrumbn gap-3 ml-3 ">
                                <li class="breadcrumb-item"><span><a href="{{route('medecins.consultation.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | patient</a></span></li>
                            </ol>
                        </ul>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <div class="tab-content mb-5">
        <div class="tab-pane active show" id="tab-11" role="tabpanel">
            <div class="card">
                <div class="e-table px-5 pb-5">
                    <div class="table-responsive table-lg">
                        <table class="table border-top table-bordered text-center mb-0 text-nowrap">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Prenom et Nom</th>
                                    <th>N° Téléphone</th>
                                    <th>Motif</th>
                                    <th>Type Consultation</th>
                                    <th>Status</th>
                                    <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody >
                                @foreach ($consultations as $k => $consultation)
                                    {{-- @if (Auth::user()->id === $consultation->id_medecin) --}}
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $consultation->rdv->patient->user->prenom }}  {{ $consultation->rdv->patient->user->nom }}</td>
                                            <td>{{$consultation->rdv->patient->user->telephone }}</td>
                                            <td>{{$consultation->motif}}</td>
                                            <td>{{ $consultation->typeConsultation->name }}</td>
                                            <td>{{ $consultation->status }}</td>

                                            <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                                            <td>
                                                <div class="avatar-list text-end">
                                                    <span class="avatar rounded-circle bg-blue-dark">
                                                        <a href="{{route('medecins.consultation.show',$consultation) }}"><i class="fe fe-eye fs-15"></i></a>
                                                    </span>
                                                    <span class="avatar rounded-circle bg-blue">
                                                        <a href="{{route('medecins.consultation.edit',$consultation) }}" class="text-decoration-none text-default"><i class="fa fa-edit fs-15 text-white"></i></a>
                                                    </span>
                                                    <span class="avatar rounded-circle bg-info">
                                                        <a href="{{ route('ordonance.create', ['consultation_id' => $consultation->id] ) }}" class="text-decoration-none text-default"><i class="fa fa-folder-open-o fs-15 text-white "></i></a>
                                                    </span>

                                                </div>
                                            </td>
                                        </tr>
                                    {{-- @endif --}}
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <!-- COL-END -->
        </div>
    </div>
</div>
<script>
    // Attendre 10 secondes (10000 millisecondes) avant de masquer le message de succès
    setTimeout(function(){
        $('#success-message').fadeOut();
    }, 5000);
</script>
@endsection
