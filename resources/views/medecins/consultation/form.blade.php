@extends('en_tete.entete_medecin')

@section('title', $consultation->exists ? "Modifier une consultation" : "Ajouter une consultation")
@section('contenu')

<div class="row card-header ">
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4 mt-0">
        <h1 class="my-3">@yield('title')</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span><a href="{{route('medecins.ordonance.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | Une consultation</a></span></li>
            </ol>
        </div>
    </div>
</div>

<div class="card m-2">
    <div class="card-body">

        <div class="row justify-content-center">
            <form  action="{{route($consultation->exists ? 'medecins.consultation.update' : 'medecins.consultation.store', $consultation)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                @csrf
                @method($consultation->exists ? 'put': 'post')
                 <!-- INFORMATION PERSONNEL DU PATIENT A CONSULTER -->
                 <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                  INFORMATION PATIENT :
                                </font></font></div>
                            </div>
                            <div class="card-body">
                                <form action="route{{"medecins.consultation.store"}}" method="post">
                                    @csrf
                                    <div class="p-5">

                                    <!-- Afficher les informations du patient -->
                                        <div class="row gy-4">
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <label class="form-label">Nom :</label>
                                                <input type="text" class="rounded-3 form-control" id="input" value="{{ $patient->nom }}" readonly>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <label class="form-label">Prénom :</label>
                                                <input type="text" class="rounded-3 form-control" id="input-label" value="{{ $patient->prenom }}" readonly>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <label class="form-label">Genre :</label>
                                                <input type="text" class="rounded-3 form-control" id="input-gender" value="{{ $patient->genre }}" readonly>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <label class="form-label">Age :</label>
                                                <input type="text" class="rounded-3 form-control" id="input-age" value="{{ $patient->age }}" readonly>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <label class="form-label">Tél :</label>
                                                <input type="text" class="rounded-3 form-control" id="input-tel" value="{{ $patient->telephone }}" readonly>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <label class="form-label">Poids :</label>
                                                <input type="text" class="rounded-3 form-control" id="input-weight" value="{{ $patient->patient->poids }}" readonly>
                                            </div>
                                            <!-- Ajoutez d'autres champs si nécessaire -->
                                        </div>

                                        <div class="row gy-4">

                                            <div class="card-header">
                                                <div class=" mt-4 card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                INFORMATION DE LA CONSULTATION :
                                                </font></font></div>
                                            </div>
                                              <!-- Champ hidden pour rdv_id -->
                                              <input type="hidden" name="rdv_id" value="{{ $rdv->id }}">

                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <label for="input-tel" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Statut</font></font></label>
                                                <input type="text" class=" rounded-3 form-control @error('status') is-invalid @enderror" id="status" name="status" placeholder="Statut de la consultation" value="{{ old('status', $consultation->status) }}">
                                                <div class="invalid-feedback">@error('status') {{ $message }} @enderror</div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <label for="motif" class="form-label">Motif</label>
                                                <input type="text" class=" rounded-3 form-control @error('motif') is-invalid @enderror" id="motif" name="motif" placeholder="Motif de la consultation" value="{{ old('motif', $consultation->motif) }}">
                                                <div class="invalid-feedback">@error('motif') {{ $message }} @enderror</div>
                                            </div>
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                <label for="input-tel" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Type de Consultation</font></font></label>
                                                <select class="form-select @error('type_consultation_id') is-invalid @enderror" id="type_consultation_id" name="type_consultation_id">
                                                    <option value="">Sélectionner un type de consultation</option>
                                                    @foreach($typesConsultations as $typeConsultation)
                                                        <option value="{{ $typeConsultation->id }}" {{ $consultation->type_consultation_id == $typeConsultation->id ? 'selected' : '' }}>{{ $typeConsultation->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">@error('type_consultation_id') {{ $message }} @enderror</div>
                                            </div>
                                            <div class="row">
                                                <!-- Champ examen_complementaire -->
                                                <div class="col-md-6">
                                                    <label for="examen_complementaire" class="form-label">Examen Complémentaire</label>
                                                    <textarea class="form-control @error('examen_complementaire') is-invalid @enderror" id="examen_complementaire" name="examen_complementaire" placeholder="Examen Complémentaire">{{ old('examen_complementaire', $consultation->examen_complementaire) }}</textarea>
                                                    <div class="invalid-feedback">@error('examen_complementaire') {{ $message }} @enderror</div>
                                                </div>

                                                <!-- Champ suivi_recommande -->
                                                <div class="col-md-6">
                                                    <label for="suivi_recommande" class="form-label">Suivi Recommandé</label>
                                                    <textarea class="form-control @error('suivi_recommande') is-invalid @enderror" id="suivi_recommande" name="suivi_recommande" placeholder="Suivi Recommandé">{{ old('suivi_recommande', $consultation->suivi_recommande) }}</textarea>
                                                    <div class="invalid-feedback">@error('suivi_recommande') {{ $message }} @enderror</div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Champ resultat -->
                                                <div class="col-md-6">
                                                    <label for="resultat" class="form-label">Résultat</label>
                                                    <textarea class="form-control @error('resultat') is-invalid @enderror" id="resultat" name="resultat" placeholder="Résultat de la consultation">{{ old('resultat', $consultation->resultat) }}</textarea>
                                                    <div class="invalid-feedback">@error('resultat') {{ $message }} @enderror</div>
                                                </div>

                                                <!-- Champ note_medecin -->
                                                <div class="col-md-6">
                                                    <label for="note_medecin" class="form-label">Note Médecin</label>
                                                    <textarea class="form-control @error('note_medecin') is-invalid @enderror" id="note_medecin" name="note_medecin" placeholder="Note Médecin">{{ old('note_medecin', $consultation->note_medecin) }}</textarea>
                                                    <div class="invalid-feedback">@error('note_medecin') {{ $message }} @enderror</div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <button class="btn btn-primary"  type="submit" >
                                                @if($consultation->exists)
                                                    Modifier
                                                @else
                                                    Valider
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
