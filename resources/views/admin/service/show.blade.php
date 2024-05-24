@extends('layouts_front.main')

@section('contenu')

<header class="page-header wow fadeInUp" data-wow-delay="0.5s" data-background="{{asset('assets/wp-content/uploads/2022/06/about-us.jpg')}}">
    <div class="container">
      <h2>{{$service->nom}}</h2>
      <div class="bosluk3"></div>
      <p><a href="{{route('welcome')}}" class="headerbreadcrumb">Accueil</a> <i class="flaticon-right-chevron"></i>{{$service->nom}}</p>
    </div>
    <!-- end container -->
</header>

    <main>
        <section class="hizmetlerr-bolumu">
        <div class="h-yazi-ozel h-yazi-margin-ozel">
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                <div class="sidebar-service wow fadeInLeft" data-wow-delay="0.8s">
                    @foreach ($madiou as $serviceI)
                    <span class="menu-service" onclick="toggleActive(this);">
                        <a href="{{ route('admin.service.show', $serviceI) }}">
                            <i class="flaticon-right-chevron"></i>{{$serviceI->nom}}
                        </a>
                    </span>
                  @endforeach
                </div>
                <div class="bosluk3"></div>
                </div>
                <div class="col-lg-8">
                <div class="bosluk333"></div>
                <div class="galeri wow fadeInRight" data-wow-delay="0.7s">
                    <img src="{{asset('storage/'.$service->photo)}}" width="500" height="500"  alt="IT Support services" class="galeri__gorsel galeri__gorsel--3">
                </div>
                <div class="bosluk3"></div>
                <h2 class="h2-baslik-anasayfa-ozel wow fade">{{$service->nom}}</h2>
                <div class="bosluk333"></div>
                <p class="paragraf wow fade">
                    <p>{{$service->description}}</p>
                </p>
                <p class="paragraf wow fade">
                </p>
                <div class="bosluk333"></div>
                <img class="divider" width="120" height="15" title="divider" alt="divider" src="{{asset('assets/wp-content/uploads/2022/05/divider.jpg')}}">
                <div class="bosluk333"></div>

                <div class="bosluk333"></div>
                <div class="bosluk3"></div>
                <div class="tabloozellik">
                    <div class="tablo--1-ve-2">
                        <div class="paketler4 wow fadeInLeft" data-wow-delay="0.5s">
                            <div class="paketler4__on paketler4__on--onyazi">
                            <div class="paketler4__icerik">
                                <div class="icon"><i class="flaticon-medical-history"></i></div>
                                <h3 class="baslik-3 h-yazi-margin-kucuk">Fiabilité</h3>
                            </div>
                            </div>
                            <div class="paketler4__on paketler4__on--arkayazi paketler4__on--arkayazi-1">
                            <div class="paketler4__pr">
                                <div class="paketler4__pr-kutu">
                                    <h3 class="baslik-orta h-yazi-margin-kucuk">Fiabilité</h3>
                                    <p class="services-kutu2--yazi1 wow fade">
                                      Nous fournissons des services précis, fiables et éthiques avec notre personnel expert. Nous appliquons les méthodes les plus rapides et les plus fiables pour votre marque.                                </p>
                                    </p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="tablo--1-ve-2">
                        <div class="paketler4 wow fadeInRight" data-wow-delay="0.6s">
                            <div class="paketler4__on paketler4__on--onyazi">
                            <div class="paketler4__icerik">
                                <div class="icon"><i class="flaticon-first-aid-kit"></i></div>
                                <h3 class="baslik-3 h-yazi-margin-kucuk">Loyauté</h3>
                            </div>
                            </div>
                            <div class="paketler4__on paketler4__on--arkayazi paketler4__on--arkayazi-1">
                            <div class="paketler4__pr">
                                <div class="paketler4__pr-kutu">
                                    <h3 class="baslik-orta h-yazi-margin-kucuk">Loyauté</h3>
                                    <p class="services-kutu2--yazi1 wow fade">
                                       Notre travail à long terme se poursuit jusqu’à ce que le travail soit terminé. Nous établissons des relations solides et à long terme avec toutes les entreprises avec lesquelles nous travaillons.                                </p>
                                    </p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bosluk333"></div>
                <div class="bosluk3"></div>
                </div>
            </div>
        </div>
        </section>
    </main>
    <script>
        function toggleActive(element) {
            var menuServices = document.querySelectorAll('.menu-service');
            menuServices.forEach(function (menu) {
                menu.classList.remove('menuactive');
            });
            element.classList.add('menuactive');
        }
    </script>
@endsection
