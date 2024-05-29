@extends('en_tete.entete_medecin')

@section('contenu')

@if(session('success'))
    <div id="success-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="row row-c">
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
                                <li class="breadcrumb-item"><span><a href="{{route('medecins.consultation.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | Consultation</a></span></li>
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
                            <thead class="p-2">
                                <tr>
                                    <th class="">No</th>
                                    <th class="">Jour </th>
                                    <th class="">Date</th>
                                    <th class="">Heure</th>
                                    <th class="">Patient</th>
                                    <th class="">Telephone</th>
                                    <th class="">Statut</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody class="p-2">
                                @foreach ($rendezVous as $k => $rendezVous)
                                    @if ($rendezVous->patient)
                                        <tr>
                                            <td>{{$k+1}}</td>
                                            <td>{{ $rendezVous->jour }}</td>
                                            <td>{{ $rendezVous->dateRdv }}</td>
                                            <td>{{ $rendezVous->heure }}</td>
                                            <td>P.{{ $rendezVous->patient->user->nom }} {{ $rendezVous->patient->user->prenom }}</td>
                                            <td>{{$rendezVous->patient->user->telephone}}</td>
                                            <td>{{$rendezVous->statut}}</td>
                                           <td><div class=" text-center">
                                            <span class=" btn btn-primary">
                                                <a href="{{route('medecins.consultation.create')}}">Consulter</a>
                                            </span>
                                        </div> </td>
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

<script>
    // Attendre 10 secondes (10000 millisecondes) avant de masquer le message de succès
    setTimeout(function(){
        $('#success-message').fadeOut();
    }, 5000);
</script>
@endsection
