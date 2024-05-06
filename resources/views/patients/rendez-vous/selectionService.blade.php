@extends('en_tete.entete_patient')

@section('contenu')
    <div class="container card" style="margin-top: 20px;width:50%">

        <div class="card-header">
            <h5 class="text-center">Services recommandés</h5>
        </div>

        <div class=" ">
            <label for="rechercheService" class="mb-3">Rechercher un service</label>
            <input type="text" id="rechercheService" name="rechercheService" class="form-control">
        </div>

        <div class="list-group service-list mt-2 mb-4" id="serviceL">
            @if($services->isEmpty())
                <p class="list-group-item">Aucun service trouvé pour les critères sélectionnés.</p>
            @else
            {{-- <h6> la liste des services </h6> --}}
                @foreach($services as $service)
                    <a href="{{ route('afficherMedecinsParService_patient', ['serviceId' => $service->service_id]) }}" class="list-group-item list-group-item-action">
                        {{ $service->nom }} - {{ $service->description }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var searchInput = document.getElementById('rechercheService');

            searchInput.addEventListener('input', function () {
                // Effectuer une requête AJAX avec fetch
                fetch(`/rechercheService?rechercheService=${this.value}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Mettre à jour la liste des services
                        updateServiceList(data);
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des services', error);
                    });
            });

            // Fonction pour mettre à jour dynamiquement la liste des services
            function updateServiceList(services) {
                var serviceList = document.getElementById('serviceL');
                serviceList.innerHTML = '';

                if (services.length === 0) {
                    serviceList.innerHTML = '<p class="list-group-item">Aucun service trouvé.</p>';
                } else {
                    services.forEach(service => {
                        var serviceItem = document.createElement('a');
                        serviceItem.href = `/choixMedecin/${service.service_id}`;
                        serviceItem.classList.add('list-group-item', 'list-group-item-action');
                        serviceItem.textContent = `${service.nom} - ${service.description}`;

                        serviceItem.addEventListener('click', function (event) {
                            event.preventDefault();
                            window.location.href = this.href; // Rediriger vers la page du service sélectionné
                        });

                        serviceList.appendChild(serviceItem);
                    });
                }
            }
        });
    </script>
@endsection

















{{-- @extends('Front_end.partials.main')

@section('contenu')
    <div class="container " style="margin-top: 100px">
        <h2 class="text-center">veuillez selectionner un service</h2>

        <form action="{{ route('rechercheService') }}" method="get">
            @csrf

            <div class="form-group ">
                <label for="rechercheService" class="mb-3">Rechercher un service par nom :</label>
                <input type="text" id="rechercheService" name="rechercheService" class="form-control">
            </div>

            <div class="list-group  service-list mt-2 mb-4" id="serviceL">
                @foreach($services as $service)
                    <a href="{{ route('afficherMedecinsParService', ['serviceId' => $service->service_id]) }}" class="list-group-item list-group-item-action">
                        {{ $service->nom }}
                    </a>
                @endforeach
            </div>

        </form>
    </div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var searchInput = document.getElementById('rechercheService');

    searchInput.addEventListener('input', function () {
        // Effectuer une requête AJAX avec fetch
        fetch(`/rechercheService?rechercheService=${this.value}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                // Mettre à jour la liste des services
                updateServiceList(data);
            })
            .catch(error => {
                console.error('Erreur lors de la récupération des services', error);
            });
    });

    // Fonction pour mettre à jour dynamiquement la liste des services
    function updateServiceList(services) {
        var serviceList = document.getElementById('serviceL');
        serviceList.innerHTML = '';

        if (services.length === 0) {
            serviceList.innerHTML = '<p>Aucun service trouvé.</p>';
        } else {
            services.forEach(service => {
                var serviceItem = document.createElement('a');
                serviceItem.href = `/choixMedecin/${service.service_id}`;
                serviceItem.classList.add('list-group-item', 'list-group-item-action');
                serviceItem.textContent = service.nom;

                serviceItem.addEventListener('click', function (event) {
                    event.preventDefault();
                    window.location.href = this.href; // Rediriger vers la page du service sélectionné
                });

                serviceList.appendChild(serviceItem);
            });
        }
    }
});
</script>

@endsection --}}
