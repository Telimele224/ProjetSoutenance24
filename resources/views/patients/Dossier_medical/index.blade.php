@extends('en_tete.entete_patient')

@section('contenu')
<div class="container">
    <h1>Liste des Consultations et Ordonnances</h1>
    <div class="tab-pane active show" id="tab-11" role="tabpanel">
        <div class="card">
            <div class="card-header border-bottom-0 px-5">
                <h2 class="card-title"></h2>
                <div class="page-options ms-auto">
                    <a href="#" class="btn btn-primary"><i class="bi bi-arrow-down-circle"></i>&nbsp;&nbsp;&nbsp; Impression | Pdf | Excel</a>
                </div>
            </div>
            <div class="e-table px-5 pb-5">
                <div class="table-responsive table-lg">
                    <table class="table border-top table-bordered mb-0 text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Motif</th>
                                <th>Type de Consultation</th>
                                {{-- <th>Résultat</th>
                                <th>Examen Complémentaire</th> --}}
                                <th>Suivi Recommandé</th>
                                <th>Status</th>
                                <th>Medecin</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consultations as $consultation)
                                <tr class="user-list">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $consultation->motif }}</td>
                                    <td>{{ $consultation->typeConsultation->name ?? 'N/A' }}</td>
                                    {{-- <td>{{ $consultation->resultat }}</td>
                                    <td>{{ $consultation->examen_complementaire }}</td> --}}
                                    <td>{{ $consultation->suivi_recommande }}</td>
                                    <td>{{ $consultation->status }}</td>
                                    <td>{{ $consultation->rdv->medecin->user->nom}} {{ $consultation->rdv->medecin->user->prenom}} </td>
                                    <td>
                                        <div class="avatar-list text-end">
                                            <span class="avatar rounded-circle bg-blue-dark">
                                                <a href="{{route('dossier_medical.consultation.show',$consultation) }}"><i class="fe fe-eye fs-15"></i></a>
                                            </span>
                                            <span class="avatar rounded-circle bg-info">
                                                <a href="{{ route('ordonance.create', ['consultation_id' => $consultation->id] ) }}" class="text-decoration-none text-default"><i class="fa fa-file-pdf-o fs-15 text-white "></i></a>
                                            </span>

                                        </div>
                                    </td>
                                </tr>
                                @foreach($consultation->ordonnances as $ordonnance)
                                    <tr class="user-list">
                                        <!-- Afficher les détails de l'ordonnance -->
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
