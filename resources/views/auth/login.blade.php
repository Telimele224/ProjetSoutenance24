@extends('layouts.contenu')

@section('contenu')

<div class="container-lg">
    <div class="row justify-content-center mt-4 mx-0">
       <div class="col-xl-4 col-lg-6">
          <div class="card shadow-none">
            <div class="row m-3">
                <div class="text-center">
                   <a href="index.html"><img src="{{asset('Image/Logo HRL.png')}}" width="50" height="50" class="header-brand-img" alt=""></a>
                </div>
             </div>
             <div class="card-body p-sm-6">
                <div class="text-center mb-3">
                   <h4 class="mb-1">CONNECTEZ-VOUS</h4>
                   <p>Connectez-vous à votre compte pour continuer.</p>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('login') }}">
                   @csrf
                   <!-- Email Address -->
             <div class="row">
                 <div class="col-sm-12">
                     <div class="mb-3">
                         <label class="form-label " for="email" :value="__('Email')">Email<span class="text-danger ms-1">*</span></label>
                         <input class="form-control ms-0 @error('email') is-invalid @enderror"  id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Entrer votre email" :value="old('password')" required autofocus autocomplete="username">
                         <div class="invalid-feedback">@error('email') {{$message}} @enderror </div>
                     </div>
                 </div>
                   <!-- Password -->
                   <div class="col-sm-12">
                     <div class="mb-3">
                         <label class="form-label " for="password" :value="__('Password')">Mot de passe<span class="text-danger ms-1">*</span></label>
                         <input class="form-control ms-0 @error('password') is-invalid @enderror"  id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Entrer votre password" :value="old('password')" required autofocus autocomplete="username">
                         <div class="invalid-feedback">@error('password') {{$message}} @enderror </div>
                     </div>
                 </div>
                 <div class="col-xl-12">
                     <div class="d-flex mb-3">
                         <div class="form-check d-flex align-items-center">
                             <label for="remember_me" class="inline-flex items-center">
                                 <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-800 border-gray-200 dark:border-gray-600 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                 <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Souvenir') }}</span>
                             </label>
                         </div>
                         <div class="ms-auto">
                             @if (Route::has('password.request'))
                             <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                     {{ __('Mot de passe oublié ?') }}
                             </a>
                             @endif
                         </div>
                     </div>
                     <div class="d-grid mb-3">
                         <x-primary-button class="ms-3 btn btn-primary">
                             {{ __('Connexion') }}
                          </x-primary-button>
                     </div>
                     <div class="text-center">
                         <p class="mb-0 tx-14">Vous n'avez pas encore de compte?
                             <a href="{{route('register')}}" class="tx-primary ms-1 text-decoration-underline">S'inscrire</a>
                         </p>
                     </div>
                     <p class="text-center mt-3 mb-2">Se connecter avec</p>
                         <div class="d-flex justify-content-center">
                             <div class="btn-list">
                                 <button class="btn btn-icon bg-primary-transparent rounded-pill border-0" type="button">
                                     <span class="btn-inner--icon"><i class="fa fa-facebook"></i></span>
                                 </button>
                                 <button class="btn btn-icon bg-primary-transparent rounded-pill border-0" type="button">
                                         <span class="btn-inner--icon"><i class="fa fa-google"></i></span>
                                     </button>
                                 <button class="btn btn-icon bg-primary-transparent rounded-pill border-0" type="button">
                                         <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
                                     </button>
                                 <button class="btn btn-icon bg-primary-transparent rounded-pill border-0" type="button">
                                         <span class="btn-inner--icon"><i class="fa fa-linkedin"></i></span>
                                 </button>
                             </div>
                         </div>
                 </div>
             </div>
             </form>

             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
