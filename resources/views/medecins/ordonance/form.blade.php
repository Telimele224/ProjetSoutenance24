@extends('en_tete.entete_medecin')

@section('title', $ordonance->exists ? "Modifier une ordonnance" : "Ajouter une ordonnance")
@section('contenu')
<div class="card">
    <div class="card-body">
      <h6 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ajoutez un ordonnace pour le patients</font></font></h6>
      <form action="{{ route($ordonance->exists ? 'medecins.ordonance.update' : 'medecins.ordonance.store', $ordonance) }}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
        @csrf
        @method($ordonance->exists ? 'put' : 'post')
        <div class="row">
            <!-- Champ consultation_id -->
            <div class="col-md-3">
                <label for="consultation_id" class="form-label">N° Téléphone du patient</label>
                <select class="select2 js-states form-control @error('consultation_id') is-invalid @enderror" id="consultation_id" name="consultation_id">
                    @foreach($consultations as $consultation)
                        @if (Auth::user()->id === $consultation->rdv->medecin->user_id)
                            <option value="{{ $consultation->id }}" {{ $ordonance->consultation_id == $consultation->id ? 'selected' : '' }}>
                                {{ $consultation->rdv->patient->telephone }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <div class="invalid-feedback">@error('consultation_id') {{ $message }} @enderror</div>
            </div>
            <hr class="small mt-2">
        </div>

        <div id="ordonnances">
            <div class="row ordonnance">
                <!-- Champ name -->
                <h4 class="small title ">Nom du medicament 1</h4>
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nom du médicament</label>
                            <input type="text" class="form-control  rounded-2 js-states @error('ordonnances[0][name]') is-invalid @enderror" id="name" name="ordonnances[0][name]" placeholder="Nom du médicament" value="{{ old('ordonnances[0][name]', $ordonance->name) }}">
                            <div class="invalid-feedback">@error('ordonnances[0][name]') {{ $message }} @enderror</div>
                        </div>
                        <!-- Champ posologie -->
                        <div class="col-md-6 ">
                            <label for="posologie" class="form-label">Posologie</label>
                           <input type="text" class=" form-control flatpickr-input active  rounded-2 js-states @error('ordonnances[0][posologie]') is-invalid @enderror" id="posologie" name="ordonnances[0][posologie]" placeholder="Posologie" value="{{ old('ordonnances[0][posologie]', $ordonance->posologie) }}">
                            <div class="invalid-feedback">@error('ordonnances[0][posologie]') {{ $message }} @enderror</div>
                        </div>
                         <!-- Champ mode_utilisation -->
                        <div class="col-md-12 mt-3 mb-2">
                            <div class="mb-3">
                                <label for="mode_utilisation"  class="form-label "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mode d'utilisation</font></font></label>
                                <textarea class="form-control rounded-2 @error('ordonnances[0][mode_utilisation]') is-invalid @enderror"  id="mode_utilisation" name="ordonnances[0][mode_utilisation]" placeholder="Mode d'utilisation" rows="3">{{ old('ordonnances[0][mode_utilisation]', $ordonance->mode_utilisation) }}</textarea>
                                <div class="invalid-feedback">@error('ordonnances[0][mode_utilisation]') {{ $message }} @enderror</div>
                            </div>
                            {{-- <label for="mode_utilisation" class="form-label js-states">Mode d'utilisation</label>
                            <textarea class="form-control @error('ordonnances[0][mode_utilisation]') is-invalid @enderror" id="mode_utilisation" name="ordonnances[0][mode_utilisation]" placeholder="Mode d'utilisation">{{ old('ordonnances[0][mode_utilisation]', $ordonance->mode_utilisation) }}</textarea>
                            <div class="invalid-feedback">@error('ordonnances[0][mode_utilisation]') {{ $message }} @enderror</div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row " style="align-items:flex-start">
            <div class="col-md-5 text-end">
                <button type="button" id="add-medicine" class="btn btn-info">Ajouter un médicament</button>
            </div>
            <div class="col-md-7">
                <button type="submit" class="btn btn-primary">Enregistrer la consultation</button>
            </div>
        </div>
    </form>
    </div>
  </div>

{{--



<div class=" card row justify-content-center" style="margin-top:20px ;margin-left:5%; width:90%">
    <form action="{{ route($ordonance->exists ? 'medecins.ordonance.update' : 'medecins.ordonance.store', $ordonance) }}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
        @csrf
        @method($ordonance->exists ? 'put' : 'post')
        <div class="row">
            <!-- Champ consultation_id -->
            <div class="col-md-3">
                <label for="consultation_id" class="form-label">N° Téléphone du patient</label>
                <select class="select2 js-states form-control @error('consultation_id') is-invalid @enderror" id="consultation_id" name="consultation_id">
                    @foreach($consultations as $consultation)
                        @if (Auth::user()->id === $consultation->rdv->medecin->user_id)
                            <option value="{{ $consultation->id }}" {{ $ordonance->consultation_id == $consultation->id ? 'selected' : '' }}>
                                {{ $consultation->rdv->patient->telephone }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <div class="invalid-feedback">@error('consultation_id') {{ $message }} @enderror</div>
            </div>
        </div>

        <div id="ordonnances">
            <div class="row ordonnance">
                <!-- Champ name -->
                <h4 class="small title ">Nom du medicament 1</h4>
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nom du médicament</label>
                            <input type="text" class="form-control js-states @error('ordonnances[0][name]') is-invalid @enderror" id="name" name="ordonnances[0][name]" placeholder="Nom du médicament" value="{{ old('ordonnances[0][name]', $ordonance->name) }}">
                            <div class="invalid-feedback">@error('ordonnances[0][name]') {{ $message }} @enderror</div>
                        </div>
                        <!-- Champ posologie -->
                        <div class="col-md-6">
                            <label for="posologie" class="form-label">Posologie</label>
                            <input type="text" class="form-control js-states @error('ordonnances[0][posologie]') is-invalid @enderror" id="posologie" name="ordonnances[0][posologie]" placeholder="Posologie" value="{{ old('ordonnances[0][posologie]', $ordonance->posologie) }}">
                            <div class="invalid-feedback">@error('ordonnances[0][posologie]') {{ $message }} @enderror</div>
                        </div>
                         <!-- Champ mode_utilisation -->
                        <div class="col-md-12 mt-3 mb-2">
                            <label for="mode_utilisation" class="form-label js-states">Mode d'utilisation</label>
                            <textarea class="form-control @error('ordonnances[0][mode_utilisation]') is-invalid @enderror" id="mode_utilisation" name="ordonnances[0][mode_utilisation]" placeholder="Mode d'utilisation">{{ old('ordonnances[0][mode_utilisation]', $ordonance->mode_utilisation) }}</textarea>
                            <div class="invalid-feedback">@error('ordonnances[0][mode_utilisation]') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-0">
            <div class="mb-6">
                <div class="col-12 mt-3">
                    <button type="button" id="add-medicine" class="btn btn-info">Ajouter un médicament</button>
                    <button type="submit" class="btn btn-primary">Enregistrer la consultation</button>
                </div>
            </div>

        </div>
    </form>
</div> --}}
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let ordonnanceIndex = 1;

        document.getElementById('add-medicine').addEventListener('click', () => {
            const ordonnancesDiv = document.getElementById('ordonnances');
            const newOrdonnance = document.createElement('div');
            newOrdonnance.classList.add('row', 'ordonnance', 'mt-3');
            newOrdonnance.innerHTML = `
                <h4 class="small title">Nom du médicament ${ordonnanceIndex + 1}</h4>
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nom du médicament</label>
                            <input type="text" class="form-control js-states" id="name" name="ordonnances[${ordonnanceIndex}][name]" placeholder="Nom du médicament">
                        </div>
                        <!-- Champ posologie -->
                        <div class="col-md-6">
                            <label for="posologie" class="form-label">Posologie</label>
                            <input type="text" class="form-control js-states" id="posologie" name="ordonnances[${ordonnanceIndex}][posologie]" placeholder="Posologie">
                        </div>
                        <!-- Champ mode_utilisation -->
                        <div class="col-md-12 mt-3 mb-2">
                            <div class="mb-3">
                                <label for="mode_utilisation" class="form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mode d'utilisation</font></font></label>
                                <textarea class="form-control" id="mode_utilisation" name="ordonnances[${ordonnanceIndex}][mode_utilisation]" placeholder="Mode d'utilisation" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            ordonnancesDiv.appendChild(newOrdonnance);
            ordonnanceIndex++;
        });
    });
</script>

@endsection
