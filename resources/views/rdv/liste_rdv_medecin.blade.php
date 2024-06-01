@extends('en_tete.entete_medecin')
@section('contenu')

<div class="row row-cards">
    <div class="col-xl-12">
        <div class="card p-0">
            <div class="card-body p-4">
                <div class="row align-items-center justify-content-around">
                    <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4">
                        <ul class="nav item2-gl-menu float-end my-2" role="tablist">
                            <li class="border-end"><a href="#tab-11" class="show active" data-bs-toggle="tab" title="List style" aria-selected="true" role="tab"><i class="fa fa-list"></i></a></li>
                            <li><a href="#tab-12" data-bs-toggle="tab" class="" title="Grid" aria-selected="false" role="tab" tabindex="-1"><i class="fa fa-th"></i></a></li>
                            <ol class="breadcrumb gap-3 ml-3">
                                <form method="GET" action="{{ route('rendezvous.filter') }}" id="filter-form">
                                    <select class="form-select" id="filter-select" name="filter">
                                        <option value="tousrendezVous" {{ $selectedOption == 'tousrendezVous' ? 'selected' : '' }}>Tous les rendez-vous</option>
                                        <option value="accepté" {{ $selectedOption == 'accepté' ? 'selected' : '' }}>Accepté</option>
                                        <option value="en_attente" {{ $selectedOption == 'en_attente' ? 'selected' : '' }}>En attente</option>
                                        <option value="annulé" {{ $selectedOption == 'annulé' ? 'selected' : '' }}>Annulé</option>
                                        <option value="manqué" {{ $selectedOption == 'manqué' ? 'selected' : '' }}>Manqué</option>
                                        <option value="consulté" {{ $selectedOption == 'consulté' ? 'selected' : '' }}>Consulté</option>
                                    </select>
                                </form>

                            </ol>
                        </ul>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <div class="tab-content mb-5">
        <div class="tab-pane active show" id="tab-11" role="tabpanel">
            <div class="card">
                <div class="e-table px-5 pb-5">
                    <div class="table-responsive table-lg">
                        <table class="table border-top table-bordered mb-0 text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th class="sort-devices">No</th>
                                    <th class="sort-devices">Jour</th>
                                    <th class="sort-devices">Date</th>
                                    <th class="sort-devices">Heure</th>
                                    <th class="sort-devices">Patient</th>
                                    <th class="sort-devices">Statut</th>
                                    <th class="sort-devices text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rendezVous as $key => $rendezVous)
                                @if ($rendezVous->patient)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $rendezVous->jour }}</td>
                                    <td>{{ $rendezVous->dateRdv }}</td>
                                    <td>{{ $rendezVous->heure }}</td>
                                    <td>{{ $rendezVous->patient->user->nom }} {{ $rendezVous->patient->user->prenom }}</td>
                                    <td>
                                        @if ($rendezVous->statut == 'accepté')
                                            <span class="border border-success rounded-2 p-1">{{ $rendezVous->statut }}</span>
                                        @elseif ($rendezVous->statut == 'en_attente')
                                            <span class="border border-warning rounded-2 p-1">{{ $rendezVous->statut }}</span>
                                        @elseif ($rendezVous->statut == 'annulé')
                                            <span class="border border-danger rounded-2 p-1">{{ $rendezVous->statut }}</span>
                                        @elseif ($rendezVous->statut == 'manqué')
                                            <span class="border border-danger rounded-2 p-1">{{ $rendezVous->statut }}</span>
                                        @elseif ($rendezVous->statut == 'consulté')
                                            <span class="border border-danger rounded-2 p-1">{{ $rendezVous->statut }}</span>
                                        @endif
                                    </td>
                                    <td class="d-flex align-items-center">
                                        @if ($rendezVous->statut != 'annulé' && $rendezVous->statut != 'manqué' && $rendezVous->statut != 'consulté')
                                            <!-- Bouton pour accepter le rendez-vous -->
                                            <form id="accept-form-{{ $rendezVous->id }}" action="{{ route('accepter_rendez_vous', $rendezVous->id) }}" method="POST">
                                                @csrf
                                                @if ($rendezVous->statut == 'accepté')
                                                    <button type="button" class="btn border border-success rounded-circle disabled accepter-btn d-center" title="Rendez-vous déjà accepté">
                                                        <i class="fa fa-check  fs-12 p-2"></i>
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-success rounded-circle m-2 accept-btn" title="Accepter rendez-vous" onclick="hideRejectButton({{ $rendezVous->id }})">
                                                        <i class="fa fa-check fs-15 p-2"></i>
                                                    </button>
                                                @endif
                                            </form>
                                            <!-- Bouton pour rejeter le rendez-vous -->
                                            @if ($rendezVous->statut != 'accepté' && $rendezVous->statut != 'annulé')
                                                <button type="button" class="btn btn-danger rounded-circle m-2 reject-btn" title="Rejeter rendez-vous" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setRendezVousId({{ $rendezVous->id }})">
                                                    <i class="fa fa-edit p-2"></i>
                                                </button>
                                            @endif
                                        @endif
                                    </td>

                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---MODALE DE RAISON D'ANNULATION--->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body p-4 pb-5">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <div class="card shadow-none text-start bg-warning-transparent border-start border-secondary">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <span class="me-3"><svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 24 24">
                                        <path fill="#e62a45" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path>
                                        <circle cx="12" cy="17" r="1" fill="#ffff"></circle>
                                        <path fill="#ffff" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path>
                                    </svg>
                                </span>
                                <div>
                                    <p class="mb-0">Attention !!!</p>
                                    <p class="card-text">En cliquant sur le bouton confirmer vous annulerez le rendez-vous. Êtes-vous sûr ?
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="raison_annulation" class="form-label"></label>
                            <textarea class="form-control" name="raison_annulation" id="raison_annulation" placeholder="Entrer les raisons d'annulation du rendez-vous" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="btn-list">
                        <form id="annuler-rendez-vous-form" method="POST" action="">
                            @csrf
                            <!-- Champ caché pour stocker l'identifiant du rendez-vous -->
                            <input type="hidden" name="rendez_vous_id" id="rendez_vous_id">
                            <div class="row">
                                <div class="col-md-12">
                                     <div class="btn-list">
                                        <button class="btn btn-secondary me-1 mb-1" data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Confirmer</button>
                                     </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>

document.addEventListener('DOMContentLoaded', function() {
        const filterSelect = document.getElementById('filter-select');

        filterSelect.addEventListener('change', function() {
            document.getElementById('filter-form').submit();
        });

        setTimeout(function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);
    });



function setRendezVousId(id) {
    document.getElementById('rendez_vous_id').value = id;
    document.getElementById('annuler-rendez-vous-form').action = '/annuler-rendez-vous/' + id;
}
</script>
