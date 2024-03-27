@extends('layouts_front.main')

@section('contenu')
<header class="page-header wow fadeInUp" data-wow-delay="0.5s" data-background="{{asset('assets/wp-content/uploads/2022/06/services.jpg')}}">
    <div class="container">
    <h2>Tous les services</h2>
      <div class="bosluk3"></div>
      <p><a href="{{route('welcome')}}" class="headerbreadcrumb">Acceuil</a> <i class="flaticon-right-chevron"></i>Tous Les Services</p>
    </div>
    <!-- end container -->
</header>
<!--Departments Banner-->
<section class="departments">
    <div class="h-yazi-ortalama h-yazi-margin-orta-3 wow fadeInUp" data-wow-delay="0.4s">
    <h2 class="h2-baslik-hizmetler-2 wow fade">Nos  Services</h2>
    <p class="h2-baslik-hizmetler-2__paragraf wow fade animated">
        Nous vous fournissons le meilleur service avec notre personnel solide et notre haute technologie.       </p>
</div>
<div class="bosluk3ps"></div>
<div class="container">
    <div class="row">
        @foreach ($services as $service)
            <div class="col-lg-3 wow bounceInRight" data-wow-delay="0.8s">
                <div class="dep" onclick="location.href='';" style="cursor:pointer;">
                    <div class="icon"><img width="30px" src="{{asset('storage/'.$service->avatar)}} " alt=""></div>
                    <h3 class="baslik-3 h-yazi-margin-kucuk1">{{$service->nom}}</h3>
                </div>
            </div>
        @endforeach
  </div>
</div>
<div class="bosluksv"></div>
</section>
</section>
@endsection
