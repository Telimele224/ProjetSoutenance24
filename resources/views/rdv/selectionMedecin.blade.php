<!-- medecins_par_service.blade.php -->
@extends('rdv.headerRdv')

@section('contenu')
<div class="container card p-3" style="margin-top: 20px;width:50% ;">
    <div class="card-header">
        <h5 class="text-center">Medecins disponible du service</h5>
    </div>

    <form action="{{ route('rechercheMedecin') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="rechercheMedecin">Rechercher un médecin par nom et prénom :</label>
            <input type="text" id="rechercheMedecin" name="rechercheMedecin" class="form-control">
        </div>

        <div class="form-group -mb-1 mt-1">
            <h6>Liste des médecins du service : {{ $service->nom }}</h6>
        </div>

        <div class="list-group service-list mt-2 mb-5" id="medecinList">
            @if($medecins->isEmpty())
                <p>Aucun médecin trouvé.</p>
            @else
                @foreach($medecins as $medecin)
                <div class="row ">
                    <div class="col-md-11">
                       <a href="{{ route('choisirDate', ['medecinId' => $medecin->id]) }}" class="list-group-item list-group-item-action d-flex align-items-center">

                        <!-- Avatar du médecin -->

                            <div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px;">
                                <img src="{{ asset('avatars/' . $medecin->user->avatar) }}" alt="{{ $medecin->user->nom }}" class="w-100 h-100 object-fit-cover">
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

                            <a href="{{ route('admin.medecins.show', ['medecin' => $medecin->id]) }}" class="btn btn-outline-success  p-3 h-100 " title="Afficher les détails">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                  </svg>
                            </a>
                    </div>

                @endforeach
            @endif
        </div>
    </form>
</div>





<!-- Ajoutez ce code dans votre vue selectionMedecin.blade.php -->
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
</script>


@endsection
