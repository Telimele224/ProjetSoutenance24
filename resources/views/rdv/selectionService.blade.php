<!-- resources/views/services.blade.php -->
@extends('rdv.headerRdv')

@section('contenu')
    <div class="container card" style="margin-top: 20px; width: 75%;">
        <div class=" card text-center" >
            <p class="mt-4 text-bold">SERVICE(S) RECOMMANDES :</p>
        </div>

        <div class="mt-3">
            <label for="rechercheService" class="mb-3 text-align-center">RECHERCHER <i class="fa fa-search"></i></label>
            <input type="text" id="rechercheService" placeholder="Entrer le nom du service" name="rechercheService" class="form-control">
        </div>
        <div class="row">
            <div class="col-md-5">
                <img src="{{asset('logo/hospitall2.svg')}}" alt="">
            </div>
            <div class="col-md-7">
                <div class="list-group service-list mt-2 mb-4" id="serviceList">
                    <div class="card mt-2">
                             @if($services->isEmpty())
                                 <p class="list-group-item">Aucun service trouvé pour les critères sélectionnés.</p>
                            @else
                        @foreach($services as $service)
                            <div class="row mb-2 service-item" data-name="{{ $service->nom }}">
                                <div class="col-md-10">
                                    <h6 class="text-bold title text-uppercase ">
                                    <a {{ route('afficherMedecinsParService', ['serviceId' => $service->service_id]) }}" class="list-group-item list-group-item-action">
                                        {{ $service->nom }}
                                    </a>
                                    </h6>

                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('detailService', ['serviceId' => $service->service_id]) }}" class="btn btn-outline-primary " title="Afficher les détails">
                                        <i class="fa fa-eye fs-25 "></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    </div>

                </div>
                <p id="noResultsMessage" class="list-group-item" style="display: none;">Aucun service trouvé pour les critères sélectionnés.</p>
            </div>
        </div>

    </div>
    @include('rdv/scripts')
@endsection
"
