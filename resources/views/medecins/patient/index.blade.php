@extends('en_tete.entete_medecin')

@section('contenu')

<div class="row row-cards">
    <div class="col-xl-12">
        <div class="card p-0">
            <div class="card-body p-4">
                <div class="row align-items-center justify-content-around">
                    <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                        <h6>Liste des patients liés aux rendez vous du medecin</h6>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4">
                        <!-- Formulaire de filtrage (si nécessaire) -->
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
                        <table class="table border-top table-bordered mb-0 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="sort-devices">Numéro</th>
                                    <th class="sort-devices">Nom</th>
                                    <th class="sort-devices">Prénom</th>
                                    <th class="sort-devices">Email</th>
                                    <th class="sort-devices">Téléphone</th>
                                    <th class="sort-devices">Adresse</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $k => $patient)
                                <tr>
                                    <td>{{ $k + 1 }}</td>
                                    <td>{{ $patient->nom }}</td>
                                    <td>{{ $patient->prenom }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td>{{ $patient->telephone }}</td>
                                    <td>{{ $patient->adresse }}</td>
                                </tr>
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

@endsection
