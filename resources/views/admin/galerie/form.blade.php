@extends('en_tete.entete_administrateurs')
@section('title',$galerie->exists? "MODIFIER  UNE PHOTO ":"AJOUTER UNE PHOTO")
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
            <div class="card-area">
            <div class="card-area gap-3">
                <form  action="{{route($galerie->exists ? 'admin.galerie.update' : 'admin.galerie.store', $galerie)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                    @csrf
                    @method($galerie->exists ? 'put': 'post')

                    <div class="col-md-6 position-relative">
                        <label   for="photo" :value="__('photo')" class="mb-2 fw-500">Selectionner une photo<span class="text-danger ms-1">*</span></label>
                        <div class="input-group ">
                            <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" placeholder="selectionner une photo" aria-label="photo" aria-describedby="addon-wrapping" value="{{ old('photo', $galerie->photo) }}" ><br>
                            <div class="invalid-feedback">@error('photo') {{$message}} @enderror </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">
                            @if($galerie->exists)
                                Modifier
                            @else
                                Valider
                            @endif
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
