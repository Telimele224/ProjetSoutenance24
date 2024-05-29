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
                <div class="row">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="{{asset('logo/femaledoctor.svg')}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <form  action="{{route($temoignage->exists ? 'patients.temoignage.update' : 'patients.temoignage.store', $temoignage)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                                @csrf
                                @method($temoignage->exists ? 'put': 'post')
                                <div class="mb-4">
                                <label for="contenu" class="form-label">Contenu | Temoignage</label>
                                <textarea class="form-control @error('contenu') is-invalid @enderror" id="contenuFloating" name="contenu" cols="30" rows="8" placeholder="Votre Temoignages ...">{{old('contenu', $temoignage->contenu)}}</textarea>
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
        </div>
    </div>
</div>
@endsection
