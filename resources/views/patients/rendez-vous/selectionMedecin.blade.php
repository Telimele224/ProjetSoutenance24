<!-- medecins_par_service.blade.php -->
@extends('en_tete.entete_patient')

@section('contenu')
<div class="container card p-3" style="margin-top: 20px;width:50% ;">
    <div class="card-header">
        <h5 class="text-uppercase ">Medecins disponible du service</h5>
    </div>

    <form action="{{ route('rechercheMedecin') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="rechercheMedecin">Rechercher un médecin par nom et prénom :</label>
            <input type="text" id="rechercheMedecin" placeholder="Entrer le nom du medecin" name="rechercheMedecin" class="form-control">
        </div>

        <div class="form-group -mb-1 mt-1">
            <h6 class="text-uppercase">Liste des médecins du service : {{ $service->nom }}</h6>
        </div>

        <div class="list-group service-list mt-2 mb-5" id="medecinList">
            @if($medecins->isEmpty())
                <p>Aucun médecin trouvé.</p>
            @else
                @foreach($medecins as $medecin)
                <div class="row ">
                    <div class="col-md-11">
                       <a href="{{ route('choisirDate_patient', ['medecinId' => $medecin->id]) }}" class="list-group-item list-group-item-action d-flex align-items-center">

                        <!-- Avatar du médecin -->

                            <div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px;">
                                <img src="{{ asset('avatars/' . $medecin->user->photo) }}" alt="{{ $medecin->user->nom }}" class="w-100 h-100 object-fit-cover">
                            </div>


                        <!-- Nom et spécialité du médecin -->
                        <div >
                            <p style="font-size: 18px; font-weight: bold; margin-bottom: 0;">{{ $medecin->user->nom }} {{ $medecin->user->prenom }}</p>
                            <p style="font-size: 14px; margin-bottom: 0;">{{ $medecin->specialite }}</p>
                        </div>

                        <!-- Bouton "Afficher les détails" avec l'icône eye -->

                       </a>
                    </div>
                    <div class="col-md-1" >

                            <a href="{{ route('admin.medecins.show', ['medecin' => $medecin->id]) }}" class="btn btn-outline-primary" title="Afficher les détails">
                                <i class="fa fa-eye fs-25 "></i>
                            </a>
                    </div>

                @endforeach
            @endif
        </div>
    </form>
</div>





{{-- <!-- Ajoutez ce code dans votre vue selectionMedecin.blade.php -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var rechercheMedecinInput = document.getElementById('rechercheMedecin');
        var medecinList = document.getElementById('medecinList');
        var serviceId = '{{ $service->service_id }}'; // Ajoutez cette ligne pour obtenir le serviceId

        rechercheMedecinInput.addEventListener('input', function () {
            var searchTerm = rechercheMedecinInput.value.trim();

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var medecins = JSON.parse(xhr.responseText);
                        updateMedecinList(medecins);
                    } else {
                        console.error('Erreur lors de la recherche de médecins:', xhr.statusText);
                    }
                }
            };

            xhr.open('GET', '{{ route("rechercheMedecin") }}?rechercheMedecin=' + searchTerm + '&serviceId=' + serviceId, true);
            xhr.send();
        });

        function updateMedecinList(medecins) {
            // Efface la liste actuelle des médecins
            medecinList.innerHTML = '';

            // Met à jour la liste des médecins avec les résultats de la recherche
            if (medecins.length > 0) {
                medecins.forEach(function (medecin) {
                    var medecinItem = document.createElement('a');
                    medecinItem.href = '{{ route('connexionInscription', ['medecinId' => $medecin->id])}}'.replace(':medecinId', medecin.id);                    medecinItem.className = 'list-group-item list-group-item-action d-flex align-items-center';

                    var avatarContainer = document.createElement('div');
                    avatarContainer.className = 'rounded-circle overflow-hidden me-2';
                    avatarContainer.style.width = '50px';
                    avatarContainer.style.height = '50px';

                    var avatarImg = document.createElement('img');
                    avatarImg.src = '{{ asset("avatars") }}/' + medecin.avatar;
                    avatarImg.alt = medecin.nom;
                    avatarImg.className = 'w-100 h-100 object-fit-cover';

                    avatarContainer.appendChild(avatarImg);
                    medecinItem.appendChild(avatarContainer);

                    var medecinName = document.createTextNode(medecin.nom + ' ' + medecin.prenom);
                    medecinItem.appendChild(medecinName);

                    medecinList.appendChild(medecinItem);
                });
            } else {
                // Aucun médecin trouvé
                var noResultParagraph = document.createElement('p');
                var noResultText = document.createTextNode('Aucun médecin trouvé.');
                noResultParagraph.appendChild(noResultText);
                medecinList.appendChild(noResultParagraph);
            }
        }
    });
</script> --}}


@endsection
