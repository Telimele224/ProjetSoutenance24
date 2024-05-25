@extends('en_tete.entete_medecin')

@section('title', $ordonance->exists ? "Modifier une ordonnance" : "Ajouter une ordonnance")
@section('contenu')
<div class="row justify-content-center">
    <form action="{{ route($ordonance->exists ? 'medecins.ordonance.update' : 'medecins.ordonance.store', $ordonance) }}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
        @csrf
        @method($ordonance->exists ? 'put' : 'post')
        <div class="row">
            <!-- Champ consultation_id -->
            <div class="col-md-6">
                <label for="consultation_id" class="form-label">Patient Phone</label>
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
                <h1>Nom du médicament 1</h1>
                <div class="col-md-6">
                    <label for="name" class="form-label">Nom du médicament</label>
                    <input type="text" class="form-control @error('ordonnances[0][name]') is-invalid @enderror" id="name" name="ordonnances[0][name]" placeholder="Nom du médicament" value="{{ old('ordonnances[0][name]', $ordonance->name) }}">
                    <div class="invalid-feedback">@error('ordonnances[0][name]') {{ $message }} @enderror</div>
                </div>

                <!-- Champ posologie -->
                <div class="col-md-6">
                    <label for="posologie" class="form-label">Posologie</label>
                    <input type="text" class="form-control @error('ordonnances[0][posologie]') is-invalid @enderror" id="posologie" name="ordonnances[0][posologie]" placeholder="Posologie" value="{{ old('ordonnances[0][posologie]', $ordonance->posologie) }}">
                    <div class="invalid-feedback">@error('ordonnances[0][posologie]') {{ $message }} @enderror</div>
                </div>

                <!-- Champ mode_utilisation -->
                <div class="col-md-6 mt-3">
                    <label for="mode_utilisation" class="form-label">Mode d'utilisation</label>
                    <textarea class="form-control @error('ordonnances[0][mode_utilisation]') is-invalid @enderror" id="mode_utilisation" name="ordonnances[0][mode_utilisation]" placeholder="Mode d'utilisation">{{ old('ordonnances[0][mode_utilisation]', $ordonance->mode_utilisation) }}</textarea>
                    <div class="invalid-feedback">@error('ordonnances[0][mode_utilisation]') {{ $message }} @enderror</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-3">
                <button type="button" id="add-medicine" class="btn btn-secondary">Ajouter un médicament</button>
                <button type="submit" class="btn btn-primary">Enregistrer la consultation</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let ordonnanceIndex = 1;

        document.getElementById('add-medicine').addEventListener('click', () => {
            const ordonnancesDiv = document.getElementById('ordonnances');
            const newOrdonnance = document.createElement('div');
            newOrdonnance.classList.add('row', 'ordonnance', 'mt-3');
            newOrdonnance.innerHTML = `
                <h1>Nom du médicament ${ordonnanceIndex + 1}</h1>
                <div class="col-md-6">
                    <label for="name" class="form-label">Nom du médicament</label>
                    <input type="text" class="form-control" id="name" name="ordonnances[${ordonnanceIndex}][name]" placeholder="Nom du médicament">
                </div>
                <div class="col-md-6">
                    <label for="posologie" class="form-label">Posologie</label>
                    <input type="text" class="form-control" id="posologie" name="ordonnances[${ordonnanceIndex}][posologie]" placeholder="Posologie">
                </div>
                <div class="col-md-6 mt-3">
                    <label for="mode_utilisation" class="form-label">Mode d'utilisation</label>
                    <textarea name="ordonnances[${ordonnanceIndex}][mode_utilisation]" class="form-control"></textarea>
                </div>
            `;
            ordonnancesDiv.appendChild(newOrdonnance);
            ordonnanceIndex++;
        });
    });
</script>
@endsection
