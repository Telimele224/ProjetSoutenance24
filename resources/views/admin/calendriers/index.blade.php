@extends('en_tete.entete_administrateurs')

@section('contenu')
    <div id='calendar'></div>

@endsection

@include('admin.calendriers.script')
@include('admin.calendriers.css')
