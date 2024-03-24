@extends('en_tete.entete_administrateurs')

@section('title',$service->exists? "MODIFIER  UN SERVICE ":"AJOUTER UN SERVICE")

@section('contenu')

<div class="container mt-5">
    <div class="col-xl-12">
        <div class="card custom-card">
        <div class="card-header">
            <div class="card-title">
                <h4 class="mt-3">@yield('title')</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="card-area gap-3">
                <form  action="{{route($service->exists ? 'admin.service.update' : 'admin.service.store', $service)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                    @csrf
                    @method($service->exists ? 'put': 'post')
                    <div class="row">
                        <div class="col-md-6 position-relative">
                            <label   for="photo" :value="__('Photo')" class="mb-2 fw-500">Photo du Service<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" placeholder="selectionner une photo" aria-label="photo" aria-describedby="addon-wrapping" value="{{ old('photo', $service->photo) }}" ><br>
                                <div class="invalid-feedback">@error('photo') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label   for="avatar" :value="__('avatar')" class="mb-2 fw-500">Logo du Service<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" placeholder="selectionner une avatar" aria-label="avatar" aria-describedby="addon-wrapping" value="{{ old('avatar', $service->avatar) }}" ><br>
                                <div class="invalid-feedback">@error('avatar') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label   for="nom" :value="__('nom')" class="mb-2 fw-500">Nom du service<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-arrow-left"></i></span>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Entrer le nom du service" aria-label="nom" aria-describedby="addon-wrapping" value="{{ old('nom', $service->nom) }}" ><br>
                                <div class="invalid-feedback">@error('nom') {{$message}} @enderror </div>
                            </div>
                        </div>
                          <!-- Champs pour les symptômes -->
                          <div class="mb-20 form-group col-sm-12 mb-2">
                            <label class="mb-10 fw-semibold">Symptômes (optionnel)</label>
                            <select name="symptoms[]" class="form-control">
                                @foreach($symptoms as $symptom)
                                <option value="{{ $symptom->id }}">{{ $symptom->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Champs pour les maux -->
                        <div class="col-md-6 position-relative">
                            <label class="mb-2 fw-500">Maux (optionnel)</label>
                            <select name="illnesses[]" class="form-control" multiple>
                                @foreach($illnesses as $illness)
                                <option value="{{ $illness->id }}">{{ $illness->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Champs pour les maladies -->
                        <div class="col-md-6 position-relative">
                            <label class="mb-2 fw-500">Maladies (optionnel)</label>
                            <select name="diseases[]" class="form-control" multiple>
                                @foreach($diseases as $disease)
                                <option value="{{ $disease->id }}">{{ $disease->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <label   for="description" :value="__('description')" class="mb-2 fw-500">Description du service<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                <textarea cols="30" rows="4" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="votre description" aria-label="description" aria-describedby="addon-wrapping" >{{ old('description', $service->description ) }} </textarea>
                                <div class="invalid-feedback">@error('description') {{$message}} @enderror </div>
                            </div>
                        </div>

                    <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit">
                        @if($service->exists)
                            Modifier
                        @else
                            enregistrer
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
