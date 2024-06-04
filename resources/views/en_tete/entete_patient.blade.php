<!doctype html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" loader="disable">
   <!-- Mirrored from laravelui.spruko.com/vexel/index by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Dec 2023 00:59:14 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <!-- META DATA -->
      <meta charset="UTF-8">
      <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="vexel – Laravel Bootstrap 5  Admin & Dashboard Template">
      <meta name="author" content="Spruko Technologies Private Limited">
      <meta name="keywords" content="admin panel template, admin dashboard template, admin panel, bootstrap admin template, dashboard, laravel, bootstrap dashboard, admin dashboard, admin panel laravel template, laravel framework, admin laravel, laravel admin panel.">
      <!-- TITLE -->
      <title>Hopital Regional de Labé </title>
      <!-- Favicon -->
      <link rel="icon" href="{{asset('assets/build/assets/images/brand/favicon.ico')}}" type="image/x-icon">
      <!-- ICONS CSS -->
      <link href="{{asset('assets/build/assets/iconfonts/icons.css')}}" rel="stylesheet">
      <!-- Main Theme Js -->
      <script src="{{asset('assets/build/assets/main.js')}}"></script>
      <link rel="stylesheet" href="{{asset('assets/plugin/style.css')}}">
      <!-- BOOTSTRAP CSS -->
      <link id="style" href="{{asset('assets/build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Choices JS -->
      <script src="{{asset('assets/build/assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
      <!-- Simplebar Css -->
      <link href="{{asset('assets/build/assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet">
      <!-- Color Picker Css -->
      <link rel="stylesheet" href="{{asset('assets/build/assets/libs/flatpickr/flatpickr.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/build/assets/libs/%40simonwep/pickr/themes/nano.min.css')}}">
      <!-- Choices Css -->
      <link rel="stylesheet" href="{{asset('assets/build/assets/libs/choices.js/public/assets/styles/choices.min.css')}}">
      <!-- APP CSS & APP SCSS -->
      <link rel="preload" as="style" href="{{asset('assets/build/assets/app-e29e56ca.css')}}" />
      <link rel="stylesheet" href="{{asset('assets/build/assets/app-e29e56ca.css')}}" />
      <link rel="stylesheet" href="{{asset('assets/select2.css')}}">
      <link rel="stylesheet" href="{{asset('assets/select2.min.css')}}">
       <!-- Scripts -->
       {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
   </head>
   <body class="app sidebar-mini">
      @include('en_tete.couleur')
      <!-- GLOBAL-LOADER -->
      <div id="loader">
         <img src="{{asset('assets/build/assets/images/loader.svg')}}" class="loader-img" alt="Loader">
      </div>
      <!-- /GLOBAL-LOADER -->
      <!-- PAGE -->
      <div class="page">
         <div class="page-main">
            @include('en_tete.navigation_en_haut_patient')
            <!--Main-Sidebar Onglets de navigation-->
            @include('onglets_navigation.onglet_patient')
            <!-- End Main-Sidebar onglet de navigation fin-->
            <!--app-content open-->
            <div class="main-content app-content mt-0">
               <!-- PAGE-HEADER -->
               @include('connexion_en_cours.titre')
               <!-- PAGE-HEADER END -->

               @if (session('success'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                   {{ session('success') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif

               @if (session('error'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   {{ session('error') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif

               <!-- CONTAINER -->
               @yield('contenu')
            </div>
            <!-- END APP-CONTENT -->
         </div>
         <!--app-content closed-->
         <!-- Country-selector modal -->
         <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-body">
                     <span class="input-group">
                     <input type="search" class="form-control px-2 " placeholder="Search..."
                        aria-label="Username">
                     <a href="javascript:void(0);" class="input-group-text bg-primary text-white"
                        id="Search-Grid"><i class="fe fe-search header-link-icon tx-fixed-white fs-18"></i></a>
                     </span>
                     <div class="mt-3">
                        <div class="">
                           <p class="fw-semibold text-muted mb-2 fs-13">Recent Searches</p>
                           <div class="ps-2">
                              <a href="javascript:void(0);" class="search-tags"><i
                                 class="fe fe-search me-2"></i>People<span></span></a>
                              <a href="javascript:void(0);" class="search-tags"><i
                                 class="fe fe-search me-2"></i>Pages<span></span></a>
                              <a href="javascript:void(0);" class="search-tags"><i
                                 class="fe fe-search me-2"></i>Articles<span></span></a>
                           </div>
                        </div>
                        <div class="mt-3">
                           <p class="fw-semibold text-muted mb-2 fs-13">Apps and pages</p>
                           <ul class="ps-2">
                              <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                 <a href="calendar2.html"><span><i
                                    class="bi bi-calendar me-2 fs-14 bg-primary-transparent avatar rounded-circle"></i>Calendar</span></a>
                              </li>
                              <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                 <a href="email-inbox.html"><span><i
                                    class="bi bi-envelope me-2 fs-14 bg-primary-transparent avatar rounded-circle"></i>Mail</span></a>
                              </li>
                              <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                 <a href="buttons.html"><span><i
                                    class="bi bi-dice-1 me-2 fs-14 bg-primary-transparent avatar rounded-circle"></i>Buttons</span></a>
                              </li>
                           </ul>
                        </div>
                        <div class="mt-3">
                           <p class="fw-semibold text-muted mb-2 fs-13">Links</p>
                           <ul class="ps-2">
                              <li class="p-1 align-items-center  mb-1 search-app">
                                 <a href="javascript:void(0);"
                                    class="text-primary"><u>http://spruko/html/spruko.com</u></a>
                              </li>
                              <li class="p-1 align-items-center mb-1 search-app">
                                 <a href="javascript:void(0);"
                                    class="text-primary"><u>http://spruko/demo/spruko.com</u></a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer d-block">
                     <div class="text-center">
                        <a href="javascript:void(0);" class="text-primary text-decoration-underline fs-15">View all
                        results</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- End Country-selector modal -->
         <!-- Footer opened -->
         <footer class="footer">
            <div class="container">
               <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © <span id="year"></span> <a href="javascript:void(0);">IST-MAMOU GENIE-INFO P15 G-33 -</a>.Tous droits reservés. <span
                       class="fa fa-heart text-danger"></span>
                 </div>
               </div>
            </div>
         </footer>
         <!-- End Footer -->
      </div>
      <!-- END PAGE-->
      <!-- SCRIPTS -->
      <!-- Scroll To Top -->
      <div class="scrollToTop">
         <span class="arrow"><i class="fa fa-angle-up fs-20"></i></span>
      </div>

      {{-- pour le calendrier --}}
            <script src="{{asset('assets/plugin/bootstrap.min.js')}}"></script>
            <script src="{{asset('assets/plugin/calendar.js')}}"></script>
            <script src="{{asset('assets/plugin/cdn.jsdelivr.net_npm_chart.js')}}"></script>
            <script src="{{asset('assets/plugin/jquery-3.7.0.min.js')}}"></script>
            <script src="{{asset('assets/plugin/jquery.nice-select.min.js')}}"></script>
      {{-- fin --}}




      <!-- Scroll To Top -->
      <div id="responsive-overlay"></div>
      <!-- Popper JS -->
      <script src="{{asset('assets/build/assets/libs/%40popperjs/core/umd/popper.min.js')}}"></script>
      <!-- Bootstrap JS -->
      <script src="{{asset('assets/build/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- Node Waves JS-->
      <script src="{{asset('assets/build/assets/libs/node-waves/waves.min.js')}}"></script>
      <script src="{{asset('assets/build/assets/js/calendar.js')}}"></script>

      <!-- Simplebar JS -->
      <script src="{{asset('assets/build/assets/libs/simplebar/simplebar.min.js')}}"></script>
      <link rel="modulepreload" href="{{asset('assets/build/assets/simplebar-635bad04.js')}}" />
      <script type="module" src="{{asset('assets/build/assets/simplebar-635bad04.js')}}"></script>
      <!-- Color Picker JS -->
      <script src="{{asset('assets/build/assets/libs/%40simonwep/pickr/pickr.es5.min.js')}}"></script>
      <!-- INTERNAL APEXCHART JS -->
      <script src="{{asset('assets/build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
      <!-- Color Picker JS -->
      <script src="{{asset('assets/build/assets/libs/%40simonwep/pickr/pickr.es5.min.js')}}"></script>
      <!-- Checkbox selectall JS -->
      <link rel="modulepreload" href="{{asset('assets/build/assets/checkbox-selectall-e4a9d358.js')}}" />
      <script type="module" src="{{asset('assets/build/assets/checkbox-selectall-e4a9d358.js')}}"></script>
      <!-- INTERNAL INDEX JS -->
      <link rel="modulepreload" href="{{asset('assets/build/assets/index1-ad56c451.js')}}" />
      <script type="module" src="{{asset('assets/build/assets/index1-ad56c451.js')}}"></script>
      <!-- Sticky JS -->
      <script src="{{asset('assets/build/assets/sticky.js')}}"></script>
      <!-- APP JS-->
      <link rel="modulepreload" href="{{asset('assets/build/assets/modal-e016f475.js')}}" /><script type="module" src="build/assets/modal-e016f475.js"></script>

      <link rel="modulepreload" href="{{asset('assets/build/assets/app-6df099bd.js')}}" />
      <link rel="modulepreload" href="{{asset('assets/build/assets/defaultmenu-7feba3a7.js')}}" />
      <script type="module" src="{{asset('assets/build/assets/app-6df099bd.js')}}"></script>
      <script src="{{asset('assets/select2.full.js')}}"></script>
      <script src="{{asset('assets/select2js.js')}}"></script>

      <script>
         // Faire disparaître les alertes après 20 secondes
         setTimeout(function() {
             let alert = document.querySelector('.alert');
             if (alert) {
                 alert.style.transition = 'opacity 0.5s ease';
                 alert.style.opacity = '0';
                 setTimeout(() => alert.remove(), 500); // Attendre que la transition se termine
             }
         }, 10000); // 20 secondes
     </script>

      <!-- END SCRIPTS -->
   </body>
   <!-- Mirrored from laravelui.spruko.com/vexel/index by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Dec 2023 01:01:17 GMT -->
</html>
