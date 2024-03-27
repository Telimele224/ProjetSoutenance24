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
<section class="ozellika" data-background="#f3f3f3">
    <div class="container">
        <div class="row align-items-center no-gutters">
            <div class="col-lg-12">
                <div class="wow fadeInUp" data-wow-delay="0.3s">
                    <div class="boslukalt"></div>
                    <h2 class="h2-baslik-hizmetler-2 wow fadeInUp" data-wow-delay="0.4s">Our Expert Doctors</h2>
                    <p class="h2-baslik-hizmetler-2__paragraf wow fadeInUp" data-wow-delay="0.4s">Your health is entrusted to us.</p>
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
                        @foreach($medecins as $medecin)
                        <div class="swiper-slide">
                            <div class="class-box">
                                <div class="services-kutu2 wow fadeInLeft" data-wow-delay="0.5s" style="cursor:pointer; width: 100%; height: 100%;">
                                    <div class="member-box wow reveal-effect" style="width: 100%; height: 100%;">
                                        <figure style="width: 100%; height: 100%;">
                                            <img src="{{ asset('avatars/' . $medecin->avatar) }}" alt="Image" style="width: 100%; height: 450px;">
                                            <figcaption>
                                                <h6>{{ $medecin->nom }} {{ $medecin->prenom }}</h6>
                                                <p class="paragraf-sol-beyaz-orta">{{ $medecin->specialite }}</p>
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
@endsection
