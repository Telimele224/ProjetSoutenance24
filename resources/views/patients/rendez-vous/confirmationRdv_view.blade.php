<!-- Contenu de la vue connexionInscription -->
@extends('en_tete.entete_patient')

@section('contenu')
<div class="card" style="margin-top:20px; margin-left:20%; width:60%">
    @if(Session::has('success'))
    <div id="successMessage" class="alert alert-success" style="height: 50px; margin-bottom: 15px">
        {{ Session::get('success') }}
    </div>
    @elseif(Session::has('error'))
    <div id="successMessage" class="alert alert-danger " style="height: 50px;margin-bottom:15px">
        {{Session::get('error') }}
    </div>
    @endif
    <div class="card-header text-center">
        Confirmer-vous ces informations ?
    </div>
    <div class="card-body">
        <!-- Afficher les informations du rendez-vous -->
        <div class="card-header text-justify">
            <h6>Date du rendez-vous : {{ $rendezVous['dateRdv'] }}</h6>
        </div>
        <div class="card-header text-justify ">
            <h6>Heure du rendez-vous : {{ $rendezVous['heure'] }}</h6>
        </div>
        <div class="card-header text-justify">
            <h6>Jour du rendez-vous : {{ $rendezVous['jour'] }}</h6>
        </div>
        <div class="card-footer ">
            <form action="{{ route('confirmation_rdv_patient') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-success w-100 mt-3 float-end">Confirmer</button>
            </form>
        </div>
    </div>

        <!-- Ajoutez d'autres informations du rendez-vous selon vos besoins -->


    </div>
</div>

@endsection