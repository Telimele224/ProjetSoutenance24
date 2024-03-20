@extends('en_tete.entete_patient')

@section('contenu')
<h1>Mes Temoignanges</h1>
        {{-- <div class="page-title">
            <a href="{{route('patients.temoignage.create')}}" class="btn-2"> <i class="fa-solid fa-plus"></i> Add patient </a>
        </div> --}}
        <div class="d-flex flex-row justify-content-start gap-2">
            @foreach ($temoignages as $k => $temoignage)
            <div class="card d-flex" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{$k+1}} </h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">Contenu</h6>
                  <p class="card-text">{{$temoignage->contenu}} </p>
                  <div class="d-flex  flex-row justify-content-start gap-1">
                    <a href="{{route('patients.temoignage.edit' , $temoignage)}} " class="btn btn-primary py-1 p-2"><i class="fa fa-pencil-square"></i></a>
                    <form action="{{route('patients.temoignage.destroy' , $temoignage)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger py-1 p-2"><i class="fa fa-trash"></i></button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
        </div>

        {{-- <table class="table table-striped">

                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Contenu</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($temoignages as $k => $temoignage)
                        <tr>
                            <td>{{$k+1}} </td>
                            <td>{{$temoignage->contenu_temoi}} </td>

                            <td class="d-flex flex-row justify-content-end gap-2">
                                <a href="{{route('patients.temoignage.edit' , $temoignage)}} " class="btn btn-primary py-1 p-2"><i class="fa fa-pencil-square"></i></a>
                                <form action="{{route('patients.temoignage.destroy' , $temoignage)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger py-1 p-2"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                  </div>
            </table> --}}
            <!-- table end -->



{{-- {{$temoignages->links()}} --}}
@endsection
