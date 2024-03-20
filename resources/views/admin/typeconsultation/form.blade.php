@extends('en_tete.entete_administrateurs')
@section('title',$typeconsultation->exists? "MODIFIER UN TYPE DE CONSULTATION ":"AJOUTER UN TYPE DE CONSULTATION")
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
                <form  action="{{route($typeconsultation->exists ? 'admin.typeconsultation.update' : 'admin.typeconsultation.store', $typeconsultation)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                    @csrf
                    @method($typeconsultation->exists ? 'put': 'post')

                    <div class="col-md-6 position-relative">
                        <label   for="name" :value="__('name')" class="mb-2 fw-500">Type de Consultation<span class="text-danger ms-1">*</span></label>
                        <div class="input-group ">
                            <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Entrer votre type de consultation" aria-label="name" aria-describedby="addon-wrapping" value="{{ old('name', $typeconsultation->name) }}" ><br>
                            <div class="invalid-feedback">@error('name') {{$message}} @enderror </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">
                            @if($typeconsultation->exists)
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
