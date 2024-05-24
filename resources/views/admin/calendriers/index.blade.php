@extends('en_tete.entete_administrateurs')

@section('contenu')
<div class="card">
    <div id='calendar'></div>
</div>


@endsection

@include('admin.calendriers.script')
@include('admin.calendriers.css')
