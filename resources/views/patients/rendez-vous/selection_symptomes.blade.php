@extends('en_tete.entete_patient')

@section('contenu')
<link rel="stylesheet" href="{{ asset('assets/scroll.css') }}">

<div class="card" style="margin-top:20px; margin-left:20%; width:60%">
    <div class="card text-center">
        <p class="mt-4 text-bold">VEUILEZ SELECTIONNER UN OU DES SYMPTOMES :</p>
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

        <!-- Contenu de la vue de sélection des symptômes -->
        @if($symptomes->isEmpty())
            <div class="row">
                <div class=" col alert alert-danger text-center p-2">
                    Aucun symptôme traité actuellement. Veuillez réessayer dans
                 </div>
            </div>
            <div class="row">
                <div class="col  ">
                    <h1 class=" text-center "> <span  id="timer">24:00:00</span></h1>
                 </div>
            </div>

        @else
            <form action="{{ route('recommander_servicePar_symptome_patient') }}" method="post">
                @csrf
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('logo/symptomecheck.svg') }}" alt="">
                        </div>
                        <div class="card scroll-container col-md-5" style="max-height: 300px; overflow-y: auto;">
                            @foreach($symptomes as $symptome)
                                <div class="row form-check form-group input-group mb-2">
                                    <div class="col-sm-2">
                                        <input class="form-check-input form-control p-3" type="checkbox" value="{{ $symptome->id }}" id="symptome{{ $symptome->id }}" name="symptomes[]">
                                    </div>
                                    <label class="form-check-label form-control" for="symptome{{ $symptome->id }}">
                                        {{ $symptome->nom }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Bouton de soumission -->
                <button type="submit" class="btn btn-outline-primary w-50 float-end">CONTINUEZ</button>
            </form>
        @endif
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 10000); // 10 000 ms = 10 seconds

        function startTimer(duration, display) {
            var timer = duration, hours, minutes, seconds;
            setInterval(function () {
                hours = parseInt(timer / 3600, 10);
                minutes = parseInt((timer % 3600) / 60, 10);
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + ":" + minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        var duration = 24 * 60 * 60; // Convertir 24 heures en secondes
        var display = document.querySelector('#timer');
        if (display) {
            startTimer(duration, display);
        }
    });
</script>
@endsection
