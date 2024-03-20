<section>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h6 class="mt-3">Information de Connexion</h5>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 small">Mettez à jour les informations de profil et l'adresse e-mail de votre compte.</p>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
                    <label   for="name" :value="__('Name')" class="mb-2 fw-500">Name<span class="text-danger ms-1">*</span></label>
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>


                <div>
                    <label   for="email" :value="__('Email')" class="mb-2 fw-500">Email<span class="text-danger ms-1">*</span></label>
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="card-header">
                    <div class="card-title">
                        <h6 class="mt-3">Information Personnel</h5>
                        {{-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 small">Mettez à jour les informations de profil et l'adresse e-mail de votre compte.</p> --}}
                    </div>
                </div>
                <div>
                    <label   for="nom" :value="__('Nom')" class="mb-2 fw-500">Nom<span class="text-danger ms-1">*</span></label>
                    <x-text-input id="nom" name="nom" type="text" class="mt-1 block w-full" :value="old('nom', $user->nom)" required autofocus autocomplete="nom" />
                    <x-input-error class="mt-2" :messages="$errors->get('nom')" />
                </div>
                <div>
                    <label   for="prenom" :value="__('Prenom')" class="mb-2 fw-500">Prenom<span class="text-danger ms-1">*</span></label>
                    <x-text-input id="prenom" name="prenom" type="text" class="mt-1 block w-full" :value="old('prenom', $user->prenom)" required autofocus autocomplete="prenom" />
                    <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                </div>
                <div>
                    <label   for="age" :value="__('Age')" class="mb-2 fw-500">Age<span class="text-danger ms-1">*</span></label>
                    <x-text-input id="age" name="age" type="text" class="mt-1 block w-full" :value="old('age', $user->age)" required autofocus autocomplete="age" />
                    <x-input-error class="mt-2" :messages="$errors->get('age')" />
                </div>
                <div>
                    <label   for="genre" :value="__('Genre')" class="mb-2 fw-500">Genre<span class="text-danger ms-1">*</span></label>
                    <x-text-input id="genre" name="genre" type="text" class="mt-1 block w-full" :value="old('genre', $user->genre)" required autofocus autocomplete="genre" />
                    <x-input-error class="mt-2" :messages="$errors->get('genre')" />
                </div>
                <div>
                    <label   for="adresse" :value="__('Adresse')" class="mb-2 fw-500">Adresse<span class="text-danger ms-1">*</span></label>
                    <x-text-input id="adresse" name="adresse" type="text" class="mt-1 block w-full" :value="old('adresse', $user->adresse)" required autofocus autocomplete="adresse" />
                    <x-input-error class="mt-2" :messages="$errors->get('adresse')" />
                </div>
                <div>
                    <label   for="telephone" :value="__('Telephone')" class="mb-2 fw-500">Telephone<span class="text-danger ms-1">*</span></label>
                    <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" :value="old('telephone', $user->telephone)" required autofocus autocomplete="telephone" />
                    <x-input-error class="mt-2" :messages="$errors->get('telephone')" />
                </div>

                @if(Auth::user()->role === 'patient')
                    @foreach($patients as $patient)
                        <div>
                            <label   for="ville" :value="__('Ville')" class="mb-2 fw-500">Ville<span class="text-danger ms-1">*</span></label>
                            <x-text-input id="ville" name="ville" type="text" class="mt-1 block w-full" :value="old('ville', $patient->ville)" required autofocus autocomplete="ville" />
                            <x-input-error class="mt-2" :messages="$errors->get('ville')" />
                        </div>
                        <div>
                            <label   for="poids" :value="__('Poids')" class="mb-2 fw-500">Poids<span class="text-danger ms-1">*</span></label>
                            <x-text-input id="poids" name="poids" type="text" class="mt-1 block w-full" :value="old('poids', $patient->poids)" required autofocus autocomplete="poids" />
                            <x-input-error class="mt-2" :messages="$errors->get('poids')" />
                        </div>
                    @endforeach
                @endif

                <div class="flex items-center mt-2  gap-4">
                    <x-primary-button class="btn btn-primary">{{ __('Mise à jour') }}</x-primary-button>
                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Mise à jour.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
