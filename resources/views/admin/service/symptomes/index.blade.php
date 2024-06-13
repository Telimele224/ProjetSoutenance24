@extends('en_tete.entete_administrateurs')
@section('contenu')
<div class="main-content">
    <div class="card">

        <div class="card-header list-title d-between bgnc-10 br-trl-sm px-30 py-3">
            <span class="heading-five text-uppercase card-title">Liste des Symptômes</span>
        </div>
        <div class="card-body">
            <!-- table start -->
            <table class="table table-bordered" id="symptomsTable">
                <thead>
                    <tr class="text-uppercase">
                        <th class="text-center">ID</th>
                        <th>Nom Symptôme</th>
                        <!-- Ajoutez ici d'autres colonnes si nécessaire -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($symptoms as $key => $symptom)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $symptom->nom }}</td>
                        <!-- Ajoutez ici d'autres colonnes si nécessaire -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- table end -->
        </div>
    </div>
</div>
@endsection
