@extends('en_tete.entete_administrateurs')

{{-- @section('title',$patient->exists? "Modifier un patient":"Ajouter un patient") --}}

@section('contenu')

<div class="card m-2">
    <div class="card-body">

        <h1 class="my-3">@yield('title')</h1>

        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card">

                        <div class="text-center mt-4">
                            <h4 class="card-title">ACTIVATION OU D'ESACTIVATION D'UN COMPTE PATIENT</h4>
                            <p class="small">Ce Formulaire vous permet d'activer ou d'ésactiver le compte d'un patient</p>
                        </div>
                        <form method="POST" action="{{ $action }}" enctype="multipart/form-data" method="post" >
                            @if ($method === 'put')
                                 @method('PUT')
                            @endif
                            @csrf
                            <div class="card-body">
                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <label   for="nom" :value="__('Nom')" class="mb-2 fw-500">Nom<span class="text-danger ms-1">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                            <input type="text" disabled class="form-control   @error('nom') is-invalid @enderror" name="nom" placeholder="Votre nom" value="{{ old('nom',  $patient ? $patient->user->nom : '') }}" aria-label="nom" aria-describedby="addon-wrapping">
                                            <div class="invalid-feedback">@error('nom') {{$message}} @enderror </div>
                                            </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label   for="prenom" :value="__('Prenom')" class="mb-2 fw-500">Prenom<span class="text-danger ms-1">*</span></label>
                                        <div class="input-group ">
                                            <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                            <input type="text" disabled class="form-control @error('prenom') is-invalid @enderror" placeholder="votre prenom" name="prenom" aria-label="prenom" value="{{ old('prenom', $patient ? $patient->user->prenom : '') }}" aria-describedby="addon-wrapping">
                                            <div class="invalid-feedback">@error('prenom') {{$message}} @enderror </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="genre" class="mb-2 fw-500">Genre<span class="text-danger ms-1">*</span></label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('genre') is-invalid @enderror" type="radio" id="homme" name="genre" value="homme" @if(old('genre',$patient ? $patient->user->genre : '') == 'homme')checked @endif>
                                                <label class="form-check-label " for="homme">homme</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('genre') is-invalid @enderror" type="radio" id="femme" name="genre" value="femme" @if(old('genre',$patient ? $patient->user->genre : '') == 'femme') checked @endif>
                                                <label class="form-check-label " for="femme">Femme</label>
                                            </div>
                                            <div class="invalid-feedback">@error('genre') {{$message}} @enderror </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label   for="poids" :value="__('Poids')" class="mb-2 fw-500">Poids<span class="text-danger ms-1">*</span></label>
                                        <div class="input-group ">
                                            <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                            <input type="text" disabled class="form-control @error('poids') is-invalid @enderror" placeholder="Votre Poids en Kg" name="poids" value="{{ old('poids', $patient ? $patient->poids : '') }}" aria-label="poids" aria-describedby="addon-wrapping">
                                            <div class="invalid-feedback">@error('poids') {{$message}} @enderror </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Row -->
                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <label   for="age" :value="__('age')" class="mb-2 fw-500">Age<span class="text-danger ms-1">*</span></label>
                                        <div class="input-group ">
                                            <span class="input-group-text" id="addon-wrapping"><i class="fa fa-child"></i></span>
                                            <input type="text" disabled class="form-control  @error('age') is-invalid @enderror" placeholder="Votre age" aria-label="age" name="age" value="{{ old('age', $patient ? $patient->user->age : '') }}" aria-describedby="addon-wrapping">
                                            <div class="invalid-feedback">@error('age') {{$message}} @enderror </div>
                                            </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label   for="telephone" :value="__('telephone')" class="mb-2 fw-500">Téléphone<span class="text-danger ms-1">*</span></label>
                                        <div class="input-group ">
                                            <span class="input-group-text" id="addon-wrapping"><i class="icon icon-phone"></i></span>
                                            <input type="text" disabled class="form-control @error('telephone') is-invalid @enderror" placeholder="votre telephone" aria-label="telephone" name="telephone" value="{{ old('telephone', $patient ? $patient->user->telephone : '') }}" aria-describedby="addon-wrapping">
                                            <div class="invalid-feedback">@error('telephone') {{$message}} @enderror </div>
                                            </div>
                                    </div>
                                </div>

                                <!--End Row-->
                                <!-- Row -->
                                 <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <label   for="adresse" :value="__('Adresse')" class="mb-2 fw-500">Adresse<span class="text-danger ms-1">*</span></label>
                                        <div class="input-group ">
                                            <span class="input-group-text" id="addon-wrapping"><i class="icon icon-location-pin"></i></span>
                                            <input type="text" disabled class="form-control @error('adresse') is-invalid @enderror" name="adresse" placeholder="votre adresse" aria-label="adresse" value="{{ old('adresse', $patient ? $patient->user->adresse : '') }}" aria-describedby="addon-wrapping">
                                            <div class="invalid-feedback">@error('adresse') {{$message}} @enderror </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label   for="ville" :value="__('ville')" class="mb-2 fw-500">Ville<span class="text-danger ms-1">*</span></label>
                                        <div class="input-group ">
                                            <span class="input-group-text" id="addon-wrapping"><i class="icon icon-location-pin"></i></span>
                                            <input type="text" disabled class="form-control @error('ville') is-invalid @enderror" name="ville" placeholder="Votre ville" aria-label="ville" value="{{ old('ville', $patient ? $patient->ville : '') }}" aria-describedby="addon-wrapping">
                                            <div class="invalid-feedback">@error('ville') {{$message}} @enderror </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label   for="photo" :value="__('photo')" class="mb-2 fw-500">Photo<span class="text-danger ms-1">*</span></label>
                                        <div class="input-group ">
                                            <span class="input-group-text" id="addon-wrapping"><i class="icon icon-picture"></i></span>
                                            <input type="file" disabled class="form-control  @error('photo') is-invalid @enderror" name="photo" placeholder="Votre photo" aria-label="photo" value="{{ old('photo', $patient ? $patient->user->photo : '') }}" aria-describedby="addon-wrapping" >
                                            <div class="invalid-feedback">@error('photo') {{$message}} @enderror </div>
                                        </div>
                                    </div>


                                </div>

                                <!--End Row-->
                            </div>

                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h6>INFORMATION DE CONNEXION</h6></div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="">
                                <div >
                                    <div class="row mb-4">
                                        <div class="">
                                            <div class="">
                                                <label   for="name" :value="__('name')" class="mb-2 fw-500">Nom utilisateur<span class="text-danger ms-1">*</span></label>
                                                <div class="input-group ">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                                    <input type="text" disabled class="form-control @error('name') is-invalid @enderror" name="name" placeholder="votre name" aria-label="name" aria-describedby="addon-wrapping" value="{{ old('name', $patient ? $patient->user->name : '') }}" ><br>
                                                    <div class="invalid-feedback">@error('name') {{$message}} @enderror </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="">
                                            <div class="">
                                                <label   for="email" :value="__('email')" class="mb-2 fw-500">email<span class="text-danger ms-1">*</span></label>
                                                <div class="input-group ">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="icon icon-envelope-letter"></i></span>
                                                    <input type="text" disabled class="form-control @error('email') is-invalid @enderror" placeholder="votre email" name="email" aria-label="email" aria-describedby="addon-wrapping" value="{{ old('email', $patient ? $patient->user->email : '') }}" ><br>
                                                    <div class="invalid-feedback">@error('email') {{$message}} @enderror </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=" mt-2">
                                            <label for="statut" class="custom-switch-label m-0">
                                                {{ $patient->user->statut ? 'Actif' : 'Inactif' }}
                                            </label>

                                            <div class="col-md-4 position-relative">
                                                <label class="custom-switch m-0">
                                                    {{-- <input type="checkbox" id="statut"  class="custom-switch-input   @error('plublier') is-invalid @enderror"  id="plublierFloating" name="statut" value="{{ old('statut', $patient->user->statut)}} {{ $patient->user->statut ? 'checked' : '' }}"> --}}
                                                    <input type="checkbox" id="statut" class="custom-switch-input @error('plublier') is-invalid @enderror" id="plublierFloating" name="statut" {{ old('statut', $patient->user->statut) ? 'checked' : '' }}>

                                                    <span class="custom-switch-indicator"></span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-primary" type="submit">

                                {{ $patient->user->statut ? ' D\'ésactiver le compte' : ' Activation le Compte' }}


                            </button>

                        </div>

                    </div>
                </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection


