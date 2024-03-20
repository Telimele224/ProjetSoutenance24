@extends('en_tete.entete_medecin')

@section('contenu')
<div class="main-container container-fluid">

    <!-- ROW-1 -->
    <div class="row">
        <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-5">
            <div class="card text-center shadow-none border profile-cover__img">
                <div class="card-body">
                    <div class="profile-img-1">
                        <img src="{{asset('assets/build/assets/images/users/18.jpg')}}" alt="img" id="profile-img">
                        <a aria-label="anchor" href="#" class="rounded-pill avatar-icons bg-primary tx-fixed-white p-2">
                            <input type="file" name="photo" class="position-absolute w-100 h-100 op-0" id="profile-change">
                            <i class="fe fe-camera lh-base"></i>
                        </a>
                    </div>
                    <div class="profile-img-content text-dark my-2">
                        <div>
                            <h5 class="mb-0">{{ Auth::user()->prenom }} {{Auth::user()->nom}} </h5>
                            @foreach($medecins as $medecin)
                                @if(Auth::user()->id === $medecin->user_id)
                                    <p class="text-muted mb-0"> {{$medecin->specialite}} </p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <div class="text-warning mb-0">
                            <i class="fa fa-star fs-20"></i>
                            <i class="fa fa-star fs-20"></i>
                            <i class="fa fa-star fs-20"></i>
                            <i class="fa fa-star fs-20"></i>
                            <i class="fa fa-star-half-o fs-20"></i>
                        </div>
                    </div>
                    <p class="mb-2">(3145 Reviews)</p>
                    <div class="d-flex btn-list btn-list-icon justify-content-center">
                        <button type="button" class="btn btn-sm btn-primary"><i class="fe fe-user-plus me-1"></i>Follow</button>
                        <button type="button" class="btn btn-sm btn-info"><i class="fe fe-message-square me-1"></i>Message</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xxl-9 col-xl-8 col-lg-7 col-md-7">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills gap-2" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="timeline-tab" data-bs-toggle="pill" data-bs-target="#timeline" type="button" role="tab" aria-controls="timeline" aria-selected="false" tabindex="-1">Modifier votre Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="gallery-tab" data-bs-toggle="pill" data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="false" tabindex="-1">Emploi du temps</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="editprofile-tab" data-bs-toggle="pill" data-bs-target="#editprofile" type="button" role="tab" aria-controls="editprofile" aria-selected="false" tabindex="-1">Parametres</button>
                        </li>
                        @if(Auth::user()->role === 'medecin' )
                            <li class="nav-item" role="presentation">
                                <button type="button" aria-label="anchor" class="nav-link" id="about-tab" data-bs-toggle="pill" data-bs-target="#about" aria-selected="true" role="tab">Biographie</button>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                            <div class="row p-5">
                                @include('admin.profile.partials.update-profile-information-form')
                            </div>
                        </div>
                        <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                            <ul id="lightgallery" class="list-unstyled row p-5">
                                <li class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-4 border-bottom-0">
                                    <a href="{{asset('assets/build/assets/images/media/1.jpg')}}" class="glightbox br-5" data-gallery="image">
                                        <img src="{{asset('assets/build/assets/images/media/1.jpg')}}" alt="image" class="img-responsive br-5">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="editprofile" role="tabpanel" aria-labelledby="editprofile-tab">
                            <div class="row ">
                                <div class="row col-xl-6 vstack gap-3">
                                    @include('admin.profile.partials.update-password-form')
                                </div>
                                <div class=" row col-xl-6 vstack gap-3">
                                    @include('admin.profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->role === 'medecin')
                            <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <div class="p-5">
                                    @foreach($medecins as $medecin)
                                        @if(Auth::user()->id === $medecin->user_id)
                                            <h5 class="text-dark"> {{ $medecin->biographie }} </h5>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 CLOSED -->

</div>
 @endsection
