@extends('en_tete.entete_medecin')

@section('title', $ordonance->exists ? "Modifier une ordonance" : "Ajouter une ordonance")
@section('contenu')

<div class="card m-2">
    <div class="card-body">
        <h1 class="my-3">@yield('title')</h1>
        <div class="row justify-content-center">
            <form  action="{{route($ordonance->exists ? 'medecins.ordonance.update' : 'medecins.ordonance.store', $ordonance)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                @csrf
                @method($ordonance->exists ? 'put': 'post')

                <!-- Champ motif -->
                <div class="row">
                    {{-- <input type="text" class="form-control @error('medecin_id') is-invalid @enderror" id="medecin_id" name="medecin_id" placeholder="Référence du rendez-vous" value="{{ old('medecin_id', Auth::user()->id) }}"> --}}
                </div>

                <div class="row">
                    <!-- Champ motif -->
                    <div class="col-md-6">
                        <label for="name" class="form-label">Référence du medicament</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Référence du rendez-vous" value="{{ old('name', $ordonance->name) }}">
                        <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                    </div>

                    <!-- Champ patient_id -->
                    <div class="col-md-6">
                        <label for="consultation_id" class="form-label">Patient Phone</label>
                        <select class="select2 js-states form-control @error('consultation_id') is-invalid @enderror" id="consultation_id" name="consultation_id">
                            {{-- @foreach($ordonance as $ordonance)
                                {{-- <option value="{{ $ordonance->id }}" {{ $ordonance->consultation_id == $consultation->id ? 'selected' : '' }}>{{ $ordonance->telephone }}</option>
                            @endforeach --}}
                        </select>
                        <div class="invalid-feedback">@error('patient_id') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-4">
                        <label for="posologie" class="form-label">posologie</label>
                        {{-- <input type="text" class="form-control @error('posologie') is-invalid @enderror" id="posologie" name="posologie" placeholder="Statut de la consultation" value="{{ old('posologie', $ordonance->posologie) }}"> --}}
                        <div class="invalid-feedback">@error('posologie') {{ $message }} @enderror</div>
                    </div>
                    <div class="col-md-4">
                        <label for="mode_utilisation" class="form-label">mode utilisation</label>
                        <input type="text" class="form-control @error('mode_utilisation') is-invalid @enderror" id="mode_utilisation" name="mode_utilisation" placeholder="Statut de la consultation" value="{{ old('mode_utilisation', $ordonance->mode_utilisation) }}">
                        <div class="invalid-feedback">@error('mode_utilisation') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-3 text-center">
                        <button class="btn btn-primary" type="submit" data-bs-target="#delete">
                            @if($ordonance->exists)
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

@endsection
