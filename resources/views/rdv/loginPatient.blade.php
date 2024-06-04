@extends('rdv.headerRdv')

@section('contenu')
<div class="card" style="margin-top:20px; margin-left:20%; width:60%">

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <div class="card-header text-center">
        <h6>Connectez-Vous</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('patients.login_patient') }}" method="post">
            @csrf
          <div class="row">
            <div class="form-group col-sm-12 mb-2">
                <label for="">Email </label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="mail" name="email" value="{{ old('email') }}" class="form-control">
                </div>
                @error('email')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group col-sm-12 mb-2">
                <label for="">Mot de Passe</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                </div>
                @error('password')<span class="badge badge-danger bg-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="card-footer d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-outline-success">CONNECTEZ-VOUS</button>
        </div>
        </form>
    </div>


</div>
@endsection
