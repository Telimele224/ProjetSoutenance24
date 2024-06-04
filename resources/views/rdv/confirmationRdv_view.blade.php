<!-- Contenu de la vue connexionInscription -->
@extends('rdv.headerRdv')

@section('contenu')
<div class="card" style="margin-top:20px; margin-left:20%; width:60%">
    
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card text-center text-uppercase p-3 ">
        <h5 class=" title text-center bold "> CONFIRMEZ-VOUS CES INFORMATIONS ? </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="card">
                <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('logo/appointment1.svg')}}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card p-3">
                            <h6 class="text-uppercase bold  small title text-center">INFORMATION DE VOTRE RENDEZ-VOUS</h6>
                        </div>
                    <div class="card-header text-justify">
                        <h6>Date du rendez-vous : {{ $rendezVous['dateRdv'] }}</h6>
                    </div>
                    <div class="card-header text-justify ">
                        <h6>Heure du rendez-vous : {{ $rendezVous['heure'] }}</h6>
                    </div>
                    <div class="card-header text-justify ">
                        <h6>Jour du rendez-vous : {{ $rendezVous['jour'] }}</h6>
                    </div>
                    <div class="row">
                       <div class="col-md-6">
                            <form action="{{ route('welcome') }}" method="GET">
                                <button type="submit" class="btn btn-outline-danger w-100 mt-3 ">ANNULER</button>
                            </form>
                        
                       </div>   
                       
                       <div class="col-md-6">
                            <form action="{{ route('confirmation_rdv') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary w-100 mt-3 ">CONFIRMER</button>

                            </form>
                    
                       </div>   <!-- Ajoutez le bouton "Annuler" -->
                       
                       
                    </div>
                    </div>

                </div>
                </div>

            </div>
        </div>
       <!-- Afficher les informations du rendez-vous -->

    </div>

        <!-- Ajoutez d'autres informations du rendez-vous selon vos besoins -->


    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to hide message after a certain time
        function hideMessage(id) {
            var message = document.getElementById(id);
            if (message) {
                setTimeout(function() {
                    message.style.display = 'none';
                }, 5000); // Change 5000 to the number of milliseconds you want the message to be displayed
            }
        }

        // Hide success message
        hideMessage('successMessage');

        // Hide error message
        hideMessage('errorMessage');
    });
    </script>

@endsection
