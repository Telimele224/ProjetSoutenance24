@extends('layouts.contenu')

@section('contenu')

<div class="container-lg">
    <div class="row justify-content-center mt-4 mx-0">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
            <div class="card shadow-none">
                <div class="card-body p-sm-6">
                    <div class="text-center mb-4">
                        <h4 class="mb-1">Récuparation mot de passe</h4>
                          <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                    </div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="email" :value="__('Email')" class="mb-2 fw-500">Email<span class="text-danger ms-1">*</span></label>
                                <input class="form-control ms-0  @error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" required autofocus placeholder="Entrer votre adresse email">
                                <div class="invalid-feedback">@error('email') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="d-grid mb-3 btn btn-primary">
                                <button class="btn btn-primary">
                                    {{ __('Lien de réinitialisation du mot de passe par e-mail') }}
                                </button>


                            </div>
                            <div class="text-center">
                                <p class="mb-0 tx-14">Mémorisé votre mot de passe?
                                    <a href="{{route('login')}}" class="tx-primary ms-1 text-decoration-underline">Se connecter</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
