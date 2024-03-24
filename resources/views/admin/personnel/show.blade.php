@extends('en_tete.Entete_administrateur')
@section('contenu')
<div class="row">
   <div class="bgnc-10 br-sm p-sm-30 p-10">
      <div class="row">
         <span class="heading-five mb-sm-30 mb-3">Les details de L'actualité</span>
         <div class="card col-md-11 " style="margin-left:45px">
            <div class="card-header text-center row">
               <div class="col-md-10">
                  <h5>Titre : {{ $actualite->titre }}</h5>
               </div>
               <div class="col-md-1"> <a href="{{ route('admin.actualite.edit', ['actualite' => $actualite->id]) }}">
                  <i class="edit-icon text-info tpc-2 fa-solid fa-pen-to-square icon-bg"></i>
                  </a>
               </div>
               <div class="col-md-1">
                  <a href="{{ route('admin.actualite.destroy', ['actualite' => $actualite->id]) }}"
                     onclick="event.preventDefault(); if(confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')) { document.getElementById('delete-form-{{ $actualite->id }}').submit(); }">
                  <i class="delete-icon text-danger tpc-2 fa-solid fa-trash-can icon-bg"></i>
                  </a>
               </div>
            </div>
            <div class="card-body" >
               <img src="{{ asset('avatars/' . $actualite->avatar ) }}" alt="{{ $actualite->titre}}" class="img-fluid " style="height: 400px ;width:100%">
            </div>
            <div class="card-footer text-justify">
               <p>{{ $actualite->contenu }}</p>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection