@extends('en_tete.entete_administrateurs')

@section('title', $service->exists ? "MODIFIER UN SERVICE" : "AJOUTER UN SERVICE")

@section('contenu')

<div class="container mt-5">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    <h4 class="mt-3">@yield('title')</h4>
                </div>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success " style="height: 50px;margin-bottom:15px">
                {{Session::get('success')}}
            </div>
            @elseif(Session::has('error'))
            <div class="alert alert-danger " style="height: 50px;margin-bottom:15px">
                {{Session::get('error')}}
            </div>
            @endif
            <div class="card-body">
                <div class="card-area gap-3">
                    <form action="{{ $service->exists ? route('admin.service.update', $service) : route('admin.service.store') }}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                        @csrf
                        @method($service->exists ? 'put': 'post')
                        <div class="row">
                            <div class="mb-20 form-group col-sm-6 mb-2">
                                <label for="nom" class="mb-2 fw-500">Nom du service<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-arrow-left"></i></span>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Entrer le nom du service" aria-label="nom" aria-describedby="addon-wrapping" value="{{ old('nom', $service->nom) }}">
                                    <div class="invalid-feedback">@error('nom') {{$message}} @enderror </div>
                                </div>
                            </div>

                            <!-- Champs pour les symptômes -->
                            <div class="mb-20 form-group col-sm-6 mb-2">
                                <label class="mb-10 fw-semibold">Symptômes (optionnel)</label>
                                <div class="select-container">
                                    <select id="symptomsSelect" class="form-control">
                                        <option value="">-- Sélectionner des symptômes --</option>
                                        @foreach($symptoms as $symptom)
                                        <option value="{{ $symptom->id }}">{{ $symptom->nom }}</option>
                                        @endforeach
                                    </select>
                                    <div id="symptomsCheckboxes" style="display: none;">
                                        @foreach($symptoms as $symptom)
                                        <div>
                                            <input type="checkbox" class="symptom-checkbox" value="{{ $symptom->id }}" {{ in_array($symptom->id, $serviceSymptoms) ? 'checked' : '' }}>{{ $symptom->nom }}
                                        </div>
                                        @endforeach
                                        <input type="hidden" name="symptoms" id="symptoms" value="{{ implode(',', $serviceSymptoms) }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Champs pour les maux -->
                            <div class="mb-20 form-group col-sm-6 mb-2">
                                <label class="mb-10 fw-semibold">Maux (optionnel)</label>
                                <div class="select-container">
                                    <select id="illnessesSelect" class="form-control">
                                        <option value="">-- Sélectionner des maux --</option>
                                        @foreach($illnesses as $illness)
                                        <option value="{{ $illness->id }}">{{ $illness->nom }}</option>
                                        @endforeach
                                    </select>
                                    <div id="illnessesCheckboxes" style="display: none;">
                                        @foreach($illnesses as $illness)
                                        <div>
                                            <input type="checkbox" class="illness-checkbox" value="{{ $illness->id }}" {{ in_array($illness->id, $serviceIllnesses) ? 'checked' : '' }}>{{ $illness->nom }}
                                        </div>
                                        @endforeach
                                        <input type="hidden" name="illnesses" id="illnesses" value="{{ implode(',', $serviceIllnesses) }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Champs pour les maladies -->
                            <div class="mb-20 form-group col-sm-6 mb-2">
                                <label class="mb-10 fw-semibold">Maladies (optionnel)</label>
                                <div class="select-container">
                                    <select id="diseasesSelect" class="form-control">
                                        <option value="">-- Sélectionner des maladies --</option>
                                        @foreach($diseases as $disease)
                                        <option value="{{ $disease->id }}">{{ $disease->nom }}</option>
                                        @endforeach
                                    </select>
                                    <div id="diseasesCheckboxes" style="display: none;">
                                        @foreach($diseases as $disease)
                                        <div>
                                            <input type="checkbox" class="disease-checkbox" value="{{ $disease->id }}" {{ in_array($disease->id, $serviceDiseases) ? 'checked' : '' }}>{{ $disease->nom }}
                                        </div>
                                        @endforeach
                                        <input type="hidden" name="diseases" id="diseases" value="{{ implode(',', $serviceDiseases) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 position-relative">
                                <label for="photo" class="mb-2 fw-500">Photo du Service<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" placeholder="selectionner une photo" aria-label="photo" aria-describedby="addon-wrapping" value="{{ old('photo', $service->photo) }}">
                                    <div class="invalid-feedback">@error('photo') {{$message}} @enderror </div>
                                </div>
                            </div>
                            <div class="col-md-6 position-relative">
                                <label for="avatar" class="mb-2 fw-500">Logo du Service<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" placeholder="selectionner une avatar" aria-label="avatar" aria-describedby="addon-wrapping" value="{{ old('avatar', $service->avatar) }}">
                                    <div class="invalid-feedback">@error('avatar') {{$message}} @enderror </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <label for="description" class="mb-2 fw-500">Description du service<span class="text-danger ms-1">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                    <textarea cols="30" rows="4" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Votre description" aria-label="description" aria-describedby="addon-wrapping">{{ old('description', $service->description ) }}</textarea>
                                    <div class="invalid-feedback">@error('description') {{$message}} @enderror </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <button class="btn btn-primary" type="submit">
                                    @if($service->exists)
                                    Modifier
                                    @else
                                    Enregistrer
                                    @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const symptomsSelect = document.getElementById('symptomsSelect');
        const symptomsCheckboxes = document.getElementById('symptomsCheckboxes');
        const illnessesSelect = document.getElementById('illnessesSelect');
        const illnessesCheckboxes = document.getElementById('illnessesCheckboxes');
        const diseasesSelect = document.getElementById('diseasesSelect');
        const diseasesCheckboxes = document.getElementById('diseasesCheckboxes');

        symptomsSelect.addEventListener('change', function() {
            symptomsCheckboxes.style.display = symptomsSelect.value ? 'block' : 'none';
        });

        illnessesSelect.addEventListener('change', function() {
            illnessesCheckboxes.style.display = illnessesSelect.value ? 'block' : 'none';
        });

        diseasesSelect.addEventListener('change', function() {
            diseasesCheckboxes.style.display = diseasesSelect.value ? 'block' : 'none';
        });

        function updateHiddenFields() {
            const symptomCheckboxes = document.querySelectorAll('.symptom-checkbox:checked');
            const illnessCheckboxes = document.querySelectorAll('.illness-checkbox:checked');
            const diseaseCheckboxes = document.querySelectorAll('.disease-checkbox:checked');
            
            document.getElementById('symptoms').value = Array.from(symptomCheckboxes).map(cb => cb.value).join(',');
            document.getElementById('illnesses').value = Array.from(illnessCheckboxes).map(cb => cb.value).join(',');
            document.getElementById('diseases').value = Array.from(diseaseCheckboxes).map(cb => cb.value).join(',');
        }

        document.querySelectorAll('.symptom-checkbox, .illness-checkbox, .disease-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', updateHiddenFields);
        });

        // Initialize the hidden fields with any pre-selected values
        updateHiddenFields();
    });
</script>

@endsection
