<!-- resources/views/services.blade.php -->
@extends('en_tete.entete_patient')

@section('contenu')
    <div class="container card" style="margin-top: 7px; width:90%;">
        <div class=" card text-center" >
            <h2 class="mt-4  title">SERVICE(S) RECOMMANDES :</h2>
        </div>
        <div class="row">
            <div class="col-md-12 allign-item-center ">
                <div class="input-group">
                    <div class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search icon-md cursor-pointer"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                    <input type="text" id="rechercheService" placeholder="Rechercher par nom du service" name="rechercheService" class="form-control rounded-1">
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-5">
                <img src="{{asset('logo/hospitall2.svg')}}" alt="">
            </div>
            <div class="col-md-7">
                <div class="list-group service-list mt-2 mb-4" id="serviceList">
                    <div class="card mt-2">
                             @if($services->isEmpty())
                                 <p class="list-group-item text-dangers">Aucun service trouvé pour les critères sélectionnés.</p>
                            @else
                        @foreach($services as $service)
                            <div class="row mb-2 service-item" data-name="{{ $service->nom }}" data-description="{{$service->description}}">
                                <div class="col-md-10">
                                    <h6 class="text-bold title text-uppercase ">
                                    <a href="{{ route('afficherMedecinsParService_patient', ['serviceId' => $service->service_id]) }}" class="list-group-item list-group-item-action">
                                        {{ $service->nom }}
                                    </a>
                                    </h6>

                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('detailService_patient', ['serviceId' => $service->service_id]) }}" class="btn btn-outline-primary " title="Afficher les détails">
                                        <i class="fa fa-eye fs-25 "></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    </div>

                </div>
                <p id="noResultsMessage" class="list-group-item text-danger" style="display: none;">Aucun service trouvé pour les critères sélectionnés.</p>
            </div>
        </div>

    </div>
    @include('rdv/scripts')
@endsection

