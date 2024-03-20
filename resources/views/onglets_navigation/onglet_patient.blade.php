<!--Main-Sidebar-->
<aside class="app-sidebar sticky" id="sidebar">
    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
       <a href="index.html" class="header-logo">
       <img src="{{asset('assets/build/assets/images/brand/desktop-logo.png')}}" alt="logo" class="desktop-logo">
       <img src="{{asset('assets/build/assets/images/brand/toggle-logo.png')}}" alt="logo" class="toggle-logo">
       <img src="{{asset('assets/build/assets/images/brand/desktop-dark.png')}}" alt="logo" class="desktop-dark">
       <img src="{{asset('assets/build/assets/images/brand/toggle-dark.png')}}" alt="logo" class="toggle-dark">
       </a>
    </div>
    <!-- End::main-sidebar-header -->
    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">
       <!-- Start::nav -->
       <nav class="main-menu-container nav nav-pills flex-column sub-open">
          <div class="slide-left" id="slide-left">
             <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                viewBox="0 0 24 24">
                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
             </svg>
          </div>
          <ul class="main-menu">
             <!-- Start::slide__category -->
             <li class="slide__category"><span class="category-name">Principal</span></li>
             <!-- End::slide__category -->
             <!-- Start::slide -->
             <li class="slide">
                <a href="{{route('home')}}" class="side-menu__item">
                   <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24px"
                      viewBox="0 0 24 24" width="24px" fill="#000000">
                      <path d="M0 0h24v24H0V0z" fill="none" />
                      <path
                         d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z" />
                   </svg>
                   <span class="side-menu__label">Tableau de bord</span>
                </a>
             </li>
             <!-- End::slide -->
             <!-- Start::slide__category -->
             <li class="slide__category"><span class="category-name">Géneral</span></li>
             <!-- End::slide__category -->
             <!-- Start::slide  Medecins-->
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"><i class="wi wi-earthquake"></i>          MEDECINS</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);">Médecins</a>
                   </li>
                   <li class="slide">
                      <a href="{{route('patients.medecin.index')}}" class="side-menu__item"> <span><i class="fa fa-list-ol"></i>        Listes</span></a>
                   </li>
                </ul>
             </li>
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"><i class="wi wi-earthquake"></i>RENDEZ-VOUS</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">

                   <li class="slide">
                      <a href="{{ route('medecins.login_medecin_view') }}" class="side-menu__item"> <span><i class="fa fa-list-ol"></i>Ajout | Rendez-vous</span></a>
                   </li>
                   <li class="slide">
                      <a href="{{ route('liste_rdv_patient') }}" class="side-menu__item"> <span><i class="fa fa-list-ol"></i>Liste | Rendez-vous</span></a>
                   </li>
                </ul>
             </li>
             <!-- End::slide -->
            <!-- Start::slide  Calendrier-->
            <li class="slide has-sub">
            <a href="javascript:void(0);" class="side-menu__item">
                <span class="side-menu__label"><i class="fa fa-calendar"></i>          CALENDRIER</span>
                <i class="fe fe-chevron-right side-menu__angle"></i>
            </a>
            <ul class="slide-menu child1">
                <li class="slide">
                    <a href="{{route('admin.calendriers.index')}}" class="side-menu__item"><span><i class="fa fa-calendar-o"></i>      Date du jour</span></a>
                </li>
            </ul>
            </li>
            <!-- End::slide -->
             <li class="slide__category"><span class="category-name">DISCUSION</span></li>
             <!-- End::slide__category -->
             <!-- Start::slide -->
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                    <span class="side-menu__label"><i class="pe-7s-comment"></i>          DISCUSION</span>
                    <i class="fe fe-chevron-right side-menu__angle"></i>
                 </a>
                <ul class="slide-menu child1 mega-menu">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);"><span>Forum</a>
                   </li>
                   <li class="slide">
                      <a href="{{route('chatify')}}" class="side-menu__item"><span><i class="ion-chatbox"></i>        Messagerie</span></a>
                   </li>
                   <li class="slide">
                      <a href="{{route('forum.index')}}" class="side-menu__item"><span><i class="fa fa-commenting"></i>        Form</span></a>
                   </li>
                </ul>
             </li>
             <!-- Start::slide  Patient-->
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"><i class="fe fe-users"></i>  TEMOIGNAGE </span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);">Temoignage</a>
                   </li>
                   <li class="slide">
                     <a href="{{route('patients.temoignage.create')}}" class="side-menu__item"><span> <i class="fe fe-users"></i>     Ajouter</span></a>
                   </li>
                   <li class="slide">
                    <a href="{{route('patients.temoignage.index')}}" class="side-menu__item"><span> <i class="fe fe-users"></i>     Listes</span></a>
                  </li>
                </ul>
             </li>
             <!-- Start::slide__category Chatify & Forum -->
             <!-- Start::slide  Patient-->
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"><i class="fe fe-users"></i>  DOSSIER MEDICAL</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);">dossier medecal</a>
                   </li>
                   <li class="slide">
                     <a href="{{route('patients.Dossier_medical.index')}}" class="side-menu__item"><span> <i class="fe fe-users"></i>     Mon dossier médical</span></a>
                   </li>
                </ul>
             </li>
             <!-- Start::slide__category Chatify & Forum -->
             <!-- End::slide -->
            <!-- Start::slide__category  Profile -->
            <li class="slide__category"><span class="category-name">PROFILE</span></li>
            <!-- End::slide__category -->
            <!-- Start::slide -->
            <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">

                <span class="side-menu__label"><i class="icon-lock"></i>    MON COMPTE</span>
                <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1 mega-menu">
                <li class="slide side-menu__label1">
                    <a href="javascript:void(0);"><span>Forum</a>
                </li>
                <li class="slide">
                    <a href="{{route('profile.edit')}}" class="side-menu__item"><span><i class="ion-person"></i>        Profile</span></a>
                </li>
                <li class="slide">
                    <a >
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <span><i class="ti ti-power fs-18 me-2 op-7"></i></span> {{ __('Déconnexion') }}
                            </x-responsive-nav-link>
                        </form>
                    </a>
                </li>
                </ul>
            </li>
            <!-- End::slide -->
          </ul>
          <div class="slide-right" id="slide-right">
             <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                width="24" height="24" viewBox="0 0 24 24">
                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                </path>
             </svg>
          </div>
       </nav>
       <!-- End::nav -->
    </div>
    <!-- End::main-sidebar -->
 </aside>
