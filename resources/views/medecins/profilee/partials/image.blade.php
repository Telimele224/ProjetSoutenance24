<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="profile-img-1">
        <img src="{{asset('storage/'.$user->photo)}}" alt="utilisateur" id="profile-img">
        <a aria-label="anchor" href="#" class="rounded-pill avatar-icons bg-primary tx-fixed-white p-2">
            <input type="file" name="photo" class="position-absolute w-100 h-100 op-0" id="profile-change">
            <i class="fe fe-camera lh-base"></i>
        </a>
    </div>
    <div class="profile-img-content text-dark my-2">
        <div>
            <h5 class="mb-0">{{ Auth::user()->prenom }} {{Auth::user()->nom}} </h5>

                    <p class="text-muted mb-0"> {{Auth::user()->role}} </p>

        </div>
    </div>
    <span class="text-muted mx-3"><i class="fe fe-map-pin mx-2 text-secondary ">  {{Auth::user()->adresse}} </i></span>
    <span class="text-muted"><i class="fe fe-phone mx-2 text-success "></i>+224 {{Auth::user()->telephone}} </span>
    <div>
        <div class="text-warning mb-0">
            <i class="fa fa-star fs-20"></i>
            <i class="fa fa-star fs-20"></i>
            <i class="fa fa-star fs-20"></i>
            <i class="fa fa-star fs-20"></i>
            <i class="fa fa-star-half-o fs-20"></i>
        </div>
    </div>

    <div class="d-flex btn-list btn-list-icon justify-content-center">

            <x-primary-button class="btn btn-sm btn-primary"><i class="fe fe-user-plus me-1"></i>{{ __('Mise à jour') }}</x-primary-button>
            <a href="{{route('chatify')}}">
                <span class="btn btn-sm btn-info"><i class="fe fe-message-square me-1"></i>Message</span>
            </a>
    </div>
</form>
