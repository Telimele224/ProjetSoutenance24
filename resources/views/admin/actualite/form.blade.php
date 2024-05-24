@extends('en_tete.entete_administrateurs')
@section('title',$actualite->exists? " MODIFIER UNE ACTUALITE ":" AJOUTER UNE ACTUALITE ")
@section('contenu')
<div class="container mt-5">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card custom-card">
        <div class="card-header">
            <div class="card-title">
                <h4 class="mt-3">@yield('title')</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-area">
            <div class="card-area gap-3">
                <form  action="{{route($actualite->exists ? 'admin.actualite.update' : 'admin.actualite.store', $actualite)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                    @csrf
                    @method($actualite->exists ? 'put': 'post')
                <div class="row">
                        <div class="col-md-6 position-relative">
                            <label   for="avatar" :value="__('Photo')" class="mb-2 fw-500">Photo de l'actualité<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" placeholder="selectionner une photo" aria-label="avatar" aria-describedby="addon-wrapping" value="{{ old('avatar', $actualite->avatar) }}" ><br>
                                <div class="invalid-feedback">@error('avatar') {{$message}} @enderror </div>
                            </div>
                        </div>

                        <div class="col-md-6 position-relative">
                            <label   for="titre" :value="__('Titre')" class="mb-2 fw-500">Titre de l'actualité<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" placeholder="Entrer le titre de l'actualité" aria-label="titre" aria-describedby="addon-wrapping" value="{{ old('titre', $actualite->titre) }}" ><br>
                                <div class="invalid-feedback">@error('titre') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label   for="contenu" :value="__('contenu')" class="mb-2 fw-500">Contenu de l'actualité<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account"></i></span>
                                <textarea cols="30" rows="4" class="form-control @error('contenu') is-invalid @enderror" name="contenu" placeholder="votre contenu" aria-label="contenu" aria-describedby="addon-wrapping" >{{ old('contenu', $actualite->contenu ) }} </textarea>
                                <div class="invalid-feedback">@error('contenu') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <button class="btn btn-primary text-end" type="submit">
                                @if($actualite->exists)
                                    Modifier
                                @else
                                    Valider
                                @endif
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
