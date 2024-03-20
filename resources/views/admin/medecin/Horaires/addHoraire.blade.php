<!-- resources\views\horaire\create.blade.php -->

@extends('en_tete.entete_administrateurs')

@section('contenu')
    <div class="container">

        <div class="row justify-content-center">
            @if(Session::has('success'))
            <div class="alert alert-success " style="height: 50px;margin-bottom:15px">
              {{Session::get('success')}}
            </div>
            @elseif(Session::has('error'))
            <div class="alert alert-danger " style="height: 50px;margin-bottom:15px">
              {{Session::get('error')}}
            </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Ajouter un horaire pour {{ $medecin->user->nom }} {{ $medecin->user->prenom }}

                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('horaireStore', ['id' => $medecin->id]) }}">
                            @csrf

                            <div class="form-group" >
                                <div class="row" id="joursContainer">
                                    <div class="form-group col-md-6">
                                        <label for="lundi_debut" class="col-md-6 col-form-label text-md-right">{{ __('Lundi - Heure de début') }}</label>
                                        <input type="time" name="lundi_debut" class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="lundi_fin" class="col-md-6 col-form-label text-md-right">{{ __('Lundi - Heure de fin') }}</label>
                                        <input type="time" name="lundi_fin" class="form-control">
                                    </div>
                               </div>
                           </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <button type="button" id="buttonAjout" class="form-control btn btn-info" onclick="ajouterJour()">
                                        +
                                    </button>
                                </div>

                            </div>

                            <div class="form-group row mt-3">
                                <div class="col-md-12">
                                    <button type="submit" class="form-control btn btn-primary">
                                        {{ __('Ajouter Horaire') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    var joursContainer = document.getElementById('joursContainer');
    var jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
    var index = 1;

    function ajouterJour() {
        if (index < jours.length) {
            var jour = jours[index];
            var divDebut = document.createElement('div');
            divDebut.className = 'form-group col-md-6';

            var labelDebut = document.createElement('label');
            labelDebut.textContent = jour.charAt(0).toUpperCase() + jour.slice(1) + ' - Heure de début';
            labelDebut.className = 'col-md-6 col-form-label text-md-right';

            var inputDebut = document.createElement('input');
            inputDebut.type = 'time';
            inputDebut.name = jour + '_debut';
            inputDebut.className = 'form-control';
            // inputDebut.required = true;

            var divFin = document.createElement('div');
            divFin.className = 'form-group col-md-6';

            var labelFin = document.createElement('label');
            labelFin.textContent = jour.charAt(0).toUpperCase() + jour.slice(1) + ' - Heure de fin';
            labelFin.className = 'col-md-6 col-form-label text-md-right';

            var inputFin = document.createElement('input');
            inputFin.type = 'time';
            inputFin.name = jour + '_fin';
            inputFin.className = 'form-control';
            // inputFin.required = true;

            divDebut.appendChild(labelDebut);
            divDebut.appendChild(inputDebut);

            divFin.appendChild(labelFin);
            divFin.appendChild(inputFin);

            joursContainer.appendChild(divDebut);
            joursContainer.appendChild(divFin);

            index++;
        } else {
            alert('Vous avez atteint le dernier jour de la semaine.');
        }

        // Mettez à jour le texte du bouton
        updateButtonText();
    }

   function supprimerJour() {
        if (index > 1) {
            // Supprimer le dernier jour et ses champs associés
            index--;

            // Calculer l'indice du dernier jour ajouté
            var dernierJour = index - 1;

            // Supprimer le dernier jour et ses champs associés
            joursContainer.removeChild(joursContainer.childNodes[dernierJour * 2]);
            joursContainer.removeChild(joursContainer.childNodes[dernierJour * 2]);

            // Mettez à jour le texte du bouton
            updateButtonText();
        } else {
            alert('Vous ne pouvez pas supprimer le premier jour.');
        }
    }

    function updateButtonText() {
        var button = document.getElementById('buttonAjout');
        if (index < jours.length) {
            button.textContent = '+';
        } else {
            button.textContent = '-';
        }
    }
</script>


@endsection
