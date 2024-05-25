@extends('rdv.headerRdv')

@section('contenu')

<div class="card" style="margin-top:20px; margin-left:20%; width:60%">
    <div class=" card text-center" >
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
        <form action="{{ route('recommander_servicePar_symptome') }}" method="post">
            @csrf
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('logo/symptomecheck.svg')}}" alt=""  srcset="">
                    </div>
                    <div class="col-md-5">
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
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 10000); // 20000 ms = 20 seconds
    });
</script>

@endsection
