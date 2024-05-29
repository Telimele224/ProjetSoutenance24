@extends('en_tete.entete_medecin')

@section('title', $ordonance->exists ? "Modifier une ordonance" : "Ajouter une ordonance")
@section('contenu')
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Ajoutez une ordonance pour le patient</h6>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route($ordonance->exists ? 'medecins.ordonance.update' : 'medecins.ordonance.store', $ordonance) }}" method="post" class="vstack gap-2" enctype="multipart/form-data">
            @csrf
            @method($ordonance->exists ? 'put' : 'post')

            <!-- Champ consultation_id (caché) -->
            <input type="hidden" name="consultation_id" value="{{ $consultation->id }}">

            <div id="ordonances">
                <div class="row ordonance">
                    <h4 class="small title">Nom du médicament 1</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nom du médicament</label>
                            <input type="text" class="form-control rounded-2 js-states @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nom du médicament" value="{{ old('name', $ordonance->name) }}">
                            <div class="invalid-feedback">@error('name') {{ $message }} @enderror</div>
                        </div>
                        <!-- Champ posologie -->
                        <div class="col-md-6">
                            <label for="posologie" class="form-label">Posologie</label>
                            <input type="text" class="form-control rounded-2 js-states @error('posologie') is-invalid @enderror" id="posologie" name="posologie" placeholder="Posologie" value="{{ old('posologie', $ordonance->posologie) }}">
                            <div class="invalid-feedback">@error('posologie') {{ $message }} @enderror</div>
                        </div>
                        <!-- Champ mode_utilisation -->
                        <div class="col-md-12 mt-3 mb-2">
                            <label for="mode_utilisation" class="form-label">Mode d'utilisation</label>
                            <textarea class="form-control rounded-3 @error('mode_utilisation') is-invalid @enderror" id="mode_utilisation" name="mode_utilisation" placeholder="Mode d'utilisation" rows="3">{{ old('mode_utilisation', $ordonance->mode_utilisation) }}</textarea>
                            <div class="invalid-feedback">@error('mode_utilisation') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="align-items:flex-start">
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

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let ordonanceIndex = 1;

        document.getElementById('add-medicine').addEventListener('click', () => {
            const ordonancesDiv = document.getElementById('ordonances');
            const newordonance = document.createElement('div');
            newordonance.classList.add('row', 'ordonance', 'mt-3');
            newordonance.innerHTML = `
                <h4 class="small title">Nom du médicament ${ordonanceIndex + 1}</h4>
                <div class="">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nom du médicament</label>
                            <input type="text" class="form-control rounded-3 js-states" id="name" name="name" placeholder="Nom du médicament">
                        </div>
                        <!-- Champ posologie -->
                        <div class="col-md-6">
                            <label for="posologie" class="form-label">Posologie</label>
                            <input type="text" class="form-control rounded-3 js-states" id="posologie" name="posologie" placeholder="Posologie">
                        </div>
                        <!-- Champ mode_utilisation -->
                        <div class="col-md-12 mt-3 mb-2">
                            <div class="mb-3">
                                <label for="mode_utilisation" class="form-label">Mode d'utilisation</label>
                                <textarea class="form-control rounded-3" id="mode_utilisation" name="mode_utilisation" placeholder="Mode d'utilisation" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            ordonancesDiv.appendChild(newordonance);
            ordonanceIndex++;
        });
    });
</script>

@endsection
