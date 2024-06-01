@extends('en_tete.entete_patient')

@section('title', $consultation->exists ? "Information supplémentaire de la consultation" : "Ajouter une consultation")
@section('contenu')

<div class="card m-2">
    <div class="card-body">
        <h1 class="my-3">@yield('title')</h1>
        <div class="row justify-content-center">
            <form class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                @csrf
                @method($consultation->exists ? 'put': 'post')
                <div class="row gy-4 ">
                    <!-- Champ statut -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <label for="status" class="form-label">Statut</label>
                        <input type="text" class="rounded-3 border-0 form-control @error('status') is-invalid @enderror" id="status" name="status" placeholder="Statut de la consultation" value="{{ old('status', $consultation->status) }}" disabled>
                        <div class="invalid-feedback">@error('status') {{ $message }} @enderror</div>
                    </div>
                    
                    <!-- Champ motif -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <label for="motif" class="form-label">Motif</label>
                        <input type="text" class="rounded-3 border-0 form-control @error('motif') is-invalid @enderror" id="motif" name="motif" placeholder="Motif de la consultation" value="{{ old('motif', $consultation->motif) }}" disabled>
                        <div class="invalid-feedback">@error('motif') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="row">
                    <!-- Champ examen_complementaire -->
                    <div class="col-md-6">
                        <label for="examen_complementaire" class="form-label">Examen Complémentaire</label>
                        <textarea class="rounded-3 border-0 form-control @error('examen_complementaire') is-invalid @enderror" id="examen_complementaire" name="examen_complementaire" placeholder="Examen Complémentaire" disabled>{{ old('examen_complementaire', $consultation->examen_complementaire) }}</textarea>
                        <div class="invalid-feedback">@error('examen_complementaire') {{ $message }} @enderror</div>
                    </div>

                    <!-- Champ suivi_recommande -->
                    <div class="col-md-6">
                        <label for="suivi_recommande" class="form-label">Suivi Recommandé</label>
                        <textarea class="rounded-3 border-0 form-control @error('suivi_recommande') is-invalid @enderror" id="suivi_recommande" name="suivi_recommande" placeholder="Suivi Recommandé" disabled>{{ old('suivi_recommande', $consultation->suivi_recommande) }}</textarea>
                        <div class="invalid-feedback">@error('suivi_recommande') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="row">
                    <!-- Champ resultat -->
                    <div class="col-md-6">
                        <label for="resultat" class="form-label">Résultat</label>
                        <textarea class="rounded-3 border-none form-control @error('resultat') is-invalid @enderror" id="resultat" name="resultat" placeholder="Résultat de la consultation" disabled>{{ old('resultat', $consultation->resultat) }}</textarea>
                        <div class="invalid-feedback">@error('resultat') {{ $message }} @enderror</div>
                    </div>

                    <!-- Champ note_medecin -->
                    <div class="col-md-6">
                        <label for="note_medecin" class="form-label">Note Médecin</label>
                        <textarea class="rounded-3 border-none form-control @error('note_medecin') is-invalid @enderror" id="note_medecin" name="note_medecin" placeholder="Note Médecin" disabled>{{ old('note_medecin', $consultation->note_medecin) }}</textarea>
                        <div class="invalid-feedback">@error('note_medecin') {{ $message }} @enderror</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
