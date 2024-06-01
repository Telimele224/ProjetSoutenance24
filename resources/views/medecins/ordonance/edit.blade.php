@extends('en_tete.entete_medecin')

@section('title', "Modifier une ordonnance")

@section('contenu')
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Modifier les ordonnances pour le patient</h6>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('medecins.ordonanceUpdate', $consultation->id) }}" method="post" class="vstack gap-2" enctype="multipart/form-data">
            @csrf
            @method('put')

            <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">

            <div id="ordonnances">
                @foreach($ordonances as $index => $ordonance)
                    <div class="row ordonance mt-3">
                        <h4 class="small title">Nom du médicament {{ $index + 1 }}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="ordonnances[{{ $index }}][name]" class="form-label">Nom du médicament</label>
                                <input type="text" class="form-control rounded-2 js-states @error('ordonnances.*.name') is-invalid @enderror" id="ordonnances[{{ $index }}][name]" name="ordonnances[{{ $index }}][name]" placeholder="Nom du médicament" value="{{ old('ordonnances.' . $index . '.name', $ordonance->name) }}">
                                <div class="invalid-feedback">@error('ordonnances.*.name') {{ $message }} @enderror</div>
                            </div>
                            <div class="col-md-6">
                                <label for="ordonnances[{{ $index }}][posologie]" class="form-label">Posologie</label>
                                <input type="text" class="form-control rounded-2 js-states @error('ordonnances.*.posologie') is-invalid @enderror" id="ordonnances[{{ $index }}][posologie]" name="ordonnances[{{ $index }}][posologie]" placeholder="Posologie" value="{{ old('ordonnances.' . $index . '.posologie', $ordonance->posologie) }}">
                                <div class="invalid-feedback">@error('ordonnances.*.posologie') {{ $message }} @enderror</div>
                            </div>
                            <div class="col-md-12 mt-3 mb-2">
                                <label for="ordonnances[{{ $index }}][mode_utilisation]" class="form-label">Mode d'utilisation</label>
                                <textarea class="form-control rounded-3 @error('ordonnances.*.mode_utilisation') is-invalid @enderror" id="ordonnances[{{ $index }}][mode_utilisation]" name="ordonnances[{{ $index }}][mode_utilisation]" placeholder="Mode d'utilisation" rows="3">{{ old('ordonnances.' . $index . '.mode_utilisation', $ordonance->mode_utilisation) }}</textarea>
                                <div class="invalid-feedback">@error('ordonnances.*.mode_utilisation') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row" style="align-items:flex-start">
                <div class="col-md-5 text-end">
                    <button type="button" id="add-medicine" class="btn btn-info text-uppercase">Ajouter un médicament</button>
                </div>
                <div class="col-md-7">
                    <button type="submit" class="btn btn-primary text-uppercase">Enregistrer les modifications</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let ordonanceIndex = {{ $ordonances->count() }};

        document.getElementById('add-medicine').addEventListener('click', () => {
            const ordonancesDiv = document.getElementById('ordonnances');
            const newordonance = document.createElement('div');
            newordonance.classList.add('row', 'ordonance', 'mt-3');
            newordonance.innerHTML = `
                <h4 class="small title">Nom du médicament ${ordonanceIndex + 1}</h4>
                <div class="row">
                    <div class="col-md-6">
                        <label for="ordonnances[${ordonanceIndex}][name]" class="form-label">Nom du médicament</label>
                        <input type="text" class="form-control rounded-3 js-states" id="ordonnances[${ordonanceIndex}][name]" name="ordonnances[${ordonanceIndex}][name]" placeholder="Nom du médicament">
                    </div>
                    <div class="col-md-6">
                        <label for="ordonnances[${ordonanceIndex}][posologie]" class="form-label">Posologie</label>
                        <input type="text" class="form-control rounded-3 js-states" id="ordonnances[${ordonanceIndex}][posologie]" name="ordonnances[${ordonanceIndex}][posologie]" placeholder="Posologie">
                    </div>
                    <div class="col-md-12 mt-3 mb-2">
                        <label for="ordonnances[${ordonanceIndex}][mode_utilisation]" class="form-label">Mode d'utilisation</label>
                        <textarea class="form-control rounded-3" id="ordonnances[${ordonanceIndex}][mode_utilisation]" name="ordonnances[${ordonanceIndex}][mode_utilisation]" placeholder="Mode d'utilisation" rows="3"></textarea>
                    </div>
                </div>
            `;
            ordonancesDiv.appendChild(newordonance);
            ordonanceIndex++;
        });
    });
</script>

@endsection
