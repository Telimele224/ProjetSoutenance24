@extends('en_tete.entete_patient')
@section('contenu')

<div class="main-content">
    <!-- main content start -->
    <div class="list-body">
        <div class="list-title d-between bgnc-10 br-trl-sm px-30 py-3">
            <span class="heading-five">Liste des Rendez-Vous</span>
            <div class="d-between gap-30">
                <button class="btn-1 para-1b"> <i class="fa-solid fa-cloud-arrow-down"></i> Export</button>
                <button class="btn-1 para-1b" id="showFilter"> <i class="fa-solid fa-sliders"></i>
                    Filter</button>
            </div>
        </div>


        <table class="responsive table table-bordered">
            <thead class="bg-success">
                <tr>
                    <th >No</th>
                    <th >Jour </th>
                    <th >Date</th>
                    <th >Heure</th>
                    <th >Medecin</th>
                    <th >statut</th>

                </tr>
            </thead>
            <tbody>
             @foreach ($rendezVous as $key=> $rendezVous)
                @if (!$rendezVous->is_deleted)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $rendezVous->jour }}</td>
                    <td>{{ $rendezVous->dateRdv }}</td>
                    <td>{{ $rendezVous->heure }}</td>
                    <td> Dr {{ $rendezVous->medecin->user->nom }} {{ $rendezVous->medecin->user->prenom }}</td>
                    <td>  <!-- Ajouter une bordure colorée en fonction du statut -->
                        @if ($rendezVous->statut == 'accepté')
                            <span class="border border-success rounded p-1">{{ $rendezVous->statut }}</span>
                        @elseif ($rendezVous->statut == 'en attente')
                            <span class="border border-warning rounded p-1">{{ $rendezVous->statut }}</span>
                        @elseif ($rendezVous->statut == 'annulé')
                            <span class="border border-danger rounded p-1">{{ $rendezVous->statut }}</span>
                        @endif
                    </td>

                </tr>
                @endif
             @endforeach
            </tbody>
        </table>
   </div>
</div>


{{-- <script>
    // Sélectionnez tous les boutons "Accepter"
    const accepterButtons = document.querySelectorAll('.accepter-btn');

    // Parcourir chaque bouton et ajouter un gestionnaire d'événement pour désactiver le bouton lorsqu'il est cliqué
    accepterButtons.forEach(button => {
        button.addEventListener('click', () => {
            button.classList.add('btn-disabled');
        });
    });
</script> --}}
@endsection
