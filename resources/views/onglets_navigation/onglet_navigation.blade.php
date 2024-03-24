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
             <li class="slide__category"><span class="category-name">Personnel</span></li>
             <!-- End::slide__category -->

                   <!-- Start::slide  Patient-->
                   <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                       <span class="side-menu__label"><i class="fa fa-user-circle-o"></i>  ADMINISTRATEURS</span>
                       <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                       <li class="slide side-menu__label1">
                          <a href="javascript:void(0);">admininstrateur</a>
                       </li>
                       <li class="slide">
                         <a href="{{route('admin.administrateur.create')}}" class="side-menu__item"><span> <i class="fa fa-check-circle"></i>       Ajouter</span></a>
                       </li>
                       <li class="slide">
                          <a href="{{route('admin.administrateur.index')}}" class="side-menu__item"> <span><i class="fa fa-list-ol"></i>        Listes</span></a>
                    </ul>
                 </li>
                     <!-- Start::slide  fin-->

             <!-- Start::slide  Medecins-->
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"><i class="fa fa-user-md"></i>          MEDECINS</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);">MEDECINS</a>
                   </li>
                   <li class="slide">
                     <a href="{{route('admin.medecin.create')}}" class="side-menu__item"><span> <i class="fa fa-check-circle"></i>       Enregistrer</span></a>
                   </li>
                   <li class="slide">
                      <a href="{{route('admin.medecin.index')}}" class="side-menu__item"> <span><i class="fa fa-list-ol"></i>        Listes</span></a>
                   </li>
                   <li class="slide has-sub">
                      <a href="javascript:void(0);" class="side-menu__item"><span><i class="fa fa-calendar-check-o"></i>      Emploi | Medecins</span></a>
                   </li>
                   <li class="slide has-sub">
                    <a href="{{ route('admin.emplois.create') }}" class="side-menu__item"><span><i class="fa fa-calendar-check-o"></i>      Ajout | Horaires</span></a>
                   </li>
                   <li class="slide has-sub">
                    <a href="{{ route('admin.horaires.index') }}" class="side-menu__item"><span><i class="fa fa-calendar-check-o"></i>      Liste | Horaires</span></a>
                 </li>
                </ul>
             </li>
             <!-- End::slide -->
             <!-- Start::slide  Patient-->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                       <span class="side-menu__label"><i class="fa fa-bed"></i>  PATIENTS</span>
                       <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                       <li class="slide side-menu__label1">
                          <a href="javascript:void(0);">Patients</a>
                       </li>
                       <li class="slide">
                         <a href="{{route('admin.patient.create')}}" class="side-menu__item"><span> <i class="fa fa-check-circle"></i>       Enregistrer</span></a>
                       </li>
                       <li class="slide">
                          <a href="{{route('admin.patient.index')}}" class="side-menu__item"> <span><i class="fa fa-list-ol"></i>        Listes</span></a>
                    </ul>
                 </li>
             <!-- Start::slide  fin-->
              <!-- Start::slide  Patient-->
              <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"><i class="fa fa-bed"></i>  PERSONNELS</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);">personnels</a>
                   </li>
                   <li class="slide">
                     <a href="{{route('admin.personnel.create')}}" class="side-menu__item"><span> <i class="fa fa-check-circle"></i>       Enregistrer</span></a>
                   </li>
                   <li class="slide">
                      <a href="{{route('admin.personnel.index')}}" class="side-menu__item"> <span><i class="fa fa-list-ol"></i>        Listes</span></a>
                </ul>
             </li>
         <!-- Start::slide  fin-->

             <li class="slide__category"><span class="category-name"> Services Actualités</span></li>
             <!-- End::slide__category -->
             <!-- Start::slide -->
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">

                   <span class="side-menu__label"><i class="fa fa-cubes"></i>      SERVICES</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);">Services</a>
                   </li>
                   <li class="slide">
                      <a href="{{route('admin.service.create')}}" class="side-menu__item"><span> <i class="fa fa-check-circle"></i>        Ajouter</span></a>
                   </li>
                   <li class="slide">
                      <a href="{{route('admin.service.index')}}" class="side-menu__item"><span><i class="fa fa-list-ol"></i>        Listes</span></a>
                   </li>
                </ul>
             </li>
             <!-- End::slide -->

                          <!-- Start::slide  Actualité-->
                          <li class="slide has-sub">
                             <a href="javascript:void(0);" class="side-menu__item">

                                <span class="side-menu__label"><i class="fa fa-newspaper-o"></i>    ACTUALITE</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                             </a>
                             <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                   <a href="javascript:void(0);">Actulité</a>
                                </li>
                                <li class="slide">
                                   <a href="{{route('admin.actualite.create')}}" class="side-menu__item"><span><i class="fa fa-share"></i>        Publier</span></a>
                                </li>
                                <li class="slide">
                                   <a href="{{route('admin.actualite.index')}}" class="side-menu__item"><span><i class="fa fa-list-ol"></i>        Listes</span></a>
                                </li>
                             </ul>
                          </li>
                          <!-- End::slide -->
                           <!-- Start::slide -->
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"><i class="icon icon-picture"></i>      GALERIES</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);">GALERIES</a>
                   </li>
                   <li class="slide">
                      <a href="{{route('admin.galerie.create')}}" class="side-menu__item"><span> <i class="fa fa-check-circle"></i>        Ajouter</span></a>
                   </li>
                   <li class="slide">
                    <a href="{{route('admin.galerie.index')}}" class="side-menu__item"><span> <i class="fa fa-check-circle"></i>        listes</span></a>
                 </li>

                </ul>
             </li>
             <!-- End::slide -->
             <!-- Start::slide__category Chatify & Forum -->
             <li class="slide__category"><span class="category-name">TEMOIGNAGE & CONSULTATIONS</span></li>
             <!-- End::slide -->
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"><i class="fa fa-thumbs-o-up"></i>    TEMOIGNAGES</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);">Temoignage</a>
                   </li>
                   <li class="slide">
                      <a href="{{route('admin.temoignage.temoignagepublier')}}" class="side-menu__item"><span><i class="fa fa-share"></i>        Publier</span></a>
                   </li>
                   <li class="slide">
                      <a href="{{route('admin.temoignage.index')}}" class="side-menu__item"><span><i class="fa fa-list-ol"></i>        Listes</span></a>
                   </li>
                </ul>
             </li>
             <!-- End::slide -->
              <!-- End::slide -->
              <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"><i class="fa fa-themeisle"></i>    TYPE DE TEMOIGNAGE</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);">Type de consultation </a>
                   </li>
                   <li class="slide">
                    <a href="{{route('admin.typeconsultation.create')}}" class="side-menu__item"><span><i class="ion-chatbox"></i>        Ajouter</span></a>
                 </li>
                 <li class="slide">
                    <a href="{{route('admin.typeconsultation.index')}}" class="side-menu__item"><span><i class="fa fa-commenting"></i>        Listes</span></a>
                </li>

                </ul>
             </li>
             <!-- End::slide -->

             <!-- Start::slide__category Chatify & Forum -->
             <li class="slide__category"><span class="category-name">MESSAGERIE & FORUM</span></li>
             <!-- End::slide__category -->
             <!-- Start::slide -->
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"> <i class="fa fa-comments-o"></i>      CONVERSATIONS</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1 mega-menu">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);"><span>MESSAGERIE & FORUM</a>
                   </li>
                   <li class="slide">
                      <a href="{{route('chatify')}}" class="side-menu__item"><span><i class="ion-chatbox"></i>        Messagerie</span></a>
                   </li>
                   <li class="slide">
                      <a href="{{route('forum.index')}}" class="side-menu__item"><span><i class="fa fa-commenting"></i>        Form</span></a>
                   </li>
                </ul>
             </li>
             <li class="slide has-sub">
                <a href="javascript:void(0);" class="side-menu__item">
                   <span class="side-menu__label"><i class="fa fa-calendar"></i> CALENDRIER</span>
                   <i class="fe fe-chevron-right side-menu__angle"></i>
                </a>
                <ul class="slide-menu child1 mega-menu">
                   <li class="slide side-menu__label1">
                      <a href="javascript:void(0);"><span> CALENDRIER</a>
                   </li>
                   <li class="slide">
                    <a href="{{route('admin.calendriers.index')}}" class="side-menu__item"><span><i class="fa fa-commenting"></i>        CALENDRIER</span></a>
                 </li>
                 <li class="slide">
                    <a href="{{route('admin.calendriers.create')}}" class="side-menu__item"><span><i class="fa fa-commenting"></i>        ajouter</span></a>
                 </li>
                </ul>
             </li>
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
