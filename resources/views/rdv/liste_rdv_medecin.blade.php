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
                            <ol class="breadcrumbn gap-3 ml-3 ">
                                <li class="breadcrumb-item"><span><a href="{{route('medecins.consultation.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | patient</a></span></li>
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
                        <table class="table border-top table-bordered mb-0 text-nowrap">
                            <thead>
                                <tr>
                                    <th class="sort-devices">No</th>
                                    <th class="sort-devices">Jour </th>
                                    <th class="sort-devices">Date</th>
                                    <th class="sort-devices">Heure</th>
                                    <th class="sort-devices">Patient</th>
                                    <th class="sort-devices">statut</th>
                                    <th class="sort-devices text-end">Action</th>
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
            </div>
            <!-- COL-END -->
        </div>
    </div>
</div>
{{-- {{$rendezVous->links()}} --}}

@endsection
