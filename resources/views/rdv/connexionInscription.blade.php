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

        <!-- Section Déjà Patient -->
    <div class="card w-100 my-3">
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

    <div class="card w-100 my-3">
        <div class="card-header text-center">
            <h6>Nouveau Patient ?</h6>
        </div>
        <div class="card-body" id="nouveauPatientSection" style="display: none;">
            <form action="{{ route('patients.nouveau_patient') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6 mb-2">
                        <label for="">Nom d'utilisateur </label>
                        <input type="text" name="name" value="{{old('name')}}"  class="form-control ">
                        @error('name')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-sm-6 mb-2">
                        <label for="">Nom </label>
                        <input type="text" name="nom" value="{{old('nom')}}"  class="form-control ">
                        @error('nom')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-sm-6 mb-2">
                        <label for="">Prenom </label>
                        <input type="text" name="prenom" value="{{old('prenom')}}"  class="form-control ">
                        @error('prenom')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-sm-6 mb-2">
                        <label for="">Age</label>
                        <input type="text" name="age" value="{{old('age')}}"  class="form-control ">
                        @error('age')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-sm-6 mb-2">
                        <label for="">Adresse</label>
                        <input type="text" name="adresse" value="{{old('adresse')}}"  class="form-control ">
                        @error('adresse')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-sm-6 mb-2">
                        <label for="">Genre</label>
                        <select name="genre" class="form-control ">
                            <option value="homme" >Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-6 mb-2">
                        <label for="">Ville</label>
                        <input type="text" name="ville" value="{{old('ville')}}"  class="form-control ">
                        @error('ville')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group col-sm-12 mb-2">
                        <label for="">Email </label>
                        <input type="mail" name="email" value="{{old('email')}}"  class="form-control ">
                        @error('email')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-sm-6 mb-2">
                        <label for="">Telephone </label>
                        <input type="text" name="telephone" value="{{old('telephone')}}"  class="form-control ">
                        @error('telephone')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="form-group col-sm-6 mb-2">
                        <label for=""> choisir un avatar</label>
                        <input type="file" name="avatar" value="{{old('avatar')}}"  class="form-control ">
                        @error('avatar')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group col-sm-6 mb-2">
                        <label for="">Mot de passe </label>
                        <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control">
                        @error('password')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group col-sm-6 mb-2">
                            <label  for="password_confirmation" :value="__('Confirm Password')" class="mb-2 fw-500">Confirmation votre mot de passe<span class="text-danger ms-1">*</span></label>
                            <div class="input-group has-validation">
                                <button class="btn btn-light" onclick="createpassword('signup-confirmpassword',this)" type="button" id="button-addon21"><i class="ri-eye-off-line align-middle"></i></button>
                                <input type="password" class="form-control ms-0 border-end-0" name="password_confirmation" placeholder="Confirmation votre mot de passe" id="signup-confirmpassword" >
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                    </div>

                    <div class="form-group col-sm-12 mb-2">
                        <label for="">Action</label>
                        <button class="btn btn-outline-success form-control" name="submit">Enregistrer</button>
                    </div>
                </div>
            </div>
            </form>
            <div class="card-footer d-grid gap-2">
                <button class="btn btn-outline-warning" type="submit"  onclick="toggleSection('nouveauPatientSection')">S'INSCRIRE POUR CONFIRMER</button>
            </div>
     </div>


</div>





<script>
    function toggleSection(sectionId) {
        var section = document.getElementById(sectionId);
        section.style.display = section.style.display === 'none' ? 'block' : 'none';
    }
</script>

@endsection
