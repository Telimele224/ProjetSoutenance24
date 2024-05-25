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
                        {{-- <ul class="nav item2-gl-menu float-end my-2" role="tablist">
                            <li class="border-end"><a href="#tab-11" class="show active" data-bs-toggle="tab" title="List style" aria-selected="true" role="tab"><i class="fa fa-list"></i></a></li>
                            <li><a href="#tab-12" data-bs-toggle="tab" class="" title="Grid" aria-selected="false" role="tab" tabindex="-1"><i class="fa fa-th"></i></a></li>
                            <ol class="breadcrumbn gap-3 ml-3 ">
                                <li class="breadcrumb-item"><span><a href="{{route('medecins.consultation.create')}}" class="btn btn-primary"> <i class="fe fe-plus"></i>  Ajouter | patient</a></span></li>
                            </ol>
                        </ul> --}}
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
                                    <th class="sort-devices">statut</th>
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
                                        <td>{{ $rendezVous->statut }}</td>
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
@endsection
