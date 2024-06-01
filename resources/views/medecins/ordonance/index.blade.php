@extends('en_tete.entete_medecin')

@section('contenu')

@if(session('success'))
    <div id="success-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-xxl-12">
        <div class="row card-header">
            <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4 mt-0">
                <h1 class="page-title">Listes des Ordonnances</h1>
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
                        <input type="text" name="search" class="rounded-1 form-control" id="searchForm" placeholder="Cherche ici...| par numero de téléphone">
                    </div>
                </form>

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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordonances->groupBy('consultation_id') as $consultationId => $ordonancesByConsultation)
                                @php
                                    $consultation = $ordonancesByConsultation->first()->consultation;
                                    $patient = $consultation->rdv->patient->user;
                                @endphp
                                @foreach ($ordonancesByConsultation as $index => $ordonance)
                                    <tr>
                                        @if($index === 0)
                                            <td rowspan="{{ $ordonancesByConsultation->count() }}">{{ $loop->parent->iteration }}</td>
                                            <td rowspan="{{ $ordonancesByConsultation->count() }}">{{ $patient->prenom }} {{ $patient->nom }}</td>
                                            <td rowspan="{{ $ordonancesByConsultation->count() }}">{{ $patient->telephone }}</td>
                                        @endif
                                        <td>{{ $ordonance->name }}</td>
                                        <td>{{ $ordonance->posologie }}</td>
                                        <td>{{ $ordonance->mode_utilisation }}</td>
                                        @if($index === 0)
                                            <td rowspan="{{ $ordonancesByConsultation->count() }}">
                                                <div class="avatar-list text-end">
                                                    <span class="avatar rounded-circle bg-blue-priamry">
                                                        <a href="{{ route('medecins.ordonance.show', $ordonance) }}"><i class="fe fe-eye fs-15"></i></a>
                                                    </span>
                                                    <span class="avatar rounded-circle btn btn-info">
                                                        <a href="{{ route('medecins.Ordonanceconsultation.edit', ['consultationId' => $consultationId]) }}" class="text-decoration-none text-default"><i class="fa fa-edit fs-15"></i></a>
                                                    </span>
                                                    <span class="avatar rounded-circle btn btn-secondary">
                                                        <a href="{{ route('medecinspdf.ordonanceShow', ['consultationId' => $consultationId])}}" class="text-decoration-none text-default">
                                                            <i class="fa fa-file-pdf-o fs-15"></i>
                                                        </a>
                                                    </span>

                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $ordonances->links() }}
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
