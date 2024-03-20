@extends('rdv.headerRdv')

@section('contenu')



    <div class="card" style="margin-top:20px; margin-left:20%; width:60%">
        <div class="card-header text-center">
            <p>veuillez selectionner la maladie dont vous souffrez </p>
        </div>

        <div class="card-body">
         <form action="{{ route('recommander_servicePar_maladie') }}" method="post">
                @csrf
        <!-- Contenu de la vue de sélection des maladies -->
            @foreach($maladies as $maladie)
            <div class="form-check form-group mb-2">
                <input class="form-check-input form-control p-3" type="checkbox" value="{{ $maladie->id }}" id="maladie{{ $maladie->id }}" name="maladies[]">
                <label class="form-check-label form-control" for="maladie{{ $maladie->id }}">
                    {{ $maladie->nom }}
                </label>
            </div>
            @endforeach

            <button type="submit" class="btn btn-outline-success w-50 float-end">Recommander</button>
         </form>

        </div>
    </div>




@endsection
