@extends('en_tete.entete_patient')

@section('contenu')

<div class="card" style="margin-top:20px; margin-left:25%; width:50%">
    <div class="card-header text-center">
        <p>Veuillez sélectionner parmi ces trois votre motif de consultation :</p>
    </div>

    <div class="card-body row">
        <!-- Contenu de la vue principale -->
        <div class="telh col-md-12  card-header">
            <a href="{{ route('selectionSymptomes_patient') }}" class="btn btn-outline-success w-100" style="text-decoration: none; color: inherit;">
                <i class="flaticon-timetable iconp"></i>&nbsp;&nbsp;&nbsp;Sélectionner un symptôme
            </a>
        </div>
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-5 ms-4">
                    <hr style="border: 1px solid black;">
                </div>
                <div class="col-md-1">OU</div>
                <div class="col-md-5">
                    <hr style="border: 1px solid black;">
                </div>
            </div>
        </div>

        <div class="telh col-md-12 card-header">
            <a href="{{ route('selectionMaux_patient') }}" class="btn btn-outline-success  w-100"  style="text-decoration: none; color: inherit;">
                Sélectionner un ou des maux
            </a>
        </div>
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-5 ms-4">
                    <hr style="border: 1px solid black;">
                </div>
                <div class="col-md-1">OU</div>
                <div class="col-md-5">
                    <hr style="border: 1px solid black;">
                </div>
            </div>
        </div>
        <div class="telh col-md-12 card-header">
            <a href="{{ route('selectionMaladies_patient') }}" class="btn btn-outline-success  w-100" style="text-decoration: none; color: inherit;">
                Sélectionner une maladie
            </a>
        </div>
    </div>
</div>

@endsection
