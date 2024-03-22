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
            {{ __('Merci pour l\'enregistrement! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer par e-mail ? Si vous n\'avez pas reçu l\'e-mail, nous vous en enverrons volontiers un autre.') }}
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
