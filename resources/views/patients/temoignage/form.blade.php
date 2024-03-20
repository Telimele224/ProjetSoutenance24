@extends('en_tete.entete_patient')

@section('title',$temoignage->exists? "MODIFIER UN TEMOIGNAGE":"AJOUTER UN TEMOIGNAGE ")

@section('contenu')
<div class="contenair mt-5" >
    <div class="col-xl-12">
        <div class="car custom-card">

        </div>
    </div>
</div>

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
                <form  action="{{route($temoignage->exists ? 'patients.temoignage.update' : 'patients.temoignage.store', $temoignage)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                    @csrf
                    @method($temoignage->exists ? 'put': 'post')

                    {{-- <input type="ckeckbox" class="custom-switch-input  @error('publier') is-invalid @enderror" id="publierFloating" name="publier" placeholder="" value="{{ old('publier', $temoignage->publier)}}">
                    <div class="invalid-feedback">@error('publier') {{$message}} @enderror </div>

                    <div class="row">
                        <label for="custom-switch m-0">Publier | Masquer</label>
                        <div class="col-md-4 position-relative">
                            <label class="custom-switch m-0">
                                <input type="checkbox" id="publier"  class="custom-switch-input   @error('publier') is-invalid @enderror"  id="plublierFloating" name="publier" value="{{ old('publier', $temoignage->publier)}} {{ $temoignage->publier ? 'checked' : '' }}">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    </div> --}}
                    <div class="mb-4">
                    <label for="contenu" class="form-label">Contenu | Temoignage</label>
                    <textarea class="form-control @error('contenu') is-invalid @enderror" id="contenuFloating" name="contenu" cols="30" rows="3" placeholder="Votre Temoignages ...">{{old('contenu', $temoignage->contenu)}}</textarea>
                    <div class="invalid-feedback">@error('contenu') {{$message}} @enderror </div>
                    </div>
                    <div class="col-12">
                    <button class="btn btn-primary" type="submit">
                    @if($temoignage->exists)
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
