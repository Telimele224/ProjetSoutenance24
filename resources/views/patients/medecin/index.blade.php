@extends('en_tete.entete_patient')

@section('contenu')

<div class="row row-cards">
    <div class="col-xl-12">
        <div class="card p-0">
            <div class="card-body p-4">
                <div class="row align-items-center justify-content-around">
                    <div class="col-xl-5 col-lg-8 col-md-8 col-sm-8">
                        <!-- Vous pouvez ajouter des actions supplémentaires ici -->
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-4 col-sm-4">
                        <!-- Formulaire de filtrage (si nécessaire) -->
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
                                    <th class="sort-devices">Numéro</th>
                                    <th class="sort-devices">Nom</th>
                                    <th class="sort-devices">Prénom</th>
                                    <th class="sort-devices">Email</th>
                                    <th class="sort-devices">Téléphone</th>
                                    <th class="sort-devices">Adresse</th>
                                    <th class="sort-devices text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medecins as $k => $medecin)
                                <tr>
                                    <td>{{ $k + 1 }}</td>
                                    <td>{{ $medecin->nom }}</td>
                                    <td>{{ $medecin->prenom }}</td>
                                    <td>{{ $medecin->email }}</td>
                                    <td>{{ $medecin->telephone }}</td>
                                    <td>{{ $medecin->adresse }}</td>
                                    <td class="text-end">
                                        <div class="avatar-list text-end">
                                            <span class="avatar rounded-circle bg-blue-dark">
                                                <i class="fe fe-eye fs-15"></i>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
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
