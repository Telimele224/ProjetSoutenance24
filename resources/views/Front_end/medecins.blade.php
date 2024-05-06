@extends('layouts_front.main')

@section('contenu')
<header class="page-header wow fadeInUp" data-wow-delay="0.5s" data-background="{{asset('assets/wp-content/uploads/2022/06/doctors.jpg')}}">
    <div class="container">
        <h2>Medecins</h2>
        <div class="bosluk3"></div>
        <p><a href="#" class="headerbreadcrumb">Accueil</a> <i class="flaticon-right-chevron"></i>Medecins</p>
    </div>
    <!-- end container -->
</header>

<!--TITLE-->
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
@endsection
