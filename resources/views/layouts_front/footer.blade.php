<footer class="footer">
    <div class="container">
       <div class="row">
          <div class="col-xl-3 col-lg-4">
             <div class="logo wow animated fadeInUp animated" data-wow-delay="0.5s"> <img src="{{asset('logo/SIDEBARE2.png')}}" alt="Image"> </div>
             <!-- end logo -->
             <div class="footer-info wow animated fadeInUp animated" data-wow-delay="0.5s">
                <p><i class="flaticon-location iconpfooter1 "></i>Labé, Guinée</p>
                <p class="fic"><i class="flaticon-headphones iconpfooter2 "></i>&nbsp;&nbsp;&nbsp;+ (224) 628 89 10 12</p>
                <br>
                <p><i class="flaticon-email iconpfooter3 "></i>&nbsp;&nbsp;&nbsp;hrlabe224@gmail.com</p>
                <br>
             </div>
          </div>
          <!-- end col-3 -->
          <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
             <h6 class="widget-title">Rejoignez notre newsletter</h6>
             <p class="footerp">
                Abonnez vous à notre newsletter électronique pour être informé des informations importantes en matière de santé .
             </p>
             <div class="bosluk333"></div>
             <div role="form" class="wpcf7" id="wpcf7-f766-o1" lang="en-US" dir="ltr">
                <div class="screen-reader-response">
                   <p role="status" aria-live="polite" aria-atomic="true"></p>
                   <ul></ul>
                </div>
                <form action="https://garantiwebtasarim.com/wordpress/medidoc/#wpcf7-f766-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
                   <div style="display: none;">
                      <input type="hidden" name="_wpcf7" value="766" />
                      <input type="hidden" name="_wpcf7_version" value="5.5.6.1" />
                      <input type="hidden" name="_wpcf7_locale" value="en_US" />
                      <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f766-o1" />
                      <input type="hidden" name="_wpcf7_container_post" value="0" />
                      <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                   </div>
                   <p><br></p>
                   <div class="form__grup wow fadeInLeft" data-wow-delay="0.7s">
                      <span class="wpcf7-form-control-wrap email-217"><input type="email" name="email-217" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-popup__input" aria-required="true" aria-invalid="false" placeholder="Votre adresse mail" /></span>
                   </div>
                   <div class="form__grup wow fadeInUp" data-wow-delay="0.9s">
                      <input type="submit" value="Abonnez-vous →" class="wpcf7-form-control has-spinner wpcf7-submit custom-buttonw1" />
                   </div>
                   <div class="wpcf7-response-output" aria-hidden="true"></div>
                </form>
             </div>
          </div>
          <!-- end col-4 -->
          <div class="col-lg-2 offset-xl-1 col-sm-6 wow animated fadeInUp animated" data-wow-delay="0.5s">
             <h6 class="widget-title">Services</h6>
             <div class="footer-menu">
                @foreach ($services as $service)
                <li class="menu-item menu-item-type-post_type menu-item-object-page nav-item">
                      <a href="{{route('admin.service.show',$service)}}" class=""><span itemprop="name">{{ $service->nom }}</span></a>
                </li>
             @endforeach
             </div>
          </div>
          <!-- end col-2 -->
          <div class="col-lg-2 col-sm-6 wow animated fadeInUp animated" data-wow-delay="0.5s">
             <h6 class="widget-title">Liens rapides</h6>
             <div class="footer-menu">
                <div class="menu-quick-links-container">
                   <ul id="menu-quick-links" class="menu" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                      <li id="menu-item-606" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-5 current_page_item menu-item-606"><a href="{{route('welcome')}}" aria-current="page">Acceuil</a></li>
                      <li id="menu-item-607" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-607"><a href="{{route('apropos')}}">A propos</a></li>
                      <li id="menu-item-608" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-608"><a href="{{route('Blog')}}">Blog</a></li>
                      <li id="menu-item-1510" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1510"><a href="{{route('medecins')}}">Médecins</a></li>
                      <li id="menu-item-1511" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1511"><a href="{{route('les_departements')}}">Tous les services</a></li>
                      <li id="menu-item-610" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-610"><a href="{{route('contact')}}">Contact</a></li>
                      <li id="menu-item-1515" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1515"><a href="{{route('recommandation.service')}}">Prendre rendez-vous</a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
       <!-- end row -->
    </div>
    <!-- Copyright -->
    <div class="container">
       <div class="row">
          <div class="col-12">
             <p class="copyright">© 2024 IST-MAMOU GENIE-INFO P15 G-33 - Tous droits reservés.</p>
          </div>
       </div>
    </div>
    <div id="top" style="cursor: pointer;">
       <i class="flaticon-chevron icontops"></i>
       <div class="bosluk3"></div>
    </div>
 </footer>
 <script src="{{asset('assets/wp-includes/js/dist/vendor/wp-polyfill-inert.min0226.js?ver=3.1.2')}}" id="wp-polyfill-inert-js"></script>
 <script src="{{asset('assets/wp-includes/js/dist/vendor/regenerator-runtime.min6c85.js?ver=0.14.0')}}" id="regenerator-runtime-js"></script>
 <script src="{{asset('assets/wp-includes/js/dist/vendor/wp-polyfill.min2c7c.js?ver=3.15.0')}}" id="wp-polyfill-js"></script>
 <script id="contact-form-7-js-extra">
    var wpcf7 = {"api":{"root":"https:\/\/garantiwebtasarim.com\/wordpress\/medidoc\/wp-json\/","namespace":"contact-form-7\/v1"},"cached":"1"};
 </script>
 <script src="{{asset('assets/wp-content/plugins/contact-form-7/includes/js/index04dd.js?ver=5.5.6.1')}}" id="contact-form-7-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/team68b3.js?ver=1')}}" id="team-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/jquery.min68b3.js?ver=1')}}" id="jquery-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/fancybox.min68b3.js?ver=1')}}" id="fancybox-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/swiper.min68b3.js?ver=1')}}" id="swiper-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/odometer.min68b3.js?ver=1')}}" id="odometer-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/wow.min68b3.js?ver=1')}}" id="wow-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/scripts68b3.js?ver=1')}}" id="scripts-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/3d.jquery68b3.js?ver=1')}}" id="3d-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/pointer68b3.js?ver=1')}}" id="pointer-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/yukari-cik68b3.js?ver=1')}}" id="yukari-cik-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/js/tabs68b3.js?ver=1')}}" id="tabs-js"></script>
 <script src="{{asset('assets/wp-content/themes/medidoc/custom68b3.js?ver=1')}}" id="custom-js"></script>
 <!--Cursor Script-->
 <script>
    init_pointer({

    })
 </script>
</body>
<!-- Mirrored from garantiwebtasarim.com/wordpress/medidoc/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Nov 2023 12:07:51 GMT -->
</html>
