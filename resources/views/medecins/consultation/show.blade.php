@extends('en_tete.entete_medecin')

@section('title', $consultation->exists ? "Information Suplementaire de la consultation" : "Ajouter une consultation")
@section('contenu')

<div class="card m-2">
    <div class="card-body">
        <h1 class="my-3">@yield('title')</h1>
        <div class="row justify-content-center">
            <form  action="{{route($consultation->exists ? 'medecins.consultation.update' : 'medecins.consultation.store', $consultation)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                @csrf
                @method($consultation->exists ? 'put': 'post')
                <div class="row gy-4 ">
                    <!-- Champ motif -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="code" class="form-label">Référence du rendez-vous</label>
                        <input type="text" class=" rounded-3 border-0 form-control @error('code') is-invalid @enderror" id="code" name="code" placeholder="Référence du rendez-vous" value="{{ old('code', $consultation->code) }}" disabled>
                        <div class="invalid-feedback">@error('code') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="status" class="form-label">Statut</label>
                        <input type="text" class=" rounded-3 border-0 form-control @error('status') is-invalid @enderror" id="status" name="status" placeholder="Statut de la consultation" value="{{ old('status', $consultation->status) }}" disabled>
                        <div class="invalid-feedback">@error('status') {{ $message }} @enderror</div>
                    </div>
{{--
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="type_consultation_id" class="form-label">Type de consultation</label>
                        <select class="form-select @error('type_consultation_id') is-invalid @enderror" id="type_consultation_id" name="type_consultation_id">
                            <option value="">Sélectionner un type de consultation</option>
                            @foreach($typesConsultations as $typeConsultation)
                                <option value="{{ $typeConsultation->id }}" {{ $consultation->type_consultation_id == $typeConsultation->id ? 'selected' : '' }} disabled>{{ $typeConsultation->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('type_consultation_id') {{ $message }} @enderror</div>
                    </div> --}}
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="motif" class="form-label">Motif</label>
                        <input type="text" class=" rounded-3 border-0 form-control @error('motif') is-invalid @enderror" id="motif" name="motif" placeholder="Motif de la consultation" value="{{ old('motif', $consultation->motif) }}" disabled>
                        <div class="invalid-feedback">@error('motif') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="row">
                    <!-- Champ type_consultation_id -->
                    {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="type_consultation_id" class="form-label">Type de consultation</label>
                        <select class="form-select @error('type_consultation_id') is-invalid @enderror" id="type_consultation_id" name="type_consultation_id">
                            <option value="">Sélectionner un type de consultation</option>
                            @foreach($typesConsultations as $typeConsultation)
                                <option value="{{ $typeConsultation->id }}" {{ $consultation->type_consultation_id == $typeConsultation->id ? 'selected' : '' }} disabled>{{ $typeConsultation->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('type_consultation_id') {{ $message }} @enderror</div>
                    </div> --}}

                    <!-- Champ motif -->
                    {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="motif" class="form-label">Motif</label>
                        <input type="text" class=" rounded-3 border-0 form-control @error('motif') is-invalid @enderror" id="motif" name="motif" placeholder="Motif de la consultation" value="{{ old('motif', $consultation->motif) }}" disabled>
                        <div class="invalid-feedback">@error('motif') {{ $message }} @enderror</div>
                    </div> --}}

                    <!-- Champ frais -->
                    {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <label for="frais" class="form-label">Frais</label>
                        <input type="text" class=" rounded-3 border-0 form-control @error('frais') is-invalid @enderror" id="frais" name="frais" placeholder="Frais de la consultation" value="{{ old('frais', $consultation->frais) }}" disabled>
                        <div class="invalid-feedback">@error('frais') {{ $message }} @enderror</div>
                    </div> --}}
                </div>

                <div class="row">
                    <!-- Champ examen_complementaire -->
                    <div class="col-md-6">
                        <label for="examen_complementaire" class="form-label">Examen Complémentaire</label>
                        <textarea class=" rounded-3 border-0 form-control @error('examen_complementaire') is-invalid @enderror" id="examen_complementaire" name="examen_complementaire" placeholder="Examen Complémentaire" disabled>{{ old('examen_complementaire', $consultation->examen_complementaire) }}</textarea>
                        <div class="invalid-feedback">@error('examen_complementaire') {{ $message }} @enderror</div>
                    </div>

                    <!-- Champ suivi_recommande -->
                    <div class="col-md-6">
                        <label for="suivi_recommande" class="form-label">Suivi Recommandé</label>
                        <textarea class=" rounded-3 border-0 form-control @error('suivi_recommande') is-invalid @enderror" id="suivi_recommande" name="suivi_recommande" placeholder="Suivi Recommandé" disabled>{{ old('suivi_recommande', $consultation->suivi_recommande) }}</textarea>
                        <div class="invalid-feedback">@error('suivi_recommande') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="row">
                    <!-- Champ resultat -->
                    <div class="col-md-6">
                        <label for="resultat" class="form-label">Résultat</label>
                        <textarea class=" rounded-3 border-none form-control @error('resultat') is-invalid @enderror" id="resultat" name="resultat" placeholder="Résultat de la consultation" disabled>{{ old('resultat', $consultation->resultat) }}</textarea>
                        <div class="invalid-feedback">@error('resultat') {{ $message }} @enderror</div>
                    </div>

                    <!-- Champ note_medecin -->
                    <div class="col-md-6">
                        <label for="note_medecin" class="form-label">Note Médecin</label>
                        <textarea class=" rounded-3 border-none form-control @error('note_medecin') is-invalid @enderror" id="note_medecin" name="note_medecin" placeholder="Note Médecin" disabled>{{ old('note_medecin', $consultation->note_medecin) }}</textarea>
                        <div class="invalid-feedback">@error('note_medecin') {{ $message }} @enderror</div>
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-12 mt-3">
                        <button class="btn btn-primary" type="submit">
                            @if($consultation->exists)
                                Modifier
                            @else
                                Valider
                            @endif
                        </button>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
</div>
@endsection
