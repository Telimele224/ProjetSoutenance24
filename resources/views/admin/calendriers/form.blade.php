@extends('en_tete.entete_administrateurs')
@section('title',$calendrier->exists? " MODIFIER UN calendrier ":" AJOUTER UN calendrier ")
@section('contenu')
<div class="container mt-5">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card custom-card">
        <div class="card-header">
            <div class="card-title">
                <h4 class="mt-3">@yield('title')</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="card-area">
            <div class="card-area gap-3">
                <form  action="{{route($calendrier->exists ? 'admin.calendriers.update' : 'admin.calendriers.store', $calendrier)}}" method="post" class="vstack gap-2" enctype="multipart/form-data" class="row g-4 needs-validation" novalidate="">
                    @csrf
                    @method($calendrier->exists ? 'put': 'post')
                <div class="row">

                        <div class="col-md-6 position-relative">
                            <label   for="title" :value="__('title')" class="mb-2 fw-500">title de l'évènement<span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="titre" aria-label="title" aria-describedby="addon-wrapping" value="{{ old('title', $calendrier->title) }}" ><br>
                                <div class="invalid-feedback">@error('title') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label   for="start_time" :value="__('start_time')" class="mb-2 fw-500">Date et heure de début <span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" name="start_time" placeholder="selectionner une photo" aria-label="start_time" aria-describedby="addon-wrapping" value="{{ old('start_time', $calendrier->start_time) }}" ><br>
                                <div class="invalid-feedback">@error('start_time') {{$message}} @enderror </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label   for="end_time" :value="__('end_time')" class="mb-2 fw-500">Date et heure de fin <span class="text-danger ms-1">*</span></label>
                            <div class="input-group ">
                                <span class="input-group-text" id="addon-wrapping"><i class="mdi mdi-account-convert"></i></span>
                                <input type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" name="end_time" placeholder="selectionner une photo" aria-label="end_time" aria-describedby="addon-wrapping" value="{{ old('end_time', $calendrier->end_time) }}" ><br>
                                <div class="invalid-feedback">@error('end_time') {{$message}} @enderror </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <button class="btn btn-primary text-end" type="submit">
                                @if($calendrier->exists)
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
