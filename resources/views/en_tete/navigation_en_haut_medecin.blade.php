<header class="app-header header sticky">
    <!-- Start::main-header-container -->
    <div class="main-header-container container-fluid">
       <!-- Start::header-content-left -->
       <div class="header-content-left align-items-center mb-4">
          <div class="header-element">
             <div class="horizontal-logo">
                <a href="index.html" class="header-logo">
                <img src="{{asset('assets/build/assets/images/brand/desktop-logo.png')}}" alt="logo" class="desktop-logo">
                <img src="{{asset('assets/build/assets/images/brand/toggle-logo.png')}}" alt="logo" class="toggle-logo">
                <img src="{{asset('assets/build/assets/images/brand/desktop-dark.png')}}" alt="logo" class="desktop-dark">
                <img src="{{asset('assets/build/assets/images/brand/toggle-dark.png')}}" alt="logo" class="toggle-dark">
                </a>
             </div>
          </div>
          <!-- Start::header-element -->
          <div class="header-element">
             <!-- Start::header-link -->
             <a href="javascript:void(0);" class="sidemenu-toggle header-link" data-bs-toggle="sidebar">
                <span class="open-toggle">
                  <i class="fa fa-bars"></i>
                </span>
                <span class="close-toggle">
                   <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon" viewBox="0 0 24 24"
                      fill="#000000">
                      <path d="M0 0h24v24H0V0z" fill="none" />
                      <path
                         d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                   </svg>
                </span>
             </a>
             <!-- End::header-link -->
          </div>
          <!-- End::header-element -->
          <div class="main-header-center  d-none d-lg-block  header-link">
            <input type="text" class="form-control" id="typehead" placeholder="Labé hôpital regional ..."
               autocomplete="off">
            <button class="btn pe-1"><i class="fe fe-search" aria-hidden="true"></i></button>

         </div>
         <!-- header search -->
       </div>
       <!-- End::header-content-left -->
       <!-- Start::header-content-right -->
       <div class="header-content-right">
          <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
             data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
             aria-controls="navbarSupportedContent-4" aria-expanded="false"
             aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fe fe-more-vertical"></span>
          </button>
          <div class="navbar navbar-collapse responsive-navbar p-0">
             <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <div class="d-flex align-items-center">
                   <!-- Start::header-element -->
                   <div class="header-element header-theme-mode">
                      <!-- Start::header-link|layout-setting -->
                      <a href="javascript:void(0);" class="header-link layout-setting">
                         <span class="light-layout">
                            <!-- Start::header-link-icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" class="header-link-icon" viewBox="0 0 24 24">
                               <g>
                                  <rect fill="none" height="24" width="24" />
                               </g>
                               <g>
                                  <g>
                                     <path
                                        d="M19.78,17.51c-2.47,0-6.57-1.33-8.68-5.43C8.77,7.57,10.6,3.6,11.63,2.01C6.27,2.2,1.98,6.59,1.98,12 c0,0.14,0.02,0.28,0.02,0.42C2.61,12.16,3.28,12,3.98,12c0,0,0,0,0,0c0-3.09,1.73-5.77,4.3-7.1C7.78,7.09,7.74,9.94,9.32,13 c1.57,3.04,4.18,4.95,6.8,5.86c-1.23,0.74-2.65,1.15-4.13,1.15c-0.5,0-1-0.05-1.48-0.14c-0.37,0.7-0.94,1.27-1.64,1.64 c0.98,0.32,2.03,0.5,3.11,0.5c3.5,0,6.58-1.8,8.37-4.52C20.18,17.5,19.98,17.51,19.78,17.51z" />
                                     <path
                                        d="M7,16l-0.18,0C6.4,14.84,5.3,14,4,14c-1.66,0-3,1.34-3,3s1.34,3,3,3c0.62,0,2.49,0,3,0c1.1,0,2-0.9,2-2 C9,16.9,8.1,16,7,16z" />
                                  </g>
                               </g>
                            </svg>
                            <!-- End::header-link-icon -->
                         </span>
                         <span class="dark-layout">
                            <!-- Start::header-link-icon -->
                            <svg xmlns="http://www.w3.org/2000/svg"
                               enable-background="new 0 0 24 24" class="header-link-icon"
                               viewBox="0 0 24 24">
                               <rect fill="none" height="24" width="24" />
                               <path
                                  d="M12,9c1.65,0,3,1.35,3,3s-1.35,3-3,3s-3-1.35-3-3S10.35,9,12,9 M12,7c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5 S14.76,7,12,7L12,7z M2,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S1.45,13,2,13z M20,13l2,0c0.55,0,1-0.45,1-1 s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S19.45,13,20,13z M11,2v2c0,0.55,0.45,1,1,1s1-0.45,1-1V2c0-0.55-0.45-1-1-1S11,1.45,11,2z M11,20v2c0,0.55,0.45,1,1,1s1-0.45,1-1v-2c0-0.55-0.45-1-1-1C11.45,19,11,19.45,11,20z M5.99,4.58c-0.39-0.39-1.03-0.39-1.41,0 c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0s0.39-1.03,0-1.41L5.99,4.58z M18.36,16.95 c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0c0.39-0.39,0.39-1.03,0-1.41 L18.36,16.95z M19.42,5.99c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41 s1.03,0.39,1.41,0L19.42,5.99z M7.05,18.36c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06 c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L7.05,18.36z" />
                            </svg>
                            <!-- End::header-link-icon -->
                         </span>
                      </a>
                      <!-- End::header-link|layout-setting -->
                   </div>
                   <!-- End::header-element -->
                   <!-- Start::header-element -->
                   <div class="header-element header-search ">
                      <!-- Start::header-link -->
                      <a href="javascript:void(0);" class="header-link d-lg-none d-block"
                         data-bs-toggle="modal" data-bs-target="#searchModal">
                         <!-- <i class="bi bi-search-alt-2   ps-0"></i> -->
                         <svg xmlns="http://www.w3.org/2000/svg" class="header-link-icon"
                            viewBox="0 0 24 24" width="24px">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                               d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                         </svg>
                      </a>
                      <!-- End::header-link -->
                   </div>
                   <!-- End::header-element -->
                   <!-- Start::header-element -->
                   <div class="header-element dropdown-center cart-dropdown">
                      <!-- Start::header-link|dropdown-toggle -->
                      <a href="{{route('forum.index')}}" target="blank" class="header-link dropdown-toggle"
                         >
                      <i class="ion-chatbox"></i>
                      <span class="badge bg-primary rounded-pill header-icon-badge"
                         id="cart-icon-badge"></span>
                      </a>
                      <!-- End::header-link|dropdown-toggle -->
                      <!-- Start::main-header-dropdown -->
                      <div class="main-header-dropdown dropdown-menu dropdown-menu-end"
                         data-popper-placement="none">
                         <div class="p-3 empty-header-item border-top">

                               <a href="{{route('forum.index')}}" target="blank" ></a>

                         </div>
                         <div class="p-5 empty-item d-none">
                            <div class="text-center">
                               <span class="avatar avatar-xl rounded-2 bg-warning-transparent">
                               <i class="ri-shopping-cart-2-line fs-2"></i>
                               </span>
                               <h6 class="fw-bold mb-1 mt-3">Your Cart is Empty</h6>
                               <a href="shop.html" class="btn btn-primary btn-wave btn-sm m-1"
                                  data-abc="true">Back to Shop <i
                                  class="bi bi-arrow-right ms-1"></i></a>
                            </div>
                         </div>
                      </div>
                      <!-- End::main-header-dropdown -->
                   </div>
                   <!-- End::header-element -->
                   <!-- Start::header-element -->
                   <div class="header-element dropdown-center notifications-dropdown">
                      <!-- Start::header-link|dropdown-toggle -->
                      <a href="{{route('chatify')}}" target="blank" class="header-link dropdown-toggle"
                        >
                      <i class="fa fa-commenting"></i>
                      <span
                         class="badge bg-secondary rounded-pill header-icon-badge pulse pulse-secondary"
                         id="notification-icon-badge">4</span>
                      </a>
                      <!-- End::header-link|dropdown-toggle -->
                   </div>
                   <!-- End::header-element -->
                   <!-- Start::header-element -->
                   <div class="header-element header-fullscreen">
                      <!-- Start::header-link -->
                      <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                         <svg xmlns="http://www.w3.org/2000/svg"
                            class="header-link-icon full-screen-open" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                               d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z" />
                         </svg>
                         <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                            class="header-link-icon full-screen-close d-none" viewBox="0 0 24 24"
                            width="24px" fill="none">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path
                               d="M5 16h3v3h2v-5H5v2zm3-8H5v2h5V5H8v3zm6 11h2v-3h3v-2h-5v5zm2-11V5h-2v5h5V8h-3z" />
                         </svg>
                      </a>
                      <!-- End::header-link -->
                   </div>
                   <!-- End::header-element -->
                   <!-- Start::header-element|main-profile-user -->
                   <div class="header-element main-profile-user">
                      <!-- Start::header-link|dropdown-toggle -->
                      <a href="javascript:void(0);" class="header-link dropdown-toggle d-flex align-items-center"
                         id="mainHeaderProfile" data-bs-toggle="dropdown" aria-expanded="false">
                         <span class="me-2">
                            <img src="{{asset('storage/'.Auth::user()->photo)}}" alt="img" width="30"
                            height="30" class="rounded-circle">
                         </span>
                         <div class="d-xl-block d-none lh-1">
                            <h6 class="fs-13 font-weight-semibold mb-0">{{ Auth::user()->name }} </h6>
                         </div>
                      </a>
                      <!-- End::header-link|dropdown-toggle -->
                      <ul class="dropdown-menu pt-0 overflow-hidden dropdown-menu-end mt-1"
                         aria-labelledby="mainHeaderProfile">
                         <li><a class="dropdown-item" href="{{route('profilee.edit')}}"><i
                            class="ti ti-user-circle fs-18 me-2 op-7"></i>Profile</a></li>
                         <li><a class="dropdown-item" href="{{route('home')}}">
                            <i class="ti ti-inbox fs-18 me-2 op-7"></i>Tableau de bord</a></li>
                         <hr class="dropdown-divider my-0">
                         </li>
                         <li>
                           <a>
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


                         <li>
                            <hr class="dropdown-divider my-0">
                         </li>
                      </ul>
                   </div>
                   <!-- End::header-element|main-profile-user -->
                </div>
             </div>
          </div>
          <!-- Start::header-element -->
          <div class="header-element">
             <!-- Start::header-link|switcher-icon -->
             <a href="javascript:void(0);" class="header-link switcher-icon" data-bs-toggle="offcanvas"
                data-bs-target="#switcher-canvas">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                   class="header-link-icon fa-spin">
                   <path d="M0 0h24v24H0V0z" fill="none" />
                   <path
                      d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" />
                </svg>
             </a>
             <!-- End::header-link|switcher-icon -->
          </div>
          <!-- End::header-element -->
       </div>
       <!-- End::header-content-right -->
    </div>
    <!-- End::main-header-container -->
 </header>
