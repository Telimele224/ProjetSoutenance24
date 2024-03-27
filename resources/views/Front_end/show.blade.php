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
                    @foreach ($services as $service)
                    <span class="menu-service" onclick="toggleActive(this);">
                        <a href="{{ route('admin.service.show', $service) }}">
                            <i class="flaticon-right-chevron"></i>{{$service->nom}}
                        </a>
                    </span>
                  @endforeach
                </div>
                <div class="bosluk3"></div>
                <div role="form" class="wpcf7" id="wpcf7-f809-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response">
                        <p role="status" aria-live="polite" aria-atomic="true"></p>
                        <ul></ul>
                    </div>
                    <form action="https://garantiwebtasarim.com/wordpress/medidoc/gastroenterology/#wpcf7-f809-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="809" />
                            <input type="hidden" name="_wpcf7_version" value="5.5.6.1" />
                            <input type="hidden" name="_wpcf7_locale" value="en_US" />
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f809-o1" />
                            <input type="hidden" name="_wpcf7_container_post" value="0" />
                            <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                        </div>
                        <div class="callbackform wow fadeInUp" data-wow-delay="0.7s">
                            <h2 class="h2-baslik-popup h-yazi-margin-kucuk">
                            Leave Your Number<br />
                            </h2>
                            <p class="paragraf-popup">
                            Let's Call You Back
                            </p>
                            <div class="form-popup">
                            <div class="form-popup__grup">
                                <span class="wpcf7-form-control-wrap text-667"><input type="text" name="text-667" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-popup__input" aria-required="true" aria-invalid="false" placeholder="Full Name" /></span><br />
                                <label for="text-667" class="form-popup__label"></label>
                            </div>
                            <div class="form-popup__grup">
                                <span class="wpcf7-form-control-wrap email-217"><input type="email" name="email-217" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-popup__input" aria-required="true" aria-invalid="false" placeholder="Email Address" /></span><br />
                                <label for="email-217" class="form-popup__label"></label>
                            </div>
                            <div class="form-popup__grup">
                                <span class="wpcf7-form-control-wrap text-661"><input type="text" name="text-661" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-popup__input" aria-required="true" aria-invalid="false" placeholder="Phone Number" /></span><br />
                                <label for="text-661" class="form-popup__label"></label>
                            </div>
                            <div class="form-popup__grup">
                                <div class="or">
                                    <input type="submit" value="Submit Form →" class="wpcf7-form-control has-spinner wpcf7-submit custom-button12" />
                                </div>
                            </div>
                            <p><br>
                            </div>
                        </div>
                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                </div>
                </div>
                <div class="col-lg-8">
                <div class="bosluk333"></div>
                <div class="galeri wow fadeInRight" data-wow-delay="0.7s">
                    <img  style="width: 100%; height: 150px;" src="{{asset('storage/'.$service->photo)}}"   alt="IT Support Services" class="galeri__gorsel galeri__gorsel--3">
                </div>
                <div class="bosluk3"></div>
                <h2 class="h2-baslik-anasayfa-ozel wow fade">{{$service->nom}}</h2>
                <div class="bosluk333"></div>
                <p class="paragraf wow fade">
                </p>
                <div class="bosluk333"></div>
                <img class="divider" width="120" height="15" title="divider" alt="divider" src="{{asset('assets/wp-content/uploads/2022/05/divider.jpg')}}">
                <div class="bosluk333"></div>
                <p class="paragraf wow fade">
                    <p>{{$service->description}}</p>
                </p>
                <div class="bosluk333"></div>
                <div class="bosluk3"></div>
                <div class="tabloozellik">
                    <div class="tablo--1-ve-2">
                        <div class="paketler4 wow fadeInLeft" data-wow-delay="0.5s">
                            <div class="paketler4__on paketler4__on--onyazi">
                            <div class="paketler4__icerik">
                                <div class="icon"><i class="flaticon-medical-history"></i></div>
                                <h3 class="baslik-3 h-yazi-margin-kucuk">Reliability</h3>
                            </div>
                            </div>
                            <div class="paketler4__on paketler4__on--arkayazi paketler4__on--arkayazi-1">
                            <div class="paketler4__pr">
                                <div class="paketler4__pr-kutu">
                                    <h3 class="baslik-orta h-yazi-margin-kucuk">Reliability</h3>
                                    <p class="services-kutu2--yazi1 wow fade">
                                        We provide accurate, reliable and ethical services with our expert staff. We apply the fastest and most reliable methods for your brand.
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
                                <h3 class="baslik-3 h-yazi-margin-kucuk">Loyalty</h3>
                            </div>
                            </div>
                            <div class="paketler4__on paketler4__on--arkayazi paketler4__on--arkayazi-1">
                            <div class="paketler4__pr">
                                <div class="paketler4__pr-kutu">
                                    <h3 class="baslik-orta h-yazi-margin-kucuk">Loyalty</h3>
                                    <p class="services-kutu2--yazi1 wow fade">
                                        Our long-term work continues until the job is finished. We establish solid and long-term relationships with all the companies we work with.
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
