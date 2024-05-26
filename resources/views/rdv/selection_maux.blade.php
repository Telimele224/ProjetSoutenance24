@extends('rdv.headerRdv')

@section('contenu')
<link rel="stylesheet" href="{{ asset('assets/scroll.css') }}">

<div class="card" style="margin-top:20px; margin-left:20%; width:60%">
    <div class=" card text-center" >
        <p class="mt-4 text-bold">VEUILEZ SELECTIONNER UN MAUX OU DES MAUX  :</p>
    </div>

    <div class="card-body">
        <!-- Afficher les messages d'erreur -->
        @if($errors->any())
            <div class="alert alert-danger" id="error-message">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Contenu de la vue de sélection des maux -->
        <form action="{{ route('recommander_servicePar_maux') }}" method="post">
            @csrf
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('logo/symptomecheck.svg')}}" alt="symptomes chech image">
                    </div>
                    <div class="card scroll-container col-md-5" style="max-height: 300px; overflow-y: auto;">
                        @foreach($maux as $mal)
                            <div class="form-check input-group form-group mb-2">
                                <div class="col-sm-2">
                                    <input class="form-check-input form-control p-3" type="checkbox" value="{{ $mal->id }}" id="mal{{ $mal->id }}" name="maux[]">
                                </div>
                                <label class="form-check-label form-control" for="mal{{ $mal->id }}">
                                    {{ $mal->nom }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>


            <button type="submit" class="btn btn-outline-primary w-50 float-end">CONTINUEZ</button>
        </form>

    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 15000); // 20000 ms = 20 seconds
    });
</script>

@endsection
