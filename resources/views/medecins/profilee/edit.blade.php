@extends('en_tete.entete_medecin')

@section('contenu')

<div class="main-container container-fluid">
    @if (session('status') === 'profile-updated')
        <p class="alert alert-success"
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 5000)"
            class="text-sm text-gray-600 dark:text-gray-400"
        >{{ __('Mise à jour effectuée avec succès.') }}</p>
    @endif

    <!-- ROW-1 -->
    <div class="row">
        <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-5">
            <div class="card text-center shadow-none border profile-cover__img">
                <div class="card-body">
                    @include('admin.profile.partials.image')
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
                        @if(Auth::user()->role === 'medecin')
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
                            <div class="row p-5">
                                @if($horaires)
                                    @foreach($horaires as $horair)
                                        @if(!empty($horair->lundi_debut) && !empty($horair->lundi_fin))
                                            <div class="card col-md-5 ms-4 mb-3">
                                                <div class="card-header text-center">
                                                    Lundi
                                                </div>
                                                <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->lundi_debut)) }} - {{ date('H:i', strtotime($horair->lundi_fin)) }}</p>
                                            </div>
                                        @endif
                                        @if(!empty($horair->mardi_debut) && !empty($horair->mardi_fin))
                                            <div class="card col-md-5 ms-4 mb-3">
                                                <div class="card-header text-center">
                                                    Mardi
                                                </div>
                                                <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->mardi_debut)) }} - {{ date('H:i', strtotime($horair->mardi_fin)) }}</p>
                                            </div>
                                        @endif
                                        @if(!empty($horair->mercredi_debut) && !empty($horair->mercredi_fin))
                                            <div class="card col-md-5 ms-4 mb-3">
                                                <div class="card-header text-center">
                                                    Mercredi
                                                </div>
                                                <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->mercredi_debut)) }} - {{ date('H:i', strtotime($horair->mercredi_fin)) }}</p>
                                            </div>
                                        @endif
                                        @if(!empty($horair->jeudi_debut) && !empty($horair->jeudi_fin))
                                            <div class="card col-md-5 ms-4 mb-3">
                                                <div class="card-header text-center">
                                                    Jeudi
                                                </div>
                                                <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->jeudi_debut)) }} - {{ date('H:i', strtotime($horair->jeudi_fin)) }}</p>
                                            </div>
                                        @endif
                                        @if(!empty($horair->vendredi_debut) && !empty($horair->vendredi_fin))
                                            <div class="card col-md-5 ms-4 mb-3">
                                                <div class="card-header text-center">
                                                    Vendredi
                                                </div>
                                                <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->vendredi_debut)) }} - {{ date('H:i', strtotime($horair->vendredi_fin)) }}</p>
                                            </div>
                                        @endif
                                        @if(!empty($horair->samedi_debut) && !empty($horair->samedi_fin))
                                            <div class="card col-md-5 ms-4 mb-3">
                                                <div class="card-header text-center">
                                                    Samedi
                                                </div>
                                                <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->samedi_debut)) }} - {{ date('H:i', strtotime($horair->samedi_fin)) }}</p>
                                            </div>
                                        @endif
                                        @if(!empty($horair->dimanche_debut) && !empty($horair->dimanche_fin))
                                            <div class="card col-md-5 ms-4 mb-3">
                                                <div class="card-header text-center">
                                                    Dimanche
                                                </div>
                                                <p style="text-align: center; font-weight:bold;">{{ date('H:i', strtotime($horair->dimanche_debut)) }} - {{ date('H:i', strtotime($horair->dimanche_fin)) }}</p>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <p>Aucun horaire disponible.</p>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="editprofile" role="tabpanel" aria-labelledby="editprofile-tab">
                            <div class="row">
                                <div class="row col-xl-6 vstack gap-3">
                                    @include('admin.profile.partials.update-password-form')
                                </div>
                                <div class="row col-xl-6 vstack gap-3">
                                    @include('admin.profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->role === 'medecin')
                            <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                                <div class="p-5">
                                    <h5 class="text-dark">{{ $medecin->biographie }}</h5>
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
