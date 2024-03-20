@extends('layouts_front.main')

@section('contenu')

 <!-- Slider -->
 <header class="slider">
   <div class="main-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide">
            <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{asset('assets/wp-content/uploads/2022/06/slider1.jpg')}}"></div>
            <div class="container">
               <h1>Il n'y a pas de place <br>
                  pour les excuses en matière de santé
               </h1>
               <p>Optenez les meilleurs soins de santé avec notre personnel compétent et expérimenté </p>
               <div class="bosluks2"></div>

               <div class="or mb-2"> <a href="{{route('recommandation.service')}}">Prendre rendez-vous →</a></div>

               <div class="or">

                  <a href="#">En savoir plus →</a>
               </div>
            </div>
         </div>
         <div class="swiper-slide">
            <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{asset('assets/wp-content/uploads/2022/06/slider2.jpg')}}"></div>
            <div class="container">
               <h1>Pour une vie <br>
                  plus saine
               </h1>
               <p>Nous sommes à votre service pour une vie plus saine</p>
               <div class="bosluks2"></div>
               <div class="or mb-2"> <a href="#">Prendre rendez-vous →</a></div>

               <div class="or">
                  <a href="#">En savoir plus →</a>
               </div>
            </div>
         </div>
         <div class="swiper-slide">
            <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{asset('assets/wp-content/uploads/2022/06/slider3.jpg')}}"></div>
            <div class="container">
               <h1>Medécins <br>
                  Compétents et Expérimentés
               </h1>
               <p>Votre santé est entre de bonne mains grâce à notre personnel experts et experimentés. </p>
               <div class="bosluks2"></div>
               <div class="or mb-2"> <a href="#">Prendre rendez-vous →</a></div>

               <div class="or">
                  <a href="#">En savoir plus →</a>
               </div>
            </div>
         </div>
         <div class="swiper-slide">
            <div class="slide-image wow fadeInUp" data-wow-delay="0.3s" data-background="{{asset('assets/wp-content/uploads/2022/06/slider4.jpg')}}"></div>
            <div class="container">
               <h1>Ne retardez pas  <br>
                  votre santé
               </h1>
               <p>Votre santé est tout. </p>
               <div class="bosluks2"></div>
               <div class="or mb-2"> <a href="#">Prendre rendez-vous →</a></div>
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
         <div class="col-lg-3 wow bounceInLeft" data-wow-delay="0.5s">
            <div class="dep" onclick="location.href='urology/index.html';" style="cursor:pointer;">
               <div class="icon"><i class="flaticon-uterus"></i></div>
               <h3 class="baslik-3 h-yazi-margin-kucuk1">Urologie</h3>
            </div>
         </div>
         <div class="col-lg-3 wow bounceInLeft" data-wow-delay="0.6s">
            <div class="dep" onclick="location.href='gastroenterology/index.html';" style="cursor:pointer;">
               <div class="icon"><i class="flaticon-intestines"></i></div>
               <h3 class="baslik-3 h-yazi-margin-kucuk1">Gastro-entroélogie</h3>
            </div>
         </div>
         <div class="col-lg-3 wow bounceInRight" data-wow-delay="0.7s">
            <div class="dep" onclick="location.href='chest-diseases/index.html';" style="cursor:pointer;">
               <div class="icon"><i class="flaticon-human-lungs"></i></div>
               <h3 class="baslik-3 h-yazi-margin-kucuk1">Maladies thoraciques</h3>
            </div>
         </div>
         <div class="col-lg-3 wow bounceInRight" data-wow-delay="0.8s">
            <div class="dep" onclick="location.href='cardiac-surgery/index.html';" style="cursor:pointer;">
               <div class="icon"><i class="flaticon-heart-1"></i></div>
               <h3 class="baslik-3 h-yazi-margin-kucuk1">Cardiac Surgery</h3>
            </div>
         </div>
         <div class="col-lg-3 wow bounceInLeft" data-wow-delay="0.5s">
            <div class="dep" onclick="location.href='radiology/index.html';" style="cursor:pointer;">
               <div class="icon"><i class="flaticon-medical-1"></i></div>
               <h3 class="baslik-3 h-yazi-margin-kucuk1">Radiologie</h3>
            </div>
         </div>
         <div class="col-lg-3 wow bounceInLeft" data-wow-delay="0.6s">
            <div class="dep" onclick="location.href='dental-diseases/index.html';" style="cursor:pointer;">
               <div class="icon"><i class="flaticon-human-teeth"></i></div>
               <h3 class="baslik-3 h-yazi-margin-kucuk1"></h3>
            </div>
         </div>
         <div class="col-lg-3 wow bounceInRight" data-wow-delay="0.7s">
            <div class="dep" onclick="location.href='gynecology-obstetrics/index.html';" style="cursor:pointer;">
               <div class="icon"><i class="flaticon-human-fetus"></i></div>
               <h3 class="baslik-3 h-yazi-margin-kucuk1">Gynecology & Obstetrics</h3>
            </div>
         </div>
         <div class="col-lg-3 wow bounceInRight" data-wow-delay="0.8s">
            <div class="dep" onclick="location.href='brain-surgery/index.html';" style="cursor:pointer;">
               <div class="icon"><i class="flaticon-brain"></i></div>
               <h3 class="baslik-3 h-yazi-margin-kucuk1">Brain Surgery</h3>
            </div>
         </div>
      </div>
   </div>
   <div class="bosluksv"></div>
   <div class="container">
      <div class="row">
         <div class="col-md-12 wow fadeInUp" data-wow-delay="0.6s">
            <div class="ortabuton">
               <a href="all-departments/index.html" class="custom-button">All Departments →</a>
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
         <div class="galeri wow slideInUp" data-wow-delay="100ms" data-wow-duration="1500ms" data-tilt>
            <img src="{{asset('assets/wp-content/uploads/2022/06/medidoc-about.png')}}" alt="Webone About" class="galeri__gorsel galeri__gorsel--3 zimage">
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
                  <p>Vous pouvez prendre rendez-vouys en ligne avec nos medécins dans notre hôpital d'où vous êtes et parler à votre médecin dans le confort de votre maison </p>
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
                  <div class="swiper-slide">
                     <div class="class-box">
                        <div class="services-kutu2 wow fadeInLeft" data-wow-delay="0.5s" style="cursor:pointer;">
                           <div class="member-box wow reveal-effect">
                              <figure>
                                 <img src="{{asset('assets/wp-content/uploads/2022/06/team1.jpg')}}" alt="Image">
                                 <figcaption>
                                    <h6>Jack Smith</h6>
                                    <p class="paragraf-sol-beyaz-orta">Urology Doctor</p>
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
                  <div class="swiper-slide">
                     <div class="class-box">
                        <div class="services-kutu2 wow fadeInLeft" data-wow-delay="0.6s" style="cursor:pointer;">
                           <div class="member-box wow reveal-effect">
                              <figure>
                                 <img src="{{asset('assets/wp-content/uploads/2022/06/team2.jpg')}}" alt="Image">
                                 <figcaption>
                                    <h6>Adam Brown</h6>
                                    <p class="paragraf-sol-beyaz-orta">Gastroenterology Doctor</p>
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
                  <div class="swiper-slide">
                     <div class="class-box">
                        <div class="services-kutu2 wow fadeInLeft" data-wow-delay="0.7s" style="cursor:pointer;">
                           <div class="member-box wow reveal-effect">
                              <figure>
                                 <img src="{{asset('assets/wp-content/uploads/2022/06/team3.jpg')}}" alt="Image">
                                 <figcaption>
                                    <h6>Michael Lee</h6>
                                    <p class="paragraf-sol-beyaz-orta">Chest Diseases Doctor</p>
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
                  <div class="swiper-slide">
                     <div class="class-box">
                        <div class="services-kutu2 wow fadeInRight" data-wow-delay="0.8s" style="cursor:pointer;">
                           <div class="member-box wow reveal-effect">
                              <figure>
                                 <img src="{{asset('assets/wp-content/uploads/2022/06/team4.jpg')}}" alt="Image">
                                 <figcaption>
                                    <h6>Olivia Lee</h6>
                                    <p class="paragraf-sol-beyaz-orta">Dental Doctor</p>
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
        </div>
        <div class="row">
            @foreach ($temoignages as $temoignage)
            <div class="col-12 col-md-4">
                <div class="swiper-slide wow animated fadeInLeft animated" data-wow-delay="0.5s">
                    <div class="class-box">
                        @if($temoignage->publier)
                        <div class="testimonial-card">
                            <div class="testimon-text">
                                {{ $temoignage->contenu}} <i class="fas fa-quote-right quote"></i>
                            </div>
                            <div class="testimonialimg">
                                <div class="testimonimg">
                                    @if($temoignage->user && $temoignage->user->patient && $temoignage->user->patient->avatar)
                                        <img src="{{ asset('storage/'.$temoignage->user->patient->avatar) }}" alt="Image du patient">
                                    @endif
                                </div>
                                <h3 class='person'>{{ $temoignage->user->name }}</h3>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- end swiper-slide -->
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper-pagination"></div>
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
         <div class="col-12">
            <div class="carousel-classes">
               <div class="swiper-wrapper">
                  <div class="swiper-slide wow fadeInLeft" data-wow-delay="0.5s" data-tilt>
                     <div class="post-kutu" style="cursor:pointer;">
                        <img width="373" height="223" src="{{asset('assets/wp-content/uploads/2022/06/news1-banner-373x223.png')}}" class="attachment-custom-size size-custom-size wp-post-image" alt="" decoding="async" fetchpriority="high" srcset="https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news1-banner-373x223.png 373w, https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news1-banner-300x180.png 300w, https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news1-banner.png 700w" sizes="(max-width: 373px) 100vw, 373px" />
                        <div class="datesection">
                           <span class="date">
                           05.06.2022                            </span>&nbsp;<span class="tt">-</span>&nbsp;
                           <ul class="post-categories">
                              <li><a href="category/medical/index.html" rel="category tag">Medical</a></li>
                           </ul>
                        </div>
                        <h3 class="baslik-3 h-yazi-margin-kucuk">Inconnu dans le traitement implantaire</h3>
                        <p class="post-kutu--yazi">
                        <p>Un implant est une racine dentaire artificielle en titane placée dans la mâchoire lors du traitement des dents manquants. Au préalable. Panoramique [&hellip;]</p>
                        <div class="h-yazi-ortalama h-yazi-margin-4">
                           <a href="unknowns-in-implant-treatment/index.html" class="custom-button">Plus</a>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide wow fadeInLeft" data-wow-delay="0.5s" data-tilt>
                     <div class="post-kutu" style="cursor:pointer;">
                        <img width="373" height="223" src="{{asset('assets/wp-content/uploads/2022/06/news2-banner-373x223.png')}}" class="attachment-custom-size size-custom-size wp-post-image" alt="" decoding="async" srcset="https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news2-banner-373x223.png 373w, https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news2-banner-300x180.png 300w, https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news2-banner.png 700w" sizes="(max-width: 373px) 100vw, 373px" />
                        <div class="datesection">
                           <span class="date">
                           05.06.2022                            </span>&nbsp;<span class="tt">-</span>&nbsp;
                           <ul class="post-categories">
                              <li><a href="category/medical/index.html" rel="category tag">Medical</a></li>
                           </ul>
                        </div>
                        <h3 class="baslik-3 h-yazi-margin-kucuk">Des méthodes étonnantes pour les maux de dents</h3>
                        <p class="post-kutu--yazi">
                        <p>Méthodes étonnantes pour les maux de dents. Il n'y a pratiquement personne qui n'ait jamais eu mal dans sa vie. Peu importe.[&hellip;]</p>
                        <div class="h-yazi-ortalama h-yazi-margin-4">
                           <a href="amazing-methods-for-toothache/index.html" class="custom-button">More</a>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide wow fadeInLeft" data-wow-delay="0.5s" data-tilt>
                     <div class="post-kutu" style="cursor:pointer;">
                        <img width="373" height="223" src="{{asset('assets/wp-content/uploads/2022/06/news3-banner-373x223.png')}}" class="attachment-custom-size size-custom-size wp-post-image" alt="" decoding="async" srcset="https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news3-banner-373x223.png 373w, https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news3-banner-300x180.png 300w, https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news3-banner.png 700w" sizes="(max-width: 373px) 100vw, 373px" />
                        <div class="datesection">
                           <span class="date">
                           05.06.2022                            </span>&nbsp;<span class="tt">-</span>&nbsp;
                           <ul class="post-categories">
                              <li><a href="category/medical/index.html" rel="category tag">Medical</a></li>
                           </ul>
                        </div>
                        <h3 class="baslik-3 h-yazi-margin-kucuk">It&#8217;Il est désormais facile d'avoir des sourires parfaits</h3>
                        <p class="post-kutu--yazi">
                        <p>Quelles sont les conséquences de l'encombrement dentaire sur l'état de santé dentaire ? Comment se déroule le traitement ? L'encombrement dentaire peut [&hellip;]</p>
                        <div class="h-yazi-ortalama h-yazi-margin-4">
                           <a href="its-now-easy-to-have-perfect-smiles/index.html" class="custom-button">Plus</a>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide wow fadeInLeft" data-wow-delay="0.5s" data-tilt>
                     <div class="post-kutu" style="cursor:pointer;">
                        <img width="373" height="223" src="{{asset('assets/wp-content/uploads/2022/06/news5-banner-373x223.png')}}" class="attachment-custom-size size-custom-size wp-post-image" alt="" decoding="async" srcset="https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news5-banner-373x223.png 373w, https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news5-banner-300x180.png 300w, https://garantiwebtasarim.com/wordpress/medidoc/wp-content/uploads/2022/06/news5-banner.png 700w" sizes="(max-width: 373px) 100vw, 373px" />
                        <div class="datesection">
                           <span class="date">
                           05.06.2022                            </span>&nbsp;<span class="tt">-</span>&nbsp;
                           <ul class="post-categories">
                              <li><a href="category/medical/index.html" rel="category tag">Medical</a></li>
                           </ul>
                        </div>
                        <h3 class="baslik-3 h-yazi-margin-kucuk">Le stress ménace la santé !</h3>
                        <p class="post-kutu--yazi">
                    <p>Le stress, l'une des maladies les plus importantes de notre époque, entraîne de nombreuses maladies telles que les maux de tête, les maladies cardiaques, l'obésité, les nausées, [&hellip;]</p>
                        <div class="h-yazi-ortalama h-yazi-margin-4">
                           <a href="stress-threatens-oral-and-dental-health/index.html" class="custom-button">Plus</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="swiper-pagination"></div>
</section>
<!--Footer Alanı-->

@endsection

