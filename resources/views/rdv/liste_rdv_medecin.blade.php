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
                    <th class="sort-devices">statut</th>
                    <th class="sort-devices">Actions</th>
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
                    <td>
                        @if ($rendezVous->statut == 'accepté')
                        <span class="border border-success rounded p-1">{{ $rendezVous->statut }}</span>
                        @elseif ($rendezVous->statut == 'en attente')
                            <span class="border border-warning rounded p-1">{{ $rendezVous->statut }}</span>
                        @elseif ($rendezVous->statut == 'annulé')
                            <span class="border border-danger rounded p-1">{{ $rendezVous->statut }}</span>
                        @endif
                    </td>
                    <td class="d-flex align-items-center">
                        <!-- Bouton pour accepter le rendez-vous -->
                        <form action="{{ route('accepter_rendez_vous', $rendezVous->id) }}" method="POST">
                            @csrf
                            @if($rendezVous->statut == 'accepté')
                                <button type="button" class="btn border border-success rounded  disabled accepter-btn d-center" title="Rendez-vous déjà accepté">
                                    <i class="fa-solid fa-check p-2"></i>
                                </button>
                            @else
                                <button type="submit" class="btn btn-success m-2" title="Accepter rendez-vous">
                                    <i class="fa-solid fa-check p-2"></i>
                                </button>
                            @endif
                        </form>

                        <!-- Bouton pour rejeter le rendez-vous -->
                        <form action="{{ route('annuler_rendez_vous', $rendezVous->id) }}" method="POST">
                            @csrf
                            @if($rendezVous->statut != 'accepté')
                                <input name="raison_annulation"  placeholder="Raison de l'annulation">
                                <button type="submit" class="btn btn-danger m-2" title="Rejeter rendez-vous">
                                    <i class="fa-solid fa-check p-2"></i>
                                </button>
                            @endif
                        </form>
                    </td>


                </tr>
               @endif
             @endforeach
            </tbody>
        </table>
   </div>
</div>


@endsection
