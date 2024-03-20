@extends('en_tete.entete_administrateurs')

{{-- @section('title',$medecin->exists? "MODIFIER UN MEDECIN":"AJOUTER UN MEDECIN ") --}}

@section('contenu')
<div class="card">
    <div class="card-body">
       <h1 class="my-3">@yield('title')</h1>
       <div class="row ">
          <div class="col-xl-8 col-sm-6 col-md-6">
             <div class="card">
                <div class="text-center mb-0">
                   <h4 class="mb-1">S'INSCRIRE</h4>
                   <p>Creation d'un compte pour continuer.</p>
                </div>
                <form action="{{ $action }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @if ($method === 'put')
                        @method('PUT')
                    @endif
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col-lg-5">
                            <label   for="nom" :value="__('Nom')" class="mb-2 fw-500">Nom<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                <input type="text" class="form-control   @error('nom') is-invalid @enderror" name="nom" placeholder="Votre nom" aria-label="nom" aria-describedby="addon-wrapping"  value="{{ old('nom', $medecin ? $medecin->user->nom : '') }}">
                                <div class="invalid-feedback">@error('nom') {{$message}} @enderror </div>
                                </div>
                        </div>
                        <div class="col-lg-6">
                            <label   for="prenom" :value="__('Prenom')" class="mb-2 fw-500">Prenom<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" placeholder="votre prenom" name="prenom" aria-label="prenom" aria-describedby="addon-wrapping" value="{{ old('prenom', $medecin ? $medecin->user->prenom : '') }}"  >
                                <div class="invalid-feedback">@error('prenom') {{$message}} @enderror </div>
                                </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-lg-5">

                            <div>
                                <label for="genre" class="mb-2 fw-500">Genre<span class="text-danger ms-1">*</span></label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('genre') is-invalid @enderror" type="radio" id="homme" name="genre" value="homme" @if(old('genre',$medecin ? $medecin->user->genre : '') == 'femme')checked @endif>
                                    <label class="form-check-label " for="homme">homme</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('genre') is-invalid @enderror" type="radio" id="femme" name="genre" value="femme" @if(old('genre',$medecin ? $medecin->user->genre : '') == 'femme') checked @endif>
                                    <label class="form-check-label " for="femme">Femme</label>
                                </div>
                                <div class="invalid-feedback">@error('genre') {{$message}} @enderror </div>
                            </div>

                    </div>
                        <div class="col-lg-6">
                                <label   for="adresse" :value="__('Adresse')" class="mb-2 fw-500">Adresse<span class="text-danger ms-1">*</span></label>
                                <div class="input-group ">
                                    <span class="input-group-text" id="addon-wrapping"><i class="icon icon-location-pin"></i></span>
                                    <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" placeholder="votre adresse" aria-label="adresse" aria-describedby="addon-wrapping" value="{{ old('adresse', $medecin ? $medecin->user->adresse : '') }}">
                                    <div class="invalid-feedback">@error('adresse') {{$message}} @enderror </div>
                                </div>
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="row mb-1">
                        <div class="col-lg-5">
                            <label   for="age" :value="__('age')" class="mb-2 fw-500">Age<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                <input type="text" class="form-control  @error('age') is-invalid @enderror" placeholder="Votre age" aria-label="age" name="age" aria-describedby="addon-wrapping" value="{{ old('age', $medecin ? $medecin->user->age : '') }}"  >
                                <div class="invalid-feedback">@error('age') {{$message}} @enderror </div>
                                </div>
                        </div>
                        <div class="col-lg-6">
                            <label   for="telephone" :value="__('telephone')" class="mb-2 fw-500">Téléphone<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="icon icon-phone"></i></span>
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror" placeholder="votre telephone" aria-label="telephone" name="telephone" aria-describedby="addon-wrapping" value="{{ old('telephone', $medecin ? $medecin->user->telephone : '') }}"  >
                                <div class="invalid-feedback">@error('telephone') {{$message}} @enderror </div>
                                </div>
                        </div>
                    </div>

                    <!--End Row-->
                    <!-- Row -->
                     <div class="row mb-1">
                       <div class="col-lg-5">
                            <label   for="service" :value="__('service')" class="mb-2 fw-500">Service<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                <select id="service_id" name="service_id" class="wide">
                                    @foreach ($services as $service)
                                    <option value="{{ $service->service_id }}" {{ old('service_id', $medecin ? $medecin->service_id : '') == $service->service_id ? 'selected' : '' }}>
                                        {{ $service->nom }}
                                    </option>
                                @endforeach
                                </select>
                                <div class="invalid-feedback">@error('service') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label   for="statut" :value="__('statut')" class="mb-2 fw-500">statut<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                <select id="statut" name="statut" class="wide">
                                    <option value="active "{{ old('statut', $medecin ? $medecin->statut : '') == 'active' ? 'selected' : '' }}   >Actif</option>
                                    <option value="inactive" {{ old('statut', $medecin ? $medecin->statut : '') == 'inactive' ? 'selected' : '' }}>Inactif</option>
                                </select>
                                <div class="invalid-feedback">@error('statut') {{$message}} @enderror </div>
                                </div>
                        </div>
                    </div>

                    <!--End Row-->
                    <!-- Row -->
                    <div class="row mb-1">
                        <div class="col-lg-5">
                            <label   for="specialite" :value="__('specialite')" class="mb-2 fw-500">Spécialite<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                <input type="text" placeholder="votre specialite" class="form-control  @error('specialite') is-invalid @enderror" name="specialite" value="{{ old('specialite', $medecin ? $medecin->specialite : '') }}" class="form-control">
                                <div class="invalid-feedback">@error('specialite') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label   for="photo" :value="__('avatar')" class="mb-2 fw-500">Photo<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="icon icon-picture"></i></span>
                                <input type="file" class="form-control  @error('avatar') is-invalid @enderror" name="avart" placeholder="Votre photo" aria-label="avatar" aria-describedby="addon-wrapping" value="{{ old('avatar', $medecin ? $medecin->user->avatar : '') }}">
                                <div class="invalid-feedback">@error('avatar') {{$message}} @enderror </div>
                                </div>
                        </div>
                    </div>

                    <!--End Row-->
                    <div class="row mb-1">
                        <div class="form-group mb-0">
                            <label   for="biographie" :value="__('biographie')" class="mb-2 fw-500">Biographie<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                <textarea cols="30" rows="4" class="form-control @error('biographie') is-invalid @enderror" name="biographie" placeholder="votre biographie" aria-label="biographie" aria-describedby="addon-wrapping" >{{ old('biographie', $medecin ? $medecin->biographie : '') }} </textarea>
                                <div class="invalid-feedback">@error('biographie') {{$message}} @enderror </div>
                                </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"><H5>Information de Connexion</H5></div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="">
                            <div >
                                <div class="row mb-1">
                                    <div class="">
                                        <div class="">
                                            <label   for="name" :value="__('name')" class="mb-2 fw-500">Nom utilisateur<span class="text-danger ms-1">*</span></label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="votre nom d'utilisateur" aria-label="name" aria-describedby="addon-wrapping" value="{{ old('name', $medecin ? $medecin->user->name : '') }}">
                                                <div class="invalid-feedback">@error('name') {{$message}} @enderror </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="">
                                        <div class="">
                                            <label   for="email" :value="__('email')" class="mb-2 fw-500">Email<span class="text-danger ms-1">*</span></label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="addon-wrapping"><i class="icon icon-envelope-letter"></i></span>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="votre email" aria-label="email" aria-describedby="addon-wrapping" value="{{ old('email', $medecin ? $medecin->user->email : '') }}">
                                                <div class="invalid-feedback">@error('email') {{$message}} @enderror </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="">
                                        <div class="">
                                            <label   for="password" :value="__('Password')" class="mb-2 fw-500">Crée un  mot de passe<span class="text-danger ms-1">*</span></label>
                                            <div class="input-group has-validation">
                                                <button class="btn btn-light" onclick="createpassword('signup-password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                                <input type="password" name="password" id="password"  class="form-control  @error('password') is-invalid @enderror">
                                                <div class="invalid-feedback">@error('password') {{$message}} @enderror </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                            <label  for="password_confirmation" :value="__('Confirm Password')" class="mb-2 fw-500">Confirmation mot de passe<span class="text-danger ms-1">*</span></label>
                                            <div class="input-group has-validation">
                                                <button class="btn btn-light" onclick="createpassword('signup-confirmpassword',this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                                                <input type="password" class="form-control ms-0 border-end-0" name="password_confirmation" placeholder="Confirmation votre mot de passe" id="signup-confirmpassword">
                                                <div class="invalid-feedback">
                                                    Veuillez entrer un mot de passe correspondant.
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary" type="submit">
                             enregistrer
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


