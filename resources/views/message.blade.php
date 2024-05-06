@extends('layouts.contenu')
<style>
    /* Ajout de styles pour centrer le contenu */
    .centrer-contenu {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Hauteur de la vue */
    }

    /* Ajout de styles pour centrer horizontalement */
    .centrer-horizontalement {
        text-align: center;
    }
</style>
@section('contenu')

<div class="centrer-contenu">

    <div class="mb-4 text-lg centrer-horizontalement container">
        <div class="container">
            {{ __('Votre compte a été désactivé. Si vous avez des questions ou besoin d\'aide, veuillez contacter l\'administrateur du site pour plus d\'informations.') }}
        </div>
        

    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm centrer-horizontalement">
        {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse e-mail que vous avez fournie lors de l\'inscription.') }}
    </div>
    @endif

    <div class="mt-4 flex items-center justify-between centrer-horizontalement">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button class="btn btn-primary">
                    {{ __('Renvoyer l\'e-mail de vérification') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-secondary">
                {{ __('Se déconnecter') }}
            </button>
        </form>
    </div>

</div>

@endsection
