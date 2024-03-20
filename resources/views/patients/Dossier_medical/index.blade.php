@extends('en_tete.entete_patient')

@section('contenu')

<div class="row">
    <div class="col-xxl-6">
        <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4 mt-0">
            <h1 class="page-title">Mes entecedants medicaux</h1>
        </div>
       <div class="row">
          <div class="card-body">
            <div class="table-responsive">
                <table class="table border text-nowrap text-md-nowrap mb-0">
                    <thead class="table-success">
                        <tr>
                            <th>Numero</th>
                            <th>Nom Médecin</th>
                            <th>Type Consultation</th>
                            <th>Code</th>
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
                                <td> {{ $consultation->medecin->user->prenom }} {{ $consultation->medecin->user->nom }}</td>
                                <td>{{ $consultation->typeConsultation->name }}</td>
                                <td>{{ $consultation->code }}</td>
                                <td>{{ $consultation->status }}</td>
                                <td>{{ $consultation->frais }}</td>
                                <!-- Ajoutez d'autres colonnes ici selon vos besoins -->
                                <td>
                                    <div class="avatar-list text-end">
                                        <span class="avatar rounded-circle bg-blue-dark">
                                            <a href="{{route('patients.Dossier_medical.show',$consultation->id) }}"><i class="fe fe-eye fs-15"></i></a>
                                        </span>
                                        <span class="avatar rounded-circle bg-blue">
                                            <a href="{{route('medecins.consultation.edit',$consultation) }}" class="text-decoration-none text-default"><i class="fa fa-edit fs-15"></i></a>
                                        </span>
                                        <span class="avatar rounded-circle bg-blue">
                                            <a href="{{ route('consultation.pdf', $consultation->id) }}" class="text-decoration-none text-default"><i class="fa fa-edit fs-15"></i></a>
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

@endsection
