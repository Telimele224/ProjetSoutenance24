@extends('rdv.headerRdv')

@section('contenu')

<div class="card" style="margin-top:20px; margin-left:20%; width:60%">
    <div class="card-header text-center">
        <p>Veuillez sélectionner vos symptômes :</p>
    </div>

    <div class="card-body">
        <!-- Contenu de la vue de sélection des symptômes -->
        <form action="{{ route('recommander_servicePar_symptome') }}" method="post">
            @csrf
            @foreach($symptomes as $symptome)
            <div class="form-check form-group mb-2">
                <input class="form-check-input form-control p-3" type="checkbox" value="{{ $symptome->id }}" id="symptome{{ $symptome->id }}" name="symptomes[]">
                <label class="form-check-label form-control" for="symptome{{ $symptome->id }}">
                    {{ $symptome->nom }}
                </label>
            </div>
            @endforeach

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-outline-success w-50 float-end">Recommander</button>
        </form>
    </div>
</div>

@endsection
