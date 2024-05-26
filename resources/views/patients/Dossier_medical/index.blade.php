@extends('en_tete.entete_patient')

@section('contenu')

<div class="container">
    <h1>Liste des Consultations et Ordonnances</h1>
    <div class="tab-pane active show" id="tab-11" role="tabpanel">
        <div class="card">
            <div class="card-header border-bottom-0 px-5">
                <h2 class="card-title"></h2>
                <div class="page-options ms-auto">
                    <a href="http://127.0.0.1:8000/admin/medecinpdf" class="btn btn-primary"><i class="bi bi-arrow-down-circle"></i>&nbsp;&nbsp;&nbsp; Impression | Pdf | Excel</a>
                </div>
            </div>
            <div class="e-table px-5 pb-5">
                <div class="table-responsive table-lg">
                    <table class="table border-top table-bordered mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Motif</th>
                                <th>Résultat</th>
                                <th>Examen Comp...</th>
                                <th>Suivi Recommandé</th>
                                <th>Status</th>
                                <th>Type de Consultation</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consultations as $consultation)
                                <tr class="user-list">
                                    <td>1</td>
                                    <td class="text-nowrap align-middle" rowspan="{{ $consultation->ordonnances->count() + 1 }}">1</td>
                                    <td class="text-nowrap align-middle" rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->motif }}</td>
                                    <td class="text-nowrap align-middle" rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->resultat }}</td>
                                    <td class="text-nowrap align-middle" rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->examen_complementaire }}</td>
                                    <td class="text-nowrap align-middle" rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->suivi_recommande }}</td>
                                    <td class="text-nowrap align-middle" rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->status }}</td>
                                    <td class="text-nowrap align-middle" rowspan="{{ $consultation->ordonnances->count() + 1 }}"> {{ $consultation->typeConsultation->name ?? 'N/A' }} </td>
                                    <td class="align-middle">
                                        <div class="btn-list">
                                            <button class="btn btn-sm btn-icon btn-info-light rounded-circle" data-bs-toggle="modal" data-bs-target="#largemodal"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-sm btn-icon btn-secondary-light rounded-circle" type="button"><a href="http://127.0.0.1:8000/admin/administrateur/1/edit"><i class="bi bi-trash"></i></a></button>
                                        </div>
                                    </td>
                                </tr>
                                @foreach($consultation->ordonnances as $ordonnance)
                                <tr class="user-list">
                                    <td class="text-nowrap align-middle">{{ $ordonnance->name }}</td>
                                    <td class="text-nowrap align-middle">{{ $ordonnance->posologie }}</td>
                                    <td class="text-nowrap align-middle">{{ $ordonnance->mode_utilisation }}</td>
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

<!-- Button trigger modal -->
<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#largemodal">Large Modal</button>

<!-- Modal -->
<div class="modal fade" id="largemodal" tabindex="-1" aria-labelledby="largemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largemodalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-dialog {
        margin-top: 10%;
    }
</style>

    {{-- <table class="table table-bordered">
        <thead>
            <tr>
                <th>Motif</th>
                <th>Résultat</th>
                <th>Examen Comp...</th>
                <th>Suivi Recommandé</th>
                <th>Note du Médecin</th>
                <th>Status</th>
                <th>Type de Consultation</th>
                <th>Nom Medicament</th>
                <th>Posologie Ordonnance</th>
                <th>Mode d'Utilisation Ordonnance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultations as $consultation)
                <tr>
                    <td rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->motif }}</td>
                    <td rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->resultat }}</td>
                    <td rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->examen_complementaire }}</td>
                    <td rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->suivi_recommande }}</td>
                    <td rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->note_medecin }}</td>
                    <td rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->status }}</td>
                    <td rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->typeConsultation->name ?? 'N/A' }}</td>
                </tr>
                @foreach($consultation->ordonnances as $ordonnance)
                <tr>
                    <td>{{ $ordonnance->name }}</td>
                    <td>{{ $ordonnance->posologie }}</td>
                    <td>{{ $ordonnance->mode_utilisation }}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table> --}}

    {{-- {{ $consultations->links() }} <!-- Pagination links --> --}}
</div>
@endsection
