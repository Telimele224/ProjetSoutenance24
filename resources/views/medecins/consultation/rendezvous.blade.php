@extends('en_tete.entete_medecin')
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


        <table class="responsive table table-bordered" >
            <thead class="bg-success">
                <tr>
                    <th class="sort-devices">No</th>
                    <th class="sort-devices">Jour </th>
                    <th class="sort-devices">Date</th>
                    <th class="sort-devices">Heure</th>
                    <th class="sort-devices">Patient</th>
                    <th class="sort-devices">Telephone</th>
                    <th class="sort-devices">statut</th>
                </tr>
            </thead>
            <tbody>
             @foreach ($rendezVous as $key=> $rendezVous)
                @if ($rendezVous->patient)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $rendezVous->jour }}</td>
                    <td>{{ $rendezVous->dateRdv }}</td>
                    <td>{{ $rendezVous->heure }}</td>
                    <td>P. {{ $rendezVous->patient->user->nom }} {{ $rendezVous->patient->user->prenom }}</td>
                    <td>+224 {{ $rendezVous->patient->user->telephone }}</td>

                    <td>{{ $rendezVous->statut }}</td>

                </tr>
               @endif
             @endforeach
            </tbody>
        </table>
   </div>
</div>


@endsection
