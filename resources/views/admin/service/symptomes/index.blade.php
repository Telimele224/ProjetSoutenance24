@extends('en_tete.entete_administrateurs')
@section('contenu')
<div class="main-content">
    <div>
        <div class="page-title">
            <a href="{{ route('back_end.symptomes.create') }}" class="btn-2"> <i class="fa-solid fa-plus"></i> Ajouter un symptôme </a>
            <ul class="d-flex align-items-center gap-20">
                <li class="bc-item"><a class="para-1b" href="index.html">Dashboard</a></li>
                <li class="bc-item">Liste des Symptômes</li>
            </ul>
            <form action="{{ route('back_end.symptomes.create') }}" method="get">
                @csrf
                <div class="form-group ">
                    <label for="rechercheSymptomes" class="mb-2 ">Rechercher un symptôme par nom :</label>
                    <input type="text" id="rechercheSymptomes" name="rechercheSymptomes" class="form-control">
                </div>
            </form>
        </div>

        <div class="list-body">
            <div class="list-title d-between bgnc-10 br-trl-sm px-30 py-3">
                <span class="heading-five">Liste des Symptômes</span>
            </div>

            <!-- table start -->
            <table class="list-table" id="symptomsTable">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nom Symptôme</th>
                        <!-- Ajoutez ici d'autres colonnes si nécessaire -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($symptoms as $key => $symptom)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $symptom->nom }}</td>
                        <!-- Ajoutez ici d'autres colonnes si nécessaire -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- table end -->
        </div>
    </div>
</div>
@endsection
