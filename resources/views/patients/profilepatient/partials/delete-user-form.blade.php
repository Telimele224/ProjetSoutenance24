<section class="space-y-6">
    <header>
        <h6 class="text-lg font-medium">
            {{ __('Suprimé le compte') }}
        </h6>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Une fois votre compte désactivé, vous ne pourrez plus vous connecter. Veuillez confirmer en entrant votre mot de passe.') }}
        </p>
    </header>

    <button class="btn btn-danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deactivation')"
    >
        {{ __('Suprimé le compte') }}
    </button>

    <x-modal name="confirm-user-deactivation" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('DELETE')

            <h2 class="text-lg font-medium ">
                {{ __('Êtes-vous sûr de vouloir Suprimé votre compte?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Une fois votre compte désactivé, vous ne pourrez plus vous connecter. Veuillez confirmer en entrant votre mot de passe.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Mot de passe') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Mot de passe') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button class="btn btn-confirm" x-on:click="$dispatch('close')">
                    {{ __('Annuler') }}
                </x-secondary-button>

                <button type="submit" class="btn btn-danger ms-3">
                    {{ __('Suprimé le compte') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
