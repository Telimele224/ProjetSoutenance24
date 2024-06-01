@extends('en_tete.entete_patient')
@section('contenu')

<div class="row row-cards">
    <div class="col-xl-12">
        <div class="card p-0">
            <div class="card-body p-4">
                <div class="row align-items-center justify-content-around">
                    <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8"> 
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4">
                        <form method="GET" action="{{ route('liste_rdv_patient') }}" id="filter-form">
                            <select class="form-select" id="filter-select" name="filter">
                                <option value="tousrendezVous" {{ $selectedOption == 'tousrendezVous' ? 'selected' : '' }}>Tous les rendez-vous</option>
                                <option value="accepté" {{ $selectedOption == 'accepté' ? 'selected' : '' }}>Accepté</option>
                                <option value="en_attente" {{ $selectedOption == 'en_attente' ? 'selected' : '' }}>En attente</option>
                                <option value="annulé" {{ $selectedOption == 'annulé' ? 'selected' : '' }}>Annulé</option>
                                <option value="manqué" {{ $selectedOption == 'manqué' ? 'selected' : '' }}>Manqué</option>
                                <option value="consulté" {{ $selectedOption == 'consulté' ? 'selected' : '' }}>Consulté</option>
                            </select>
                        </form>
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
                        <table class="table border-top table-bordered mb-0 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="sort-devices">No</th>
                                    <th class="sort-devices">Jour </th>
                                    <th class="sort-devices">Date</th>
                                    <th class="sort-devices">Heure</th>
                                    <th class="sort-devices">Medecin</th>
                                    <th class="sort-devices">Statut</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($rendezVous as $key => $rdv)
                                @if (!$rdv->is_deleted)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $rdv->jour }}</td>
                                    <td>{{ $rdv->dateRdv }}</td>
                                    <td>{{ $rdv->heure }}</td>
                                    <td>Dr {{ $rdv->medecin->user->nom }} {{ $rdv->medecin->user->prenom }}</td>
                                    <td>
                                        @if ($rdv->statut == 'accepté')
                                            <span class="border border-success rounded-2 p-1">{{ $rdv->statut }}</span>
                                        @elseif ($rdv->statut == 'en_attente')
                                            <span class="border border-warning rounded-2 p-1">{{ $rdv->statut }}</span>
                                        @elseif ($rdv->statut == 'annulé')
                                            <span class="border border-danger rounded-2 p-1">{{ $rdv->statut }}</span>
                                        @elseif ($rdv->statut == 'manqué')
                                            <span class="border border-danger rounded-2 p-1">{{ $rdv->statut }}</span>
                                        @elseif ($rdv->statut == 'consulté')
                                            <span class="border border-danger rounded-2 p-1">{{ $rdv->statut }}</span>
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
            <!-- COL-END -->
        </div>
    </div>
</div>

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
</script>
@endsection
