@extends('en_tete.entete_administrateurs')
@section('contenu')
<div class="card">
   <div class="card-body">
      <h1 class="my-3">@yield('title')</h1>
      <div class="row ">
         <div class="col-xl-8 col-sm-6 col-md-6">
            <div class="card">
               <div class="text-center mb-0">
                  <h3 class="card-title mt-4">CREATION D'UN COMPTE ADMIN</h3>
                  <p class="small dark">Vous allez crée un compte admin avec ce formulaire.</p>
               </div>
               <form method="POST" action="{{ $action }}">
                  @csrf
                  <div class="card-body">
                     <div class="row mb-1">
                        <div class="col-lg-6">
                           <label   for="nom" :value="__('Nom')" class="mb-2 fw-500">Nom<span class="text-danger ms-1">*</span></label>
                           <div class="input-group">
                              <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                              <input type="text" class="form-control   @error('nom') is-invalid @enderror" name="nom" placeholder="votre nom" value="{{ old('nom', $administrateur ? $administrateur->nom : '') }}" aria-label="nom" aria-describedby="addon-wrapping">
                              <div class="invalid-feedback">@error('nom') {{$message}} @enderror </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <label   for="prenom" :value="__('Prenom')" class="mb-2 fw-500">Prenom<span class="text-danger ms-1">*</span></label>
                           <div class="input-group ">
                              <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                              <input type="text" class="form-control @error('prenom') is-invalid @enderror" placeholder="votre prenom" name="prenom" aria-label="prenom" value="{{ old('prenom', $administrateur ? $administrateur->prenom : '') }}" aria-describedby="addon-wrapping">
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
                                 <input class="form-check-input @error('genre') is-invalid @enderror" type="radio" id="homme" name="genre" value="homme" @if(old('genre',$administrateur ? $administrateur->user->genre : '') == 'homme')checked @endif>
                                 <label class="form-check-label " for="homme">Homme</label>
                              </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input @error('genre') is-invalid @enderror" type="radio" id="femme" name="genre" value="femme" @if(old('genre',$administrateur ? $administrateur->user->genre : '') == 'femme') checked @endif>
                                 <label class="form-check-label " for="femme">Femme</label>
                              </div>
                              <div class="invalid-feedback">@error('genre') {{$message}} @enderror </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                            <label   for="age" :value="__('age')" class="mb-2 fw-500">Age<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                               <span class="input-group-text" id="addon-wrapping"><i class="fa fa-child"></i></span>
                               <input type="text" class="form-control  @error('age') is-invalid @enderror" placeholder="votre age" aria-label="age" name="age" value="{{ old('age', $administrateur ? $administrateur->age : '') }}" aria-describedby="addon-wrapping">
                               <div class="invalid-feedback">@error('age') {{$message}} @enderror </div>
                            </div>
                         </div>
                     </div>
                     <!-- Row -->
                    <div class="row mb-1">

                        <div class="col-lg-6">
                            <label   for="telephone" :value="__('telephone')" class="mb-2 fw-500">Téléphone<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="icon icon-phone"></i></span>
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror" placeholder="votre telephone" aria-label="telephone" name="telephone" value="{{ old('telephone', $administrateur ? $administrateur->telephone : '') }}" aria-describedby="addon-wrapping">
                                <div class="invalid-feedback">@error('telephone') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label   for="adresse" :value="__('Adresse')" class="mb-2 fw-500">Adresse<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                               <span class="input-group-text" id="addon-wrapping"><i class="icon icon-location-pin"></i></span>
                               <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" placeholder="votre adresse" aria-label="adresse" value="{{ old('adresse', $administrateur ? $administrateur->adresse : '') }}" aria-describedby="addon-wrapping">
                               <div class="invalid-feedback">@error('adresse') {{$message}} @enderror </div>
                            </div>
                         </div>
                    </div>
                     <!--End Row-->
                     <!-- Row -->
                     <div class="row mb-1">
                        <div class="col-lg-12">
                           <label   for="photo" :value="__('photo')" class="mb-2 fw-500">Photo</label>
                           <div class="input-group ">
                              <span class="input-group-text" id="addon-wrapping"><i class="icon icon-picture"></i></span>
                              <input type="file" class="form-control  @error('photo') is-invalid @enderror" name="photo" placeholder="image de votre profile" aria-label="photo" value="{{ old('photo', $administrateur ? $administrateur->photo : '') }}" aria-describedby="addon-wrapping" >
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
                    <h6 class="card-title">INFORMATION DE CONNEXION</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="">
                            <label for="name" :value="__('name')" class="mb-2 fw-500">Nom utilisateur<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="mdi mdi-account-convert"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="votre name" aria-label="name" value="{{ old('name', $administrateur ? $administrateur->name : '') }}" aria-describedby="addon-wrapping">
                                <div class="invalid-feedback">@error('name') {{$message}} @enderror </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="">
                            <label for="email" :value="__('email')" class="mb fw-500">email<span class="text-danger ms-1">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="icon icon-envelope-letter"></i></span>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="votre email" name="email" aria-label="email" value="{{ old('email', $administrateur ? $administrateur->email : '') }}">
                                <div class="invalid-feedback">@error('email') {{$message}} @enderror </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label   for="password" :value="__('Password')" class="mb-2 fw-500">Crée un  mot de passe<span class="text-danger ms-1">*</span></label>
                            <div class="input-group has-validation">
                                <button class="btn btn-light" onclick="createpassword('signup-password',this)" type="button" id="button-addon2"><i class="ri-eye-off-line align-middle input-group-text"></i></button>
                                <input type="password" class="form-control border-end-1 @error('password') is-invalid @enderror" name="password" placeholder="crée un mot de passe" id="signup-password" value="{{ old('password', $administrateur ? $administrateur->password : '') }}">
                                <div class="invalid-feedback">@error('password') {{$message}} @enderror </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label  for="password_confirmation" :value="__('Confirm Password')" class="mb-2 fw-500">Confirmation votre mot de passe<span class="text-danger ms-1">*</span></label>
                            <div class="input-group has-validation">
                                <button class="btn btn-light" onclick="createpassword('signup-confirmpassword',this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle input-group-text"></i></button>
                                <input type="password" class="form-control  border-end-1" name="password_confirmation" placeholder="confirmation votre mot de passe" id="signup-confirmpassword" >
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card-footer text-center">
                                <button class="btn btn-primary" type="submit"><span><i class="mdi mdi-check"></i></span>
                               VALIDER L'AJOUT D'AMIN
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
   </div>
</div>
@endsection
