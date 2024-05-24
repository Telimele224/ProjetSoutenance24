<!-- Contenu de la vue connexionInscription -->
@extends('rdv.headerRdv')

@section('contenu')
<div class="container">
    @if(Session::has('success'))
    <div id="successMessage" class="alert alert-success" style="height: 50px; margin-bottom: 15px">
        {{ Session::get('success') }}
    </div>
    @elseif(Session::has('error'))
    <div id="successMessage" class="alert alert-danger " style="height: 50px;margin-bottom:15px">
        {{Session::get('error') }}
    </div>
    @endif
    <div class="card mt-4 ">
            <div class="title">
                <h6 class="text-uppercase text-center p-3">Connectez vous ou crée votre compte pour continuer</h6>
            </div>
        <div class="row m-auto">
            <div class="col-md-7">
                <img src="{{asset('logo/HRLSIDEBAR.png')}}" alt="">
            </div>
            <div class="col-md-5">
                <div class="card row">
                    <div class="row mt-5 mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body" id="dejaPatientSection" style="display: none;">
                                    <form action="{{ route('patients.login_patient') }}" method="post">
                                        @csrf
                                      <div class="row">
                                      <div class="form-group col-sm-12 mb-2">
                                            <label for="">Email </label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                <input type="mail" name="email" value="{{ old('email') }}" class="form-control">
                                            </div>
                                            @error('email')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-group col-sm-12 mb-2">
                                            <label for="">Mot de Passe</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                                <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                                            </div>
                                            @error('password')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group col-sm-12 mb-2">
                                            <label for="">Action</label>
                                            <button class="btn btn-outline-success form-control text-uppercase" type="submit" name="submit">S'authentifier</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>

                                <div class="card-footer d-grid gap-2">
                                    <button class="btn btn-outline-primary" onclick="toggleSection('dejaPatientSection')">CONNECTEZ-VOUS</button>
                                </div>
                                <div class="col">
                                    <hr style="border: 1px solid black;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body" id="nouveauPatientSection" style="display: none;">
                                    <form method="POST" action="{{ route('patients.nouveau_patient') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row mb-1">
                                                <div class="col-lg-6">
                                                    <label   for="nom" :value="__('Nom')" class="mb-2 fw-500">Nom<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                                        <input type="text" class="form-control   @error('nom') is-invalid @enderror" name="nom" placeholder="Votre nom" value="{{ old('nom') }}" aria-label="nom" aria-describedby="addon-wrapping">
                                                        <div class="invalid-feedback">@error('nom') {{$message}} @enderror </div>
                                                        </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label   for="prenom" :value="__('Prenom')" class="mb-2 fw-500">Prenom<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group ">
                                                        <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" placeholder="votre prenom" name="prenom" aria-label="prenom" value="{{ old('prenom') }}" aria-describedby="addon-wrapping">
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
                                                            <input class="form-check-input @error('genre') is-invalid @enderror" type="radio" id="homme" name="genre" value="homme" @if(old('genre') == 'homme')checked @endif>
                                                            <label class="form-check-label " for="homme">homme</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input @error('genre') is-invalid @enderror" type="radio" id="femme" name="genre" value="femme" @if(old('genre') == 'femme') checked @endif>
                                                            <label class="form-check-label " for="femme">Femme</label>
                                                        </div>
                                                        <div class="invalid-feedback">@error('genre') {{$message}} @enderror </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label   for="poids" :value="__('Poids')" class="mb-2 fw-500">Poids<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group ">
                                                        <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                                        <input type="text" class="form-control @error('poids') is-invalid @enderror" placeholder="Votre Poids en Kg" name="poids" value="{{ old('poids') }}" aria-label="poids" aria-describedby="addon-wrapping">
                                                        <div class="invalid-feedback">@error('poids') {{$message}} @enderror </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Row -->
                                            <div class="row mb-1">
                                                <div class="col-lg-6">
                                                    <label   for="age" :value="__('age')" class="mb-2 fw-500">Age<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group ">
                                                        <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                                        <input type="text" class="form-control  @error('age') is-invalid @enderror" placeholder="Votre age" aria-label="age" name="age" value="{{ old('age') }}" aria-describedby="addon-wrapping">
                                                        <div class="invalid-feedback">@error('age') {{$message}} @enderror </div>
                                                        </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label   for="telephone" :value="__('telephone')" class="mb-2 fw-500">Téléphone<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group ">
                                                        <span class="input-group-text" id="addon-wrapping"><i class="icon icon-phone"></i></span>
                                                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" placeholder="votre telephone" aria-label="telephone" name="telephone" value="{{ old('telephone') }}" aria-describedby="addon-wrapping">
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
                                                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" placeholder="votre adresse" aria-label="adresse" value="{{ old('adresse') }}" aria-describedby="addon-wrapping">
                                                        <div class="invalid-feedback">@error('adresse') {{$message}} @enderror </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label   for="ville" :value="__('ville')" class="mb-2 fw-500">ville<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group ">
                                                        <span class="input-group-text" id="addon-wrapping"><i class="icon icon-location-pin"></i></span>
                                                        <input type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" placeholder="Votre ville" aria-label="ville" value="{{ old('ville') }}" aria-describedby="addon-wrapping">
                                                        <div class="invalid-feedback">@error('ville') {{$message}} @enderror </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label   for="photo" :value="__('photo')" class="mb-2 fw-500">photo<span class="text-danger ms-1">*</span></label>
                                                    <div class="input-group ">
                                                        <span class="input-group-text" id="addon-wrapping"><i class="icon icon-picture"></i></span>
                                                        <input type="file" class="form-control  @error('photo') is-invalid @enderror" name="photo" placeholder="Votre photo" aria-label="photo" value="{{ old('photo') }}" aria-describedby="addon-wrapping" >
                                                        <div class="invalid-feedback">@error('photo') {{$message}} @enderror </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="card-header mt-3">
                                                <div class="card-title small"><h6>INFORMATION DE CONNEXION</h6></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 ">
                                                    <div class="">
                                                        <div class="">
                                                            <label   for="name" :value="__('name')" class="mb-2 fw-500">Nom utilisateur<span class="text-danger ms-1">*</span></label>
                                                            <div class="input-group ">
                                                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="votre name" aria-label="name" aria-describedby="addon-wrapping" value="{{ old('name') }}" ><br>
                                                                <div class="invalid-feedback">@error('name') {{$message}} @enderror </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 ">
                                                    <div class="">
                                                        <div class="">
                                                            <label   for="email" :value="__('email')" class="mb-2 fw-500">email<span class="text-danger ms-1">*</span></label>
                                                            <div class="input-group ">
                                                                <span class="input-group-text" id="addon-wrapping"><i class="icon icon-envelope-letter"></i></span>
                                                                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="votre email" name="email" aria-label="email" aria-describedby="addon-wrapping" value="{{ old('email') }}" ><br>
                                                                <div class="invalid-feedback">@error('email') {{$message}} @enderror </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="">
                                                        <div class="">
                                                            <label   for="password" :value="__('Password')" class="mb-2 fw-500">Crée un  mot de passe<span class="text-danger ms-1">*</span></label>
                                                            <div class="input-group has-validation">
                                                                <button class="btn btn-light" onclick="createpassword('signup-password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                                                <input type="password" class="form-control ms-0  @error('password') is-invalid @enderror" name="password" placeholder="Crée un mot de passe" id="signup-password" value="{{ old('password') }}">
                                                                <div class="invalid-feedback">@error('password') {{$message}} @enderror </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="">
                                                            <label  for="password_confirmation" :value="__('Confirm Password')" class="mb-2 fw-500">Confirmation votre mot de passe<span class="text-danger ms-1">*</span></label>
                                                            <div class="input-group has-validation">
                                                                <button class="btn btn-light" onclick="createpassword('signup-confirmpassword',this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                                                                <input type="password" class="form-control ms-0 " name="password_confirmation" placeholder="Confirmation votre mot de passe" id="signup-confirmpassword" >
                                                                <div class="invalid-feedback">
                                                                    Please choose a username.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class=" card-footer text-center">
                                                        <button class=" col-lg-12 btn btn-success text-uppercase" name="submit" type="submit">

                                                                Connexion

                                                        </button>

                                                    </div>
                                            </div>

                                            <!--End Row-->
                                        </div>

                                </div>
                            </div>

                                    </form>
                            <div class="card-footer d-grid gap-2">
                                <button class="btn btn-outline-primary" type="submit"  onclick="toggleSection('nouveauPatientSection')">S'INSCRIRE POUR CONFIRMER</button>
                            </div>
                     </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Section Déjà Patient -->
    {{-- <div class="card w-100 my-3">
        <div class="card-header text-center">
            <h6>Déjà Patient ?</h6>
        </div>
        <div class="card-body" id="dejaPatientSection" style="display: none;">
            <form action="{{ route('patients.login_patient') }}" method="post">
                @csrf
              <div class="row">
              <div class="form-group col-sm-12 mb-2">
                    <label for="">Email </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="mail" name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                    @error('email')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                </div>
                <div class="form-group col-sm-12 mb-2">
                    <label for="">Mot de Passe</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                    </div>
                    @error('password')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                </div>

                <div class="form-group col-sm-12 mb-2">
                    <label for="">Action</label>
                    <button class="btn btn-outline-success form-control" type="submit" name="submit">S'authentifier</button>
                </div>
            </div>
            </form>
        </div>

        <div class="card-footer d-grid gap-2">
            <button class="btn btn-outline-info" onclick="toggleSection('dejaPatientSection')">CONNECTEZ-VOUS</button>
        </div>
    </div>

    <div class="card w-100 my-3"> --}}
        {{-- <div class="card-header text-center">
            <h6>Nouveau Patient ?</h6>
        </div>
        <div class="card-body" id="nouveauPatientSection" style="display: none;">
                    <form method="POST" action="{{ route('patients.nouveau_patient') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-1">
                                <div class="col-lg-6">
                                    <label   for="nom" :value="__('Nom')" class="mb-2 fw-500">Nom<span class="text-danger ms-1">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                        <input type="text" class="form-control   @error('nom') is-invalid @enderror" name="nom" placeholder="Votre nom" value="{{ old('nom') }}" aria-label="nom" aria-describedby="addon-wrapping">
                                        <div class="invalid-feedback">@error('nom') {{$message}} @enderror </div>
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                    <label   for="prenom" :value="__('Prenom')" class="mb-2 fw-500">Prenom<span class="text-danger ms-1">*</span></label>
                                    <div class="input-group ">
                                        <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" placeholder="votre prenom" name="prenom" aria-label="prenom" value="{{ old('prenom') }}" aria-describedby="addon-wrapping">
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
                                            <input class="form-check-input @error('genre') is-invalid @enderror" type="radio" id="homme" name="genre" value="homme" @if(old('genre') == 'homme')checked @endif>
                                            <label class="form-check-label " for="homme">homme</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('genre') is-invalid @enderror" type="radio" id="femme" name="genre" value="femme" @if(old('genre') == 'femme') checked @endif>
                                            <label class="form-check-label " for="femme">Femme</label>
                                        </div>
                                        <div class="invalid-feedback">@error('genre') {{$message}} @enderror </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label   for="poids" :value="__('Poids')" class="mb-2 fw-500">Poids<span class="text-danger ms-1">*</span></label>
                                    <div class="input-group ">
                                        <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                        <input type="text" class="form-control @error('poids') is-invalid @enderror" placeholder="Votre Poids en Kg" name="poids" value="{{ old('poids') }}" aria-label="poids" aria-describedby="addon-wrapping">
                                        <div class="invalid-feedback">@error('poids') {{$message}} @enderror </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row -->
                            <div class="row mb-1">
                                <div class="col-lg-6">
                                    <label   for="age" :value="__('age')" class="mb-2 fw-500">Age<span class="text-danger ms-1">*</span></label>
                                    <div class="input-group ">
                                        <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                        <input type="text" class="form-control  @error('age') is-invalid @enderror" placeholder="Votre age" aria-label="age" name="age" value="{{ old('age') }}" aria-describedby="addon-wrapping">
                                        <div class="invalid-feedback">@error('age') {{$message}} @enderror </div>
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                    <label   for="telephone" :value="__('telephone')" class="mb-2 fw-500">Téléphone<span class="text-danger ms-1">*</span></label>
                                    <div class="input-group ">
                                        <span class="input-group-text" id="addon-wrapping"><i class="icon icon-phone"></i></span>
                                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" placeholder="votre telephone" aria-label="telephone" name="telephone" value="{{ old('telephone') }}" aria-describedby="addon-wrapping">
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
                                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" placeholder="votre adresse" aria-label="adresse" value="{{ old('adresse') }}" aria-describedby="addon-wrapping">
                                        <div class="invalid-feedback">@error('adresse') {{$message}} @enderror </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label   for="ville" :value="__('ville')" class="mb-2 fw-500">ville<span class="text-danger ms-1">*</span></label>
                                    <div class="input-group ">
                                        <span class="input-group-text" id="addon-wrapping"><i class="icon icon-location-pin"></i></span>
                                        <input type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" placeholder="Votre ville" aria-label="ville" value="{{ old('ville') }}" aria-describedby="addon-wrapping">
                                        <div class="invalid-feedback">@error('ville') {{$message}} @enderror </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label   for="photo" :value="__('photo')" class="mb-2 fw-500">photo<span class="text-danger ms-1">*</span></label>
                                    <div class="input-group ">
                                        <span class="input-group-text" id="addon-wrapping"><i class="icon icon-picture"></i></span>
                                        <input type="file" class="form-control  @error('photo') is-invalid @enderror" name="photo" placeholder="Votre photo" aria-label="photo" value="{{ old('photo') }}" aria-describedby="addon-wrapping" >
                                        <div class="invalid-feedback">@error('photo') {{$message}} @enderror </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-header mt-3">
                                <div class="card-title small"><h6>INFORMATION DE CONNEXION</h6></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 ">
                                    <div class="">
                                        <div class="">
                                            <label   for="name" :value="__('name')" class="mb-2 fw-500">Nom utilisateur<span class="text-danger ms-1">*</span></label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="votre name" aria-label="name" aria-describedby="addon-wrapping" value="{{ old('name') }}" ><br>
                                                <div class="invalid-feedback">@error('name') {{$message}} @enderror </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="">
                                        <div class="">
                                            <label   for="email" :value="__('email')" class="mb-2 fw-500">email<span class="text-danger ms-1">*</span></label>
                                            <div class="input-group ">
                                                <span class="input-group-text" id="addon-wrapping"><i class="icon icon-envelope-letter"></i></span>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="votre email" name="email" aria-label="email" aria-describedby="addon-wrapping" value="{{ old('email') }}" ><br>
                                                <div class="invalid-feedback">@error('email') {{$message}} @enderror </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="">
                                        <div class="">
                                            <label   for="password" :value="__('Password')" class="mb-2 fw-500">Crée un  mot de passe<span class="text-danger ms-1">*</span></label>
                                            <div class="input-group has-validation">
                                                <button class="btn btn-light" onclick="createpassword('signup-password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                                <input type="password" class="form-control ms-0 border-end-0 @error('password') is-invalid @enderror" name="password" placeholder="Crée un mot de passe" id="signup-password" value="{{ old('password') }}">
                                                <div class="invalid-feedback">@error('password') {{$message}} @enderror </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                            <label  for="password_confirmation" :value="__('Confirm Password')" class="mb-2 fw-500">Confirmation votre mot de passe<span class="text-danger ms-1">*</span></label>
                                            <div class="input-group has-validation">
                                                <button class="btn btn-light" onclick="createpassword('signup-confirmpassword',this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                                                <input type="password" class="form-control ms-0 border-end-0" name="password_confirmation" placeholder="Confirmation votre mot de passe" id="signup-confirmpassword" >
                                                <div class="invalid-feedback">
                                                    Please choose a username.
                                                </div>
                                            </div>
                                    </div>
                                    <div class=" card-footer text-center">
                                        <button class=" col-lg-12 btn btn-success" name="submit" type="submit">

                                                Connexion

                                        </button>

                                    </div>
                            </div>

                            <!--End Row-->
                        </div>

                </div>
            </div>

                    </form>
            <div class="card-footer d-grid gap-2">
                <button class="btn btn-outline-warning" type="submit"  onclick="toggleSection('nouveauPatientSection')">S'INSCRIRE POUR CONFIRMER</button>
            </div>
     </div> --}}


</div>





<script>
    function toggleSection(sectionId) {
        var section = document.getElementById(sectionId);
        section.style.display = section.style.display === 'none' ? 'block' : 'none';
    }
</script>

@endsection
