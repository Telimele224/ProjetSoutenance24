@extends('en_tete.entete_administrateurs')
@section('contenu')
<div class="main-content">
    <div>
        <div class="page-title">
            <a href="{{ route('back_end.maladies.create') }}" class="btn-2"> <i class="fa-solid fa-plus"></i> Ajouter une maladie </a>
            <ul class="d-flex align-items-center gap-20">
                <li class="bc-item"><a class="para-1b" href="index.html">Dashboard</a></li>
                <li class="bc-item">Liste des Maladies</li>
            </ul>
            <form action="" method="get">
                @csrf
                <div class="form-group ">
                    <label for="rechercheMaladies" class="mb-2 ">Rechercher une maladie par nom :</label>
                    <input type="text" id="rechercheMaladies" name="rechercheMaladies" class="form-control">
                </div>
            </form>
        </div>

        <div class="list-body">
            <div class="list-title d-between bgnc-10 br-trl-sm px-30 py-3">
                <span class="heading-five">Liste des Maladies</span>
            </div>

            <!-- table start -->
            <table class="list-table" id="diseasesTable">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nom Maladie</th>
                        <!-- Ajoutez ici d'autres colonnes si nécessaire -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($diseases as $key => $disease)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $disease->nom }}</td>
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
