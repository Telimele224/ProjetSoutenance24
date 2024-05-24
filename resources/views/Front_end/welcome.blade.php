@extends('layouts_front.main')

@section('contenu')

 <!-- Slider -->
 <header class="slider">
   <div class="main-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide">
            <div class="slide-image wow fadeInUp mt-5" data-wow-delay="0.3s" data-background="{{asset('Slide/Slide1.jpg')}}"  width="1920"
            height="1080"></div>
            <div class="container">
               <h1>Il n'y a pas de place <br>
                  pour les excuses en matière de santé
               </h1>
               <p>Optenez les meilleurs soins de santé avec notre personnel compétent et expérimenté </p>
               <div class="bosluks2"></div>

               <div class="or mb-2"> <a href="{{route('recommandation.service')}}"><i class="flaticon-timetable iconp"></i>    Prendre rendez-vous →</a></div>

               <div class="or">

                  <a href="#">En savoir plus →</a>
               </div>
            </div>
         </div>
         <div class="swiper-slide">
            <div class="slide-image wow fadeInUp mt-10" data-wow-delay="0.3s" data-background="{{asset('Slide/Slide2.jpg')}}"  width="1920"
            height="1080"></div>
            <div class="container">
               <h1>Pour une vie <br>
                  plus saine
               </h1>
               <p>Nous sommes à votre service pour une vie plus saine</p>
               <div class="bosluks2"></div>
               <div class="or mb-2"> <a href="{{route('recommandation.service')}}"><i class="flaticon-timetable iconp"></i>  Prendre rendez-vous →</a></div>

               <div class="or">
                  <a href="#">En savoir plus →</a>
               </div>
            </div>
         </div>
         <div class="swiper-slide">
            <div class="slide-image wow fadeInUp mt-5" data-wow-delay="0.3s" data-background="{{asset('Image/hero-6-bg.jpg')}}" width="1920"
            height="1080"></div>
            <div class="container">
               <h1>Medécins <br>
                  Compétents et Expérimentés
               </h1>
               <p>Votre santé est entre de bonne mains grâce à notre personnel experts et experimentés. </p>
               <div class="bosluks2"></div>
               <div class="or mb-2"> <a href="{{route('recommandation.service')}}"> <i class="flaticon-timetable iconp"></i>   Prendre rendez-vous →</a></div>

               <div class="or">
                  <a href="#">En savoir plus →</a>
               </div>
            </div>
         </div>
         <div class="swiper-slide">
            <div class="slide-image wow fadeInUp mt-5" data-wow-delay="0.3s" data-background="{{asset('Image/testi-bg.jpg')}}"></div>
            <div class="container">
               <h1>Ne retardez pas  <br>
                  votre santé
               </h1>
               <p>Votre santé est tout. </p>
               <div class="bosluks2"></div>
               <div class="or mb-2"> <a href="{{route('recommandation.service')}}">   <i class="flaticon-timetable iconp"></i>Prendre rendez-vous →</a></div>
               <div class="or">
                  <a href="#">En savoir plus →</a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="button-prev">❮</div>
   <div class="button-next">❯</div>
   <div class="swiper-pagination"></div>
</header>

<section class="departments">
   <div class="h-yazi-ortalama h-yazi-margin-orta-3 wow fadeInUp" data-wow-delay="0.4s">
      <h2 class="h2-baslik-hizmetler-2 wow fade">Nos Services</h2>
      <p class="h2-baslik-hizmetler-2__paragraf wow fade animated">
         Nous vous fournissons le meilleur service avec notre personnel solide et notre haute technologie
      </p>
   </div>
   <div class="bosluk3ps"></div>
   <div class="container">
      <div class="row">
        <div class="col-lg-7">
            <div class="row">
            @foreach ($services as $service)
                <div class="col-lg-3 wow bounceInLeft" data-wow-delay="0.5s">
                    <div class="dep" onclick="location.href='{{route('admin.service.show',$service)}}';" style="cursor:pointer;">
                        <div class="icon"> <img src="{{asset('storage/'.$service->avatar)}}" alt="Icon"></div>
                        <h3 class="baslik-3 h-yazi-margin-kucuk1">{{$service->nom}}</h3>
                    </div>
                </div>

            @endforeach

            </div>
        </div>
        <div class="col-lg-5 mt-5">
            <div class="container mt-5">
                <!-- Tableau avec les colonnes et lignes demandées -->
                <table class="table table-bordered">
                  <!-- Ligne entière en haut avec "salut" -->
                  <thead>
                    <tr>
                      <th colspan="3" class="text-center "><h3> Horaires de Visites </h3></th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Première ligne du corps du tableau -->
                    <tr>
                      <td class="text-center" rowspan="2"><h3>Tous les jours</h3></td>
                      <td class="text-center"><h3>Le Matin de</h3></td>
                      <td class="text-center"><span class="text-danger"> 7 </span>h :<span class="text-danger"> 00</span> min-<span class="text-danger"> 8 </span> h :<span class="text-danger"> 00</span> min</td>
                    </tr>
                    <!-- Deuxième ligne du corps du tableau -->
                    <tr>
                      <td class="text-center"><h3> L'après Midi</h3></td>
                      <td class="text-center"><span class="text-danger">16</span> h : <span class="text-danger">30 </span> min-<span class="text-danger"> 20 </span> h :<span class="text-danger"> 00</span> min</td>
                    </tr>
                    <tr>
                      <td class="text-center" colspan="3"><span class="text-danger"><h1>Interdiction formelle de sortir de :</h1></span></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3"> <h1><span class="text-danger">19</span> h : <span class="text-danger">30 </span> min-<span class="text-danger"> 6 </span> h : <span class="text-danger">30 </span> min </h1></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3"><h1>De Malade Hospitalisé, Du Nouveaux Né et de Dépouille Mortelle</h1></td>
                    </tr>
                  </tbody>
                </table>
              </div>

         </div>
   </div>
   <div class="bosluksv"></div>
   <div class="container">
      <div class="row">
         <div class="col-md-12 wow fadeInUp" data-wow-delay="0.6s">
            <div class="ortabuton">
               <a href="{{route('les_departements')}}" class="custom-button">Tous les Services →</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!--About Info Alanı-->
<div class="bosluk8"></div>
<section class="hakkimizda-bolumu-anasayfa">
   <div class="h-yazi-ozel h-yazi-margin-ozel"></div>
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
         <h2 class="h2-baslik-anasayfa-ozel wow fadeInUp" data-wow-delay="0.6s"> Haute technologie nouvelle génération </h2>
         <div class="bosluk333"></div>
         <p class="paragraf wow fadeInRight" data-wow-delay="0.6s">
         <p class="paragraf wow fade animated">Nous fournissons des services dans notre hôpital en avançant en toute confiance grâce à une technologie constamment renouvelée et des investissements tournés vers l’avenir. Il reçoit des rapports avec des appareils de pointe. Nous commençons le traitement en établissant le bon diagnostic avec nos médecins spécialistes.</p>
         <div class="bosluk333"></div>
         <img class="divider" width="120" height="15" title="divider" alt="divider" src="{{asset('assets/wp-content/uploads/2022/05/divider.jpg')}}">
         <div class="bosluk333"></div>
         <div class="row">
            <div class="col-sm-2 wow  fadeInRight" data-wow-delay="0.7s">
               <div class="iconleft"><i class="flaticon-medicine-1"></i></div>
            </div>
            <div class="col-sm-10 wow fadeInRight" data-wow-delay="0.8s">
               <h3 class="baslik-3s h-yazi-margin-kucuk1">Traitement sûr</h3>
               <br>
               <p class="paragraf-info">Nous vous traitons en toute sécurité avec notre personnel expert dans le domaine.</p>
               <br>
            </div>
         </div>
         <div class="bosluk13qs"></div>
         <div class="row">
            <div class="col-sm-2 wow fadeInRight" data-wow-delay="0.9s">
               <div class="iconleft"><i class="flaticon-medical-history"></i></div>
            </div>
            <div class="col-sm-10 wow fadeInRight" data-wow-delay="1s">
               <h3 class="baslik-3s h-yazi-margin-kucuk1">Résultat rapide</h3>
               <br>
               <p class="paragraf-info">Nous recevons vos rapports rapidement avec les derniers appareils technologiques.</p>
               <br>
            </div>
         </div>
         <div class="bosluk1"></div>
         <a href="{{route('apropos')}}" class="custom-button wow fadeInUp" data-wow-delay="1.3s">Apprenez à nous connaître →</a>
         <div class="bosluk3rh"></div>
      </div>
   </div>
</section>
<div class="bosluk4"></div>
<!--Information Top-->
<!--Information 1-->
<section class="info-top">
   <div class="tabloozellik">
      <div class="tablo--1-ve-4">
         <div class="paketler wow fadeInLeft" data-wow-delay="0.5s" onclick="location.href='#';" style="cursor:pointer;">
            <div class="hizmet-kutu">
               <div class="kutu-duzen">
                  <h3><a href="#">Centre de bien</a></h3>
                  <div class="boslukicon"></div>
                  <div class="icon-box">
                     <span class="border-layer"></span>
                     <i class="flaticon-medicine"></i>
                  </div>
                  <p>Dans notre centre de bien être, nous nous efforçons d'être votre guide le plus fiable dans votre parcours de santé avec des forfaits de soins de soutien personnalisé.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="tablo--1-ve-4">
         <div class="paketler wow fadeInLeft" data-wow-delay="0.6s" onclick="location.href='#';" style="cursor:pointer;">
            <div class="hizmet-kutu">
               <div class="kutu-duzen">
                  <h3><a href="#">Entretien en ligne</a></h3>
                  <div class="boslukicon"></div>
                  <div class="icon-box">
                     <span class="border-layer"></span>
                     <i class="flaticon-table"></i>
                  </div>
                  <p>Vous pouvez prendre rendez-vous en ligne avec nos medécins dans notre hôpital d'où vous êtes et parler à votre médecin dans le confort de votre maison </p>
               </div>
            </div>
         </div>
      </div>
      <div class="tablo--1-ve-4">
         <div class="paketler wow fadeInRight" data-wow-delay="0.7s" onclick="location.href='#';" style="cursor:pointer;">
            <div class="hizmet-kutu">
               <div class="kutu-duzen">
                  <h3><a href="#">Opérations</a></h3>
                  <div class="boslukicon"></div>
                  <div class="icon-box">
                     <span class="border-layer"></span>
                     <i class="flaticon-transfusion"></i>
                  </div>
                  <p>Nous attachons de l'importance à assurer la sécurité des patients dans notre bloc opératoire équipés de dispositifs médicaux de pointes dans toutes les branches.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="tablo--1-ve-4">
         <div class="paketler wow fadeInRight" data-wow-delay="0.8s" onclick="location.href='#';" style="cursor:pointer;">
            <div class="hizmet-kutu">
               <div class="kutu-duzen">
                  <h3><a href="#">Hôpital Sûr</a></h3>
                  <div class="boslukicon"></div>
                  <div class="icon-box">
                     <span class="border-layer"></span>
                     <i class="flaticon-first-aid-kit"></i>
                  </div>
                  <p>Des mesures COVID-19 ont été prises dans notre hôpital, où vous pourrez passer tous vos tests et traitements, tant ambulatoire qu'hospitaliers.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<br><br>
<div class="bosluk4"></div>
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
<!--Posts-->
<section class="yorumlar-alani-sayfa">
    <div class="container">
       <div class="row">
          <div class="col-12 wowfade">
             <div class="h-yazi-ortalama h-yazi-margin-orta-3">
                <h2 class="h2-baslik-hizmetler-yorum wow fadeInUp" data-wow-delay="0.4s">Renvoyer les nouveaux et les articles </h2>
             </div>
             <p class="h2-baslik-hizmetler-yorum__yorum wow fadeInUp" data-wow-delay="0.5s">
                Informations importantes pour votre santé.
             </p>
             <div class="bosluksv5"></div>
          </div>
       </div>
    </div>
    <div class="container">
       <div class="row">
          <div class="col-12 mt-4">
             <div class="carousel-classes ">
                <div class="swiper-wrapper">
                     @foreach ($actualites as $actualite)
                     <div class="card swiper-slide wow fadeInLef " style="height: 300px" data-wow-delay="0.2s" data-tilt>
                        <img style="width: 100%; height: 150px;"  src="{{asset('storage/'.$actualite->avatar)}}" class="attachment-custom-size size-custom-size wp-post-image img-fluid" alt="" decoding="async" fetchpriority="high"  />
                        <div class="card-body">
                          <h5 class="card-title"><span class="">
                           " {{$actualite->created_at->format('d-m-Y')}} "</span></h5>
                          <h4 class=" card-title">{{ strlen($actualite->titre) > 50 ? substr($actualite->titre, 0, 50) . '...' : $actualite->titre }}</h4>
                          <p class="card-text small mb-3"> {{ strlen($actualite->contenu) > 150 ? substr($actualite->contenu, 0, 150) . '...' : $actualite->contenu }} [&hellip;].</p>
                         <div class="">
                            <a href="{{ route('admin.actualite.show', ['actualite' => $actualite->id]) }}" class="btn btn-primary b ">Lire la suite</a>
                         </div>
                        </div>
                      </div>

                     @endforeach
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="swiper-pagination"></div>
 </section>

<!--Footer Alanı-->

@endsection

