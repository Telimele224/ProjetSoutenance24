@extends('en_tete.entete_administrateurs')
@section('title',$personnel->exists? "Modifier un personnel":"Ajouter un personnel")
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
                <form  action="{{route($personnel->exists ? 'admin.personnel.update' : 'admin.personnel.store', $personnel)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                    @csrf
                    @method($personnel->exists ? 'put': 'post')
                    <div class="row">
                        <div class="col-md-6 position-relative">
                            <label   for="photo" :value="__('Photo')" class="mb-2 fw-500">Photo du personnel<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" placeholder="Selectionner une photo" aria-label="photo" aria-describedby="addon-wrapping" value="{{ old('photo', $personnel->photo) }}" ><br>
                                <div class="invalid-feedback">@error('photo') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label   for="nom" :value="__('nom')" class="mb-2 fw-500">Nom du personnel<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-arrow-left"></i></span>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="Entrer le nom du personnel" aria-label="nom" aria-describedby="addon-wrapping" value="{{ old('nom', $personnel->nom) }}" ><br>
                                <div class="invalid-feedback">@error('nom') {{$message}} @enderror </div>
                            </div>
                        </div>
                          <!-- Champs pour les symptômes -->
                          <div class="col-md-6 position-relative">
                            <label   for="prenom" :value="__('prenom')" class="mb-2 fw-500">Prenom du personnel<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-arrow-left"></i></span>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" placeholder="Entrer le prenom du personnel" aria-label="prenom" aria-describedby="addon-wrapping" value="{{ old('prenom', $personnel->prenom) }}" ><br>
                                <div class="invalid-feedback">@error('prenom') {{$message}} @enderror </div>
                            </div>
                        </div>
                          <!-- Champs pour les symptômes -->
                         <!-- Champs pour les symptômes -->
                         <div class="col-md-6 position-relative">
                            <label   for="poste" :value="__('poste')" class="mb-2 fw-500">Poste du personnel<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-arrow-left"></i></span>
                                <input type="text" class="form-control @error('poste') is-invalid @enderror" name="poste" placeholder="Entrer le poste du personnel" aria-label="poste" aria-describedby="addon-wrapping" value="{{ old('poste', $personnel->poste) }}" ><br>
                                <div class="invalid-feedback">@error('poste') {{$message}} @enderror </div>
                            </div>
                        </div>
                    <div class="col-md-12 mt-3">
                    <button class="btn btn-primary" type="submit">
                        @if($personnel->exists)
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
