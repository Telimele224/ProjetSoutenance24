
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultation HRL</title>
</head>
<body>

    <div class="row">
        <div class="col-xxl-6">
            <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4 mt-0">
                <h4 class="page-title">La Liste des Consultations</h4>
            </div>
           <div class="row">
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap text-md-nowrap mb-0">
                        <thead class="table-success">
                            <tr>
                                <th>Nom patient</th>
                                <th>Type Consultations</th>
                                <th>Code</th>
                                <th>Motif</th>
                                <th>Résultat</th>
                                <th>Examen Complémentaire</th>
                                <th>Suivi Recommandé</th>
                                <th>Note Médecin</th>
                                <th>Status</th>
                                <th>Frais</th>
                                <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    {{-- <td>{{ $k + 1 }}</td> --}}
                                @if($consultations->patient) <!-- Vérifiez si la consultations est liée à un patient -->
                                    <td>{{ $consultations->patient->user->prenom  }} {{ $consultations->patient->user->nom }}</td>
                                @else
                                    <td colspan="2">Aucun patient associé</td> <!-- Si la consultations n'est pas liée à un patient -->
                                @endif
                                    {{-- <td>{{ $consultations->typeConsultations->name }}</td> --}}
                                    <td>{{ $consultations->code }}</td>
                                    <td>{{ $consultations->motif }}</td>
                                    <td>{{ $consultations->resultat }}</td>
                                    <td>{{ $consultations->examen_complementaire }}</td>
                                    <td>{{ $consultations->suivi_recommande }}</td>
                                    <td>{{ $consultations->note_medecin }}</td>
                                    <td>{{ $consultations->status }}</td>
                                    <td>{{ $consultations->frais }}</td>
                                    <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                                    <td>
                                        <div class="avatar-list text-end">
                                            <span class="avatar rounded-circle bg-blue-dark">
                                                <i class="fe fe-eye fs-15"></i>
                                            </span>
                                            <span class="avatar rounded-circle bg-blue">
                                                <a href="{{ route('consultations.pdf', $consultations->id) }}">Télécharger PDF</a>
                                        </div>
                                    </td>
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
           </div>
        </div>
     </div>






</body>
</html>

