@extends('layouts_front.main')

@section('contenu')

<header class="page-header wow fadeInUp" data-wow-delay="0.5s" data-background="{{asset('assets/wp-content/uploads/2022/06/contact.jpg')}}">
    <div class="container">
      <h2>A propos</h2>
      <div class="bosluk3"></div>
      <p><a href="{{route('welcome')}}" class="headerbreadcrumb">Accueil</a> <i class="flaticon-right-chevron"></i>A propos</p>
    </div>
    <!-- end container -->
</header>
<!--About Info Alanı-->
<div class="bosluk8"></div>
<section class="hakkimizda-bolumu-anasayfa">
<div class="h-yazi-ozel h-yazi-margin-ozel">
</div>
<div class="tablo">
<div class="tablo--1-ve-2 wow rollIn" data-wow-delay="0.5s">
    <div class="galeri1">
    <img class="imagerotate" src="{{asset('assets/wp-content/uploads/2022/06/medidoc-technology.png')}}" alt="" >
    </div>
    <div class="galeri wow slideInUp mt-5 " data-wow-delay="15ms" data-wow-duration="15ms" data-tilt >
        <img src="{{asset('logo/techBar.png')}}"  alt="Webone About" class="galeri__gorsel galeri__gorsel--3 zimage">
     </div>
</div>
<!--Galeri Görsel Alanı-->
<div class="tablo--1-ve-3 wow fadeInUp" data-wow-delay="0.5s">
    <h2 class="h2-baslik-anasayfa-ozel wow fadeInUp" data-wow-delay="0.6s">Qui somme nous </h2>
    <div class="bosluk333"></div>
    <p class="paragraf wow fadeInRight" data-wow-delay="0.6s">
        <p>L’Hôpital Régional de Labé est un établissement de santé publique située en Moyenne Guinée (Guinée Conakry) plus précisément dans la Région administrative de Labé. Le poste de Santé de Labé fut fondé en 1906 par le colon avant d’être appelé Hôpital Régional de Labé en 1958.
        </p>
    <h2 class="h2-baslik-anasayfa-ozel wow fadeInUp" data-wow-delay="0.6s">Haute technologie nouvelle génération</h2>
    <div class="bosluk333"></div>
    <p class="paragraf wow fadeInRight" data-wow-delay="0.6s">

    <p>Nous fournissons des services dans notre hôpital en avançant en toute confiance grâce à une technologie constamment renouvelée et des investissements tournés vers l’avenir. Il reçoit des rapports avec des appareils de pointe. Nous commençons le traitement en établissant le bon diagnostic avec nos médecins spécialistes.</p>
    <div class="bosluk333"></div>
    <img class="divider" width="120" height="15" title="divider" alt="divider" src="{{asset('assets/wp-content/uploads/2022/05/divider.jpg')}}">
    <div class="bosluk333"></div>
    <div class="row">
        <div class="col-sm-2 wow  fadeInLeft" data-wow-delay="0.7s">
            <div class="iconleft"><i class="flaticon-medicine-1"></i></div>
        </div>
        <div class="col-sm-10 wow fadeInRight" data-wow-delay="0.8s">
            <h3 class="baslik-3s h-yazi-margin-kucuk1">Traitement Sûr</h3><br>
            <p class="paragraf-info">Nous vous traitons en toute sécurité avec notre personnel expert dans le domaine.</p><br>
        </div>
    </div>
    <div class="bosluk13qs"></div>
    <div class="row">
        <div class="col-sm-2 wow fadeInRight" data-wow-delay="0.9s">
            <div class="iconleft"><i class="flaticon-medical-history"></i></div>
        </div>
        <div class="col-sm-10 wow fadeInLeft" data-wow-delay="1s">
            <h3 class="baslik-3s h-yazi-margin-kucuk1">Résultat rapide</h3><br>
            <p class="paragraf-info">Nous recevons vos rapports rapidement avec les derniers appareils technologiques.</p><br>
        </div>
    </div>
    <div class="bosluk13qs"></div>
</div>
</div>
</section>
<div class="bosluk4"></div>
<div class="bosluk3"></div>
<div class="bosluk3sh"></div>

<!--Quality Alanı-->
<!--Quality 1-->
<section class="paketler-alani">
<div class="bosluk3"></div>
<div class="bosluk3"></div>
    <div class="tabloozellik">

                    <div class="tablo--1-ve-4">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="tablo--1-ve-4">
            <div class="paketler4 wow fadeInLeft" data-wow-delay="0.6s">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="tablo--1-ve-4">
            <div class="paketler4 wow fadeInRight" data-wow-delay="0.7s">
                <div class="paketler4__on paketler4__on--onyazi">
                    <div class="paketler4__icerik">
                        <div class="icon"><i class="flaticon-medicine"></i></div>
                        <h3 class="baslik-3 h-yazi-margin-kucuk">Experience</h3>
                    </div>
                </div>
                <div class="paketler4__on paketler4__on--arkayazi paketler4__on--arkayazi-1">
                    <div class="paketler4__pr">
                        <div class="paketler4__pr-kutu">
                            <h3 class="baslik-orta h-yazi-margin-kucuk">Experience</h3>
                            <p class="services-kutu2--yazi1 wow fade">
                            Grâce à l’expérience que nous avons acquise au fil des ans, le spécialiste fournit un service avec les appareils les plus récents.                               </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="tablo--1-ve-4">
            <div class="paketler4 wow fadeInLeft" data-wow-delay="0.8s">
                <div class="paketler4__on paketler4__on--onyazi">
                    <div class="paketler4__icerik">
                        <div class="icon"><i class="flaticon-ambulance"></i></div>
                        <h3 class="baslik-3 h-yazi-margin-kucuk">Ambulance</h3>
                    </div>
                </div>
                <div class="paketler4__on paketler4__on--arkayazi paketler4__on--arkayazi-1">
                    <div class="paketler4__pr">
                        <div class="paketler4__pr-kutu">
                            <h3 class="baslik-orta h-yazi-margin-kucuk">Ambulance</h3>
                            <p class="services-kutu2--yazi1 wow fade">
                                Nous accélérons vos processus d’affaires en vous fournissant un soutien professionnel. Nous résolvons vos problèmes et fournissons des solutions instantanées.                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<!--TITLE-->
<section class="ozellika" data-background="#f3f3f3">
    <div class="container">
       <div class="row align-items-center no-gutters">
          <div class="col-lg-12">
             <div class="wow fadeInUp" data-wow-delay="0.3s">
                <div class="boslukalt"></div>
                <h2 class="h2-baslik-hizmetler-2 wow fadeInRight" data-wow-delay="0.4s">Nos médecins experts</h2>
                <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.4s">
                   Votre santé nous est confiée.
                </p>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!--Team Alanı-->
 <section class="team-section">
    <div class="container">
       <div class="row">
          <div class="col-12">
             <div class="carousel-classes">
                <div class="swiper-wrapper">
                 @foreach ($personnels as $personnel)
                 <div class="swiper-slide">
                     <div class="class-box">
                        <div class="services-kutu2 wow fadeInLeft" data-wow-delay="0.5s" style="cursor:pointer;">
                           <div class="member-box wow reveal-effect">
                              <figure>
                                 <img src="{{asset('storage/'.$personnel->photo)}}" width="350" height="350" alt="Image">
                                 <figcaption>
                                    <h6>{{$personnel->nom}} {{$personnel->prenom}}</h6>
                                    <p class="paragraf-sol-beyaz-orta">{{$personnel->poste}}</p>
                                    <ul>
                                       <li><a href="#"><i class="lni-facebook"></i></a></li>
                                       <li><a href="#"><i class="lni-instagram"></i></a></li>
                                       <li><a href="#"><i class="lni-twitter"></i></a></li>
                                    </ul>
                                 </figcaption>
                              </figure>
                           </div>
                        </div>
                     </div>
                  </div>
                 @endforeach


                </div>
                <div class="swiper-pagination"></div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!--Yorumlar-->

<!--Yorumlar-->
<section class="yorumlar-alani-sayfa">
    <div class="container">
        <div class="row">
            <div class="col-12 wow animated fadeIn animated" data-wow-delay="0.5s">
                <div class="h-yazi-ortalama h-yazi-margin-orta-3">
                    <h2 class="h2-baslik-hizmetler-yorum wow fadeInUp" data-wow-delay="0.5s"> Que disent nos patients? </h2>
                </div>
                <p class="h2-baslik-hizmetler-yorum__yorum wow fadeInUp" data-wow-delay="0.5s">
                    Chaque patient est précieux pour nous. Voici les avis de certains de nos clients qui nous ont choisi.
                </p>
                <div class="bosluk3a"></div>
            </div>
            <div class="col-12">
                <div class="carousel-classes">
                    <div class="swiper-wrapper">
                        @foreach ($temoignages as $temoignage)
                            @if($temoignage->publier)
                                <div class="swiper-slide wow animated fadeInLeft animated" data-wow-delay="0.5s">
                                    <div class="class-box">
                                        <div class="testimonial-card">
                                            <div class="testimon-text">
                                                {{ $temoignage->contenu}} <i class="fas fa-quote-right quote"></i>
                                            </div>
                                            <div class="testimonialimg">
                                                <div class="testimonimg">
                                                    <img height="80" width="80" class="rounded-circle" src="{{ asset('storage/'.$temoignage->user->photo) }}" alt="Image du patient">
                                                </div>
                                                <h3 class='person'>{{ $temoignage->user->name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
