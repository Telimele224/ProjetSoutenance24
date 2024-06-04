<!-- choisir_date.blade.php -->
@extends('en_tete.entete_patient')

@section('contenu')
<div class="card " style="margin-top:20px ;margin-left:10px; width:95%">
    <div class="card " style="margin-top:20px ;margin-left:10%; width:80%">
    {{-- @if(Session::has('success'))
    <div id="successMessage" class="alert alert-success" style="height: 50px; margin-bottom: 15px">
        {{ Session::get('success') }}
    </div>
    @elseif(Session::has('error'))
    <div id="errorMessage" class="alert alert-danger " style="height: 50px;margin-bottom:15px">
        {{Session::get('error') }}
    </div>
    @endif --}}
            <div class=" row card-header mb-4 p-3">

                <div class="col-md-6 text-center">
                    <h6 class="text-uppercase">Choisissez le jour et Heure de consultation :</h6>
                </div>
                <div class="col-md-6 ">
                    <button class="btn btn-outline-primary btn-select-date dbtn-sm float-end" data-toggle="collapse" data-target="#formSelectionDate" aria-expanded="false" aria-controls="formSelectionDate">
                        Sélectionner une date de RDV
                    </button>
                </div>
            </div>
        <div class="row p-3">
            <div class="col-md-3 mt-4">
                <img src="{{asset('logo/appointmentcalendar.svg')}}" width="100%" height="auto" alt="">
            </div>
            <div class="card-body col-md-5" id="card-body-container">
                <!-- Formulaire pour la sélection de la date de RDV -->
                <div id="formSelectionDate" class="collapse">
                    <div class="card mt-3">
                        <div class="card-header">
                            Sélection de date de RDV
                        </div>
                        <div class="card-body">
                            <form action="{{ route('ajouterRendezVous_patient') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-sm-7">
                                        <label for="dateRdv" class="form-label">Sélectionnez une date</label>
                                        <input type="date" class="form-control rounded-3" id="dateRdv" name="dateRdv" onchange="updateDay()">
                                        @error('dateRdv')<span class="badge badge-primary bg-primary">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-3 col-sm-5">
                                        <label for="heure" class="form-label">Sélectionnez une heure</label>
                                        <input type="time" class="form-control rounded-3 small text-center"  id="heure" name="heure">
                                        @error('heure')<span class="badge badge-primary bg-primary">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jour" class="form-label">Jour</label>
                                    <input type="text" class="form-control rounded-3 text-center text-uppercase" id="jour" name="jour" readonly>
                                    @error('jour')<span class="badge badge-primary bg-primary">{{ $message }}</span>@enderror
                                </div>

                                <input type="hidden" name="medecinId" value="{{ $medecin->id }}">


                                <div class="d-grid gap-4">
                                    <button class="btn btn-outline-primary text-uppercase" name="submit" type="submit">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if(empty($horairesParJour))
                <div class="alert alert-danger" role="alert">
                    Ce médecin n'a pas d'horaires disponibles pour le moment.
                </div>
                @else
                <!-- Horaires de consultation -->
                <div id="horairesContainer">
                    @foreach ($horairesParJour as $jour => $horaires)
                    <div class="card mb-3">
                        <!-- Header -->
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>{{ $jour }} - {{ $horaires[0]->format('Y-m-d') }}</span>
                                <button class="btn btn-link toggle-body" data-toggle="collapse" data-target="#body{{ $loop->index }}" aria-expanded="false" aria-controls="body{{ $loop->index }}">
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Body -->
                        <div class="card-body collapse" id="body{{ $loop->index }}">
                            <div class="row">
                                @foreach ($horaires as $key => $horaire)
                                    @if ($key < 6) <!-- Limite à 6 suggestions -->
                                    <div class="col-md-4">
                                        <!-- Formulaire caché -->
                                        <form action="{{ route('choisirHeure_patient') }}" id="hiddenForm_{{ $loop->index }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="medecinId" value="{{ $medecin->id }}">
                                            <input type="hidden" name="date" id="hiddenDateRdv_{{ $loop->index }}" value="{{ $horaire->format('Y-m-d') }}">
                                            <input type="hidden" name="heure" id="hiddenHeure_{{ $loop->index }}" value="{{ $horaire->format('H:i') }}">
                                            <input type="hidden" name="jour" id="hiddenJour_{{ $loop->index }}" value="{{ $horaire->format('l') }}">
                                            <button onclick="handleSelection('{{ $horaire->format('Y-m-d') }}', '{{ $horaire->format('H:i') }}', '{{ $horaire->format('l') }}')" class="btn btn-outline-primary mb-1 w-100">
                                                {{ $horaire->format('H:i') }}
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                 @endif
            </div>

         <div class="col-md-4">
            <!-- Card Bootstrap pour les horaires de disponibilité -->
            <div class="card">
                <div class="card text-center ">
                  <h4 class="text-uppercase small title,">Jours  et  Horaires de disponibilité</h4>
                </div>
                <div class="row">
                    @if(!empty($horair->lundi_debut) && !empty($horair->lundi_fin))
                        <div class="card col-sm-4 ms-4 mb-3">
                            <div class="card-header text-center text-">
                                Lundi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->lundi_debut)) }} - {{ date('H:i', strtotime($horair->lundi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->mardi_debut) && !empty($horair->mardi_fin))
                        <div class="card col-sm-4 ms-4 mb-3">
                            <div class="card-header text-center">
                                Mardi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->mardi_debut)) }} - {{ date('H:i', strtotime($horair->mardi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->mercredi_debut) && !empty($horair->mercredi_fin))
                        <div class="card col-sm-4 ms-4 mb-3">
                            <div class="card-header text-center">
                                Mercredi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->mercredi_debut)) }} - {{ date('H:i', strtotime($horair->mercredi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->jeudi_debut) && !empty($horair->jeudi_fin))
                        <div class="card col-sm-4 ms-4 mb-3">
                            <div class="card-header text-center">
                                Jeudi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->jeudi_debut)) }} - {{ date('H:i', strtotime($horair->jeudi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->vendredi_debut) && !empty($horair->vendredi_fin))
                        <div class="card col-sm-4 ms-4 mb-3">
                            <div class="card-header text-center">
                                Vendredi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->vendredi_debut)) }} - {{ date('H:i', strtotime($horair->vendredi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->samedi_debut) && !empty($horair->samedi_fin))
                        <div class="card col-sm-4 ms-4 mb-3">
                            <div class="card-header text-center">
                                Samedi
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->samedi_debut)) }} - {{ date('H:i', strtotime($horair->samedi_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                    @if(!empty($horair->dimanche_debut) && !empty($horair->dimanche_fin))
                        <div class="card col-sm-4 ms-4 mb-3">
                            <div class="card-header text-center">
                                Dimanche
                            </div>
                            <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->dimanche_debut)) }} - {{ date('H:i', strtotime($horair->dimanche_fin)) }}</p>
                        </div>
                    @endif
                    <!-- Répétez la structure pour chaque jour -->
                </div>
            </div>
        </div>


     </div>

</div>
</div>


<!-- Script JavaScript pour gérer l'affichage du card-body -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnSelectDate = document.querySelector('.btn-select-date');
        const horairesContainer = document.getElementById('horairesContainer');

        btnSelectDate.addEventListener('click', function() {
            const formSelectionDate = document.getElementById('formSelectionDate');

            if (formSelectionDate.classList.contains('show')) {
                formSelectionDate.classList.remove('show');
                horairesContainer.classList.add('show');
                btnSelectDate.innerText = "Sélectionner une date de RDV";
            } else {
                formSelectionDate.classList.add('show');
                horairesContainer.classList.remove('show');
                btnSelectDate.innerText = "Revenir";
            }
        });

        const toggleButtons = document.querySelectorAll('.toggle-body');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const target = button.getAttribute('data-target');
                const body = document.querySelector(target);

                if (body.classList.contains('show')) {
                    body.classList.remove('show');
                    button.querySelector('i').classList.replace('fa-chevron-up', 'fa-chevron-down'); // Remplacer l'icône vers le bas
                } else {
                    body.classList.add('show');
                    button.querySelector('i').classList.replace('fa-chevron-down', 'fa-chevron-up'); // Remplacer l'icône vers le haut
                }
            });
        });
    });

    function updateDay() {
        var selectedDate = document.getElementById('dateRdv').value;
        var dateObject = new Date(selectedDate);
        var dayOfWeek = dateObject.toLocaleDateString('fr', { weekday: 'long' });
        document.getElementById('jour').value = dayOfWeek;
    }


    function handleSelection(date, heure, jour, index) {
    // Remplir les champs cachés avec les données de date, heure et jour correspondant à l'index
    document.getElementById('hiddenDateRdv_' + index).value = date;
    document.getElementById('hiddenHeure_' + index).value = heure;
    document.getElementById('hiddenJour_' + index).value = jour;

    // Soumettre le formulaire
    document.getElementById('hiddenForm_' + index).submit();
}


</script>



@endsection
