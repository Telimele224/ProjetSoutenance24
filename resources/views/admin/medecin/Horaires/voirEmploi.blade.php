@extends('back_end.partials.header')

@section('contenu')
<div class="container">
    <h3 class="text-center mb-3">Horaires du Médecin : {{ $medecin->user->nom }} {{ $medecin->user->prenom }}</h3>

    <!-- Afficher les horaires du médecin -->
    @if($medecin->horaires->count() > 0)
        <table class="table table-hover table-striped table-bordered">
            <thead class="bg-info">
                <th>Jour</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
            </thead>
            <tbody>
                @foreach($medecin->horaires as $horaire)
                    <tr>
                        <td>Lundi</td>
                        <td>{{ $horaire->lundi_debut ?? '' }}</td>
                        <td>{{ $horaire->lundi_fin ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Mardi</td>
                        <td>{{ $horaire->mardi_debut ?? '' }}</td>
                        <td>{{ $horaire->mardi_fin ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Mercredi</td>
                        <td>{{ $horaire->mercredi_debut ?? '' }}</td>
                        <td>{{ $horaire->mercredi_fin ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>jeudi</td>
                        <td>{{ $horaire->jeudi_debut ?? '' }}</td>
                        <td>{{ $horaire->jeudi_fin ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Vendredi</td>
                        <td>{{ $horaire->vendredi_debut ?? '' }}</td>
                        <td>{{ $horaire->vendredi_fin ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Samedi</td>
                        <td>{{ $horaire->samedi_debut ?? '' }}</td>
                        <td>{{ $horaire->samedi_fin ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Dimanche</td>
                        <td>{{ $horaire->dimanche_debut ?? '' }}</td>
                        <td>{{ $horaire->dimanche_fin ?? '' }}</td>
                    </tr>
                   
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun horaire disponible pour le médecin.</p>
    @endif
</div>
@endsection
