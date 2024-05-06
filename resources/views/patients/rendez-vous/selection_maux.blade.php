@extends('en_tete.entete_patient')

@section('contenu')



    <div class="card" style="margin-top:20px; margin-left:20%; width:60%">
        <div class="card-header text-center">
            <p>veuillez selectionner ce qui vous fait mal </p>
        </div>

        <div class="card-body">
           <form action="{{ route('recommander_servicePar_maux_patient') }}" method="post">
                @csrf
       <!-- Contenu de la vue de sélection des maux -->
            @foreach($maux as $mal)
            <div class="form-check form-group mb-2">
                <input class="form-check-input form-control p-3 " type="checkbox" value="{{ $mal->id }}" id="mal{{ $mal->id }}" name="maux[]">
                <label class="form-check-label form-control" for="mal{{ $mal->id }}">
                    {{ $mal->nom }}
                </label>
            </div>
            @endforeach
            <button type="submit" class="btn btn-outline-success w-50 float-end">Recommander</button>
        </form>
        </div>
    </div>




@endsection
