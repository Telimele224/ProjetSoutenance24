@extends('en_tete.entete_patient')

@section('contenu')

<div class="container">
    <h1>Liste des Consultations et Ordonnances</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Motif</th>
                <th>Résultat</th>
                <th>Examen Complémentaire</th>
                <th>Suivi Recommandé</th>
                <th>Note du Médecin</th>
                <th>Frais</th>
                <th>Status</th>
                <th>Type de Consultation</th>
                <th>Nom Ordonnance</th>
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
                    <td rowspan="{{ $consultation->ordonnances->count() + 1 }}">{{ $consultation->frais }}</td>
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
    </table>

    {{-- {{ $consultations->links() }} <!-- Pagination links --> --}}
</div>
@endsection
