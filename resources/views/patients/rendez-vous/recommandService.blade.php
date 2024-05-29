@extends('en_tete.entete_patient')

@section('contenu')

<div class="card" style="margin-top:20px; margin-left:5%; width:90%">
    <div class=" card text-center" >
        <p class="mt-4 text-bold">VEUILEZ SELECTIONNER VOTRE MOTIF DE VOTRE CONSULTATION MERCI :</p>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('logo/molecule.svg')}}"  width="4500" height="450">
        </div>
        <div class="col-md-6">
            <div class="card row">
                <div class="row mt-5 mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="telh col-md-12  card-header mb-4">
                                <a href="{{ route('selectionSymptomes_patient') }}" class="btn btn-outline-primary w-100 float-end" style="text-decoration: none; ">
                                    <i class="flaticon-timetable iconp"></i>&nbsp;&nbsp;&nbsp;Sélectionnez un symptome
                                </a>
                            </div>
                            <div class="col">
                                <hr style="border: 1px solid black;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="telh col-md-12 card-header  mb-4">
                                <a href="{{ route('selectionMaux_patient') }}" class="btn btn-outline-primary   w-100 float-end"  style="text-decoration: none;">
                                    Sélectionner un ou des maux
                                </a>
                            </div>
                            <div class="col">
                                <hr style="border: 1px solid black;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="telh col-md-12 card-header  mb-4">
                                <a href="{{ route('selectionMaladies_patient') }}" class="btn btn-outline-primary   w-100 float-end" style="text-decoration: none;">
                                    Sélectionner une maladie
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
