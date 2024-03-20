@extends('en_tete.entete_administrateurs')

@section('contenu')

<div class="row">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{-- Modifier l'horaire de {{ $medecin->user->nom }} {{ $medecin->user->prenom }} --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.horaires.update', ['horaire' => $horaire->id]) }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @foreach (['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'] as $jour)
                                <div class="form-group row">
                                    <label for="{{ $jour }}_debut" class="col-md-4 col-form-label text-md-right">{{ ucfirst($jour) }} - Heure de début</label>
                                    <div class="col-md-6">
                                        <input type="time" name="{{ $jour }}_debut" class="form-control" value="{{ $horaire->{$jour.'_debut'} }}" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="{{ $jour }}_fin" class="col-md-4 col-form-label text-md-right">{{ ucfirst($jour) }} - Heure de fin</label>
                                    <div class="col-md-6">
                                        <input type="time" name="{{ $jour }}_fin" class="form-control" value="{{ $horaire->{$jour.'_fin'} }}" >
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" " class="form-control btn btn-primary">
                                        Enregistrer les Modifications
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
