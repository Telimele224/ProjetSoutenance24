@extends('en_tete.entete_administrateurs')
@section('contenu')
<div class="main-container container-fluid">

    <!-- GALLERY DEMO OPEN -->
    <div class="demo-gallery card">
        <div class="card-header d-sm-flex d-block">
            <ul class="nav nav-pills nav-tabs-header mb-0 d-sm-flex d-block" role="tablist">
                <li class="nav-item m-1" role="presentation">
                    <a class="nav-link active" data-bs-toggle="tab" role="tab" aria-current="page" href="#images" aria-selected="true">Images</a>
                </li>
                <li class="nav-item m-1" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" role="tab" aria-current="page" href="#albums" aria-selected="false" tabindex="-1">Albums</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fs-13 active show" id="images" role="tabpanel">
                        @foreach ($galeries->groupBy(function($galerie) { return $galerie->created_at->format('d-m-Y'); }) as $date => $photos)
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                                <label class="form-check-label h6" for="flexCheckChecked">
                                    <h6 class="card-text"><small class="text-muted"> Publier le : {{$date}}</small></h6>
                                </label>
                            </div>
                            <ul class="list-unstyled row lightgallery">
                                @foreach ($photos as $galerie)
                                    <li class="col-xs-6 col-sm-4 col-md-4 col-xl-2">
                                        <a href="{{asset('storage/'.$galerie->photo)}}" class="glightbox card br-5" data-gallery="gallery1">
                                            <img  class="card-img-top br-5" src="{{asset('storage/'.$galerie->photo)}}" alt="Image">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>

                    <div class="tab-pane fs-13" id="albums" role="tabpanel">
                        @foreach ($galeries as $galerie)
                        {{-- <h6 class="mb-4">Albums :</h6> --}}
                        <ul class="list-unstyled row lightgallery">
                            <li class="col-xs-6 col-sm-4 col-md-4 col-xl-2">
                                <a href="{{asset('storage/'.$galerie->photo)}}" class="glightbox card " data-gallery="gallery1">
                                    <img src="{{asset('storage/'.$galerie->photo)}}" alt="image" class="">
                                </a>
                                {{-- <h6 class="text-center mb-0">Recent Photos</h6>
                                <p class="text-center mb-0 mb-3 text-muted">440 Items</p> --}}
                            </li>
                        </ul>
                        @endforeach
                        <ul class="list-unstyled row">
                            <li class="col-xs-6 col-sm-4 col-md-4 col-xl-2 mb-5 border-bottom-0" data-responsive=".https://laravelui.spruko.com/vexel/build/assets/images/media/1.jpg" data-src=".https://laravelui.spruko.com/vexel/build/assets/images/media/1.jpg" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                                <a href="javascript:void(0);" class="btn btn-secondary-light d-inline-flex justify-content-center mb-2 w-100">
                                    <i class="fe fe-trash me-1 lh-base"></i>Trash Bin
                                </a>
                                <a aria-label="anchor" href="javascript:void(0);" class="btn btn-primary-light d-block">
                                    <i class="fe fe-check-circle me-1"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- GALLERY DEMO CLOSED -->
</div>

@endsection
