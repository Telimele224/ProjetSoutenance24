@extends('en_tete.entete_medecin')

@section('title', $consultation->exists ? "Modifier une consultation" : "Ajouter une consultation")
@section('contenu')

<div class="row card-header ">
    <div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4 mt-0">
        <h1 class="my-3">@yield('title')</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><span><a href="{{route('medecins.ordonance.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | Ordonance</a></span></li>
            </ol>
        </div>
    </div>
</div>

<div class="card m-2">
    <div class="card-body">
        <div class="row">
            <label for="date_rendez_vous" class="form-lable">Date du rendez-vous</label>
            <input type="date" name="date_rendez_vous" class="form-control" id="date_rendez_vous">
        </div>
        <div class="row justify-content-center">
            <form  action="{{route($consultation->exists ? 'medecins.consultation.update' : 'medecins.consultation.store', $consultation)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                @csrf
                @method($consultation->exists ? 'put': 'post')


                <div class="row">
                    <!-- Champ patient_id -->
                    <div class="col-md-6">
                        <label for="rdv_id" class="form-label">Patient Phone</label>
                        <select class="select2 js-states form-control @error('rdv_id') is-invalid @enderror" id="rdv_id" name="rdv_id">
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}" data-rendezvous="{{ $patient->rdv_id }}" {{ $consultation->r == $patient->id ? 'selected' : '' }}>{{ $patient->telephone }}</option>
                                <input type="hidden" id="rdv_id" name="rdv_id">
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('rdv_id') {{ $message }} @enderror</div>
                    </div>

                        <input type="hidden" id="rdv_id" name="rdv_id">

                    <!-- Champ status -->
                    <div class="col-md-6">
                        <label for="status" class="form-label">Statut</label>
                        <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" placeholder="Statut de la consultation" value="{{ old('status', $consultation->status) }}">
                        <div class="invalid-feedback">@error('status') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="row">
                    <!-- Champ type_consultation_id -->
                    <div class="col-md-4">
                        <label for="type_consultation_id" class="form-label">Type de consultation</label>
                        <select class="form-select @error('type_consultation_id') is-invalid @enderror" id="type_consultation_id" name="type_consultation_id">
                            <option value="">Sélectionner un type de consultation</option>
                            @foreach($typesConsultations as $typeConsultation)
                                <option value="{{ $typeConsultation->id }}" {{ $consultation->type_consultation_id == $typeConsultation->id ? 'selected' : '' }}>{{ $typeConsultation->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">@error('type_consultation_id') {{ $message }} @enderror</div>
                    </div>

                    <!-- Champ motif -->
                    <div class="col-md-4">
                        <label for="motif" class="form-label">Motif</label>
                        <input type="text" class="form-control @error('motif') is-invalid @enderror" id="motif" name="motif" placeholder="Motif de la consultation" value="{{ old('motif', $consultation->motif) }}">
                        <div class="invalid-feedback">@error('motif') {{ $message }} @enderror</div>
                    </div>

                    <!-- Champ frais -->
                    <div class="col-md-4">
                        <label for="frais" class="form-label">Frais</label>
                        <input type="text" class="form-control @error('frais') is-invalid @enderror" id="frais" name="frais" placeholder="Frais de la consultation" value="{{ old('frais', $consultation->frais) }}">
                        <div class="invalid-feedback">@error('frais') {{ $message }} @enderror</div>
                    </div>
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

                <div class="row">
                    <div class="col-12 mt-3">
                        <button class="btn btn-primary" type="submit" data-bs-target="#delete">
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


<script>
    $(document).ready(function() {
        $('#patient_id').on('change', function() {
            var selectedRendezVous = $(this).find(':selected').data('rendezvous');
            $('#rdv_id').val(selectedRendezVous);
        });
    });

    $(document).ready(function() {
        $('#date_rendez_vous').on('change', function() {
            var selectedDate = $(this).val();
            $.ajax({
                url: '{{ route('medecins.consultation.getPatientsByDate') }}',
                type: 'GET',
                data: { date_rendez_vous: selectedDate },
                success: function(response) {
                    $('#patient_id').empty(); // Clear previous options
                    if (response.patients.length > 0) {
                        $.each(response.patients, function(id, phone) {
                            $('#patient_id').append($('<option>', {
                                value: id,
                                'data-phone': phone,
                                text: phone
                            }));
                        });
                    } else {
                        $('#patient_id').append($('<option>', {
                            value: '',
                            text: 'Aucun patient disponible pour cette date'
                        }));
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>



@endsection
