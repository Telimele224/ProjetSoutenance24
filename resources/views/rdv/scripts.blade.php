<!-- RECHERCHE MEDECIN DANS RDV -->
<!-- Ajoutez ce code dans votre vue selectionMedecin.blade.php -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var rechercheMedecinInput = document.getElementById('rechercheMedecin');
        var medecinList = document.getElementById('medecinList');
        var serviceId = '{{ $service->service_id }}'; // Ajoutez cette ligne pour obtenir le serviceId

        // Fonction pour récupérer la liste complète des médecins
        function getAllMedecins() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var medecins = JSON.parse(xhr.responseText);
                        updateMedecinList(medecins);
                    } else {
                        console.error('Erreur lors de la récupération des médecins:', xhr.statusText);
                    }
                }
            };

            xhr.open('GET', '{{ route("rechercheMedecin") }}?serviceId=' + serviceId, true);
            xhr.send();
        }

        rechercheMedecinInput.addEventListener('input', function () {
            var searchTerm = rechercheMedecinInput.value.trim();

            if (searchTerm === '') {
                // Si le champ de recherche est vide, récupère et affiche la liste complète des médecins
                getAllMedecins();
            } else {
                // Sinon, effectue la recherche
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
            }
        });

        function updateMedecinList(medecins) {
            // Efface la liste actuelle des médecins
            medecinList.innerHTML = '';

            // Met à jour la liste des médecins avec les résultats de la recherche
            if (medecins.length > 0) {
                medecins.forEach(function (medecin) {
                    var medecinItem = document.createElement('div');
                    medecinItem.className = 'row';

                    var medecinContent = document.createElement('div');
                    medecinContent.className = 'col-md-11';

                    var medecinLink = document.createElement('a');
                    medecinLink.href = '{{ route('choisirDate', ['medecinId' => ':medecinId']) }}'.replace(':medecinId', medecin.id);
                    medecinLink.className = 'list-group-item list-group-item-action d-flex align-items-center';

                    var avatarContainer = document.createElement('div');
                    avatarContainer.className = 'rounded-circle overflow-hidden me-2';
                    avatarContainer.style.width = '50px';
                    avatarContainer.style.height = '50px';

                    var avatarImg = document.createElement('img');
                    avatarImg.src = '{{ asset("storage") }}/' + medecin.user.photo;
                    avatarImg.alt = medecin.user.nom;
                    avatarImg.className = 'w-100 h-100 object-fit-cover';

                    avatarContainer.appendChild(avatarImg);
                    medecinLink.appendChild(avatarContainer);

                    var medecinInfo = document.createElement('div');
                    var medecinName = document.createElement('p');
                    medecinName.style.fontSize = '18px';
                    medecinName.style.fontWeight = 'bold';
                    medecinName.style.marginBottom = '0';
                    medecinName.textContent = medecin.user.nom + ' ' + medecin.user.prenom;

                    var medecinSpecialite = document.createElement('p');
                    medecinSpecialite.style.fontSize = '14px';
                    medecinSpecialite.style.marginBottom = '0';
                    medecinSpecialite.textContent = medecin.specialite;

                    medecinInfo.appendChild(medecinName);
                    medecinInfo.appendChild(medecinSpecialite);
                    medecinLink.appendChild(medecinInfo);
                    medecinContent.appendChild(medecinLink);

                    var detailBtnContainer = document.createElement('div');
                    detailBtnContainer.className = 'col-md-1';

                    var detailBtn = document.createElement('a');
                    detailBtn.href = '{{ route('rdv.detail_medecin', ['medecinId' => ':medecinId']) }}'.replace(':medecinId', medecin.id);
                    detailBtn.className = 'btn btn-outline-primary p-3 h-75';
                    detailBtn.title = 'Afficher les détails';
                    detailBtn.innerHTML = `
                        <i class="fa fa-eye fs-25 "></i>
                    `;

                    detailBtnContainer.appendChild(detailBtn);
                    medecinItem.appendChild(medecinContent);
                    medecinItem.appendChild(detailBtnContainer);

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

        // Récupère la liste complète des médecins au chargement de la page
        getAllMedecins();
    });
</script>


<!-- resources/views/scripts/service_recherche.blade.php -->
<!-- RECHERCHE SERVICE DANS RDV -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var searchInput = document.getElementById('rechercheService');
        var noResultsMessage = document.getElementById('noResultsMessage');
        var serviceItems = document.querySelectorAll('.service-item');

        searchInput.addEventListener('input', function () {
            var searchTerm = this.value.toLowerCase();
            var hasResults = false;

            serviceItems.forEach(function (item) {
                var serviceName = item.getAttribute('data-name').toLowerCase();
                var serviceDescription = item.getAttribute('data-description').toLowerCase();

                if (serviceName.includes(searchTerm) || serviceDescription.includes(searchTerm)) {
                    item.style.display = '';
                    hasResults = true;
                } else {
                    item.style.display = 'none';
                }
            });

            // Afficher ou masquer le message "Aucun service trouvé"
            if (hasResults) {
                noResultsMessage.style.display = 'none';
            } else {
                noResultsMessage.style.display = '';
            }
        });
    });
</script>



