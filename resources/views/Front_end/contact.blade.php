@extends('layouts_front.main')
@section('contenu')
<header class="page-header wow fadeInUp" data-wow-delay="0.5s" data-background="{{asset('assets/wp-content/uploads/2022/06/contact.jpg')}}">
   <div class="container">
      <h2>Contact</h2>
      <div class="bosluk3"></div>
      <p><a href="{{route('welcome')}}" class="headerbreadcrumb">Accueil</a> <i class="flaticon-right-chevron"></i>Contact</p>
   </div>
   <!-- end container -->
</header>
<main>
   <!--İletişim İcon Alanı-->
   <section class="iletisim-icon-alani">
      <div class="tablo">
         <div class="tablo--1-ve-3 wow fadeInLeft" data-wow-delay="0.5s">
            <div class="ozellik-kutu-iletisim" onclick="location.href='#';" style="cursor:pointer;" data-tilt>
               <div class="iconsv"><i class="flaticon-call"></i></div>
               <h3 class="baslik-4 h-yazi-margin-kucuk-2">Service client</h3>
               <p class="ozellik-kutu-iletisim--yazi">
                  +224 (628) 01 89 10
               </p>
            </div>
         </div>
         <div class="tablo--1-ve-3 wow fadeInLeft" data-wow-delay="0.5s">
            <div class="ozellik-kutu-iletisim" onclick="location.href='#';" style="cursor:pointer;" data-tilt>
               <div class="iconsv"><i class="flaticon-email"></i></div>
               <h3 class="baslik-4 h-yazi-margin-kucuk-2">Addresse Email</h3>
               <p class="ozellik-kutu-iletisim--yazi">
                  hopitalregionallabel@gmail.com
               </p>
            </div>
         </div>
         <div class="tablo--1-ve-3 wow fadeInRight" data-wow-delay="0.5s">
            <div class="ozellik-kutu-iletisim" onclick="location.href='#';" style="cursor:pointer;" data-tilt>
               <div class="iconsv"><i class="flaticon-location"></i></div>
               <h3 class="baslik-4 h-yazi-margin-kucuk-2">Adresse</h3>
               <p class="ozellik-kutu-iletisim--yazi">
                  Labé / Kouroula (Guinea)
               </p>
            </div>
         </div>
      </div>
   </section>
<!--İletişim Form Alanı-->
<section class="text-gray-600 body-font relative">
    <div class="container">
        <div class="row">
            @if (session()->has('success'))
                <div class="relative flex flex-col sm:flex-row sm:items-center bg-gray-200 dark:bg-green-700 shadow rounded-md py-5 pl-6 pr-8 sm:pr-6 mb-3 mt-3">
                    <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                        <div class="text-green-500" dark:text-gray-500>
                            <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="text-sm font-medium ml-3">Validé!.</div>
                    </div>
                    <div class="text-sm tracking-wide text-gray-500 dark:text-white mt-4 sm:mt-0 sm:ml-4"> {{ session('success') }}</div>
                    <div class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </div>
                </div>
            @endif
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div >
                                <span class="fadeInLeft"><input type="text" name="name" value="" size="40" class=" form-popup__input"  placeholder="Nom Complet" /></span><br />
                                <label for="name" class="form__label"></label>
                            </div>
                            @error('name')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <div >
                                <span class="fadeInLeft"><input type="email" name="email" value="" size="40" class=" form-popup__input"  placeholder="exemple@gmail.com" /></span><br />
                                <label for="email" class="form__label"></label>
                            </div>
                            @error('email')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <div >
                                <span class="fadeInLeft"><input type="text" name="telephone" value="" size="40" class=" form-popup__input"  placeholder="620000000" /></span><br />
                                <label for="telephone" class="form__label"></label>
                            </div>
                            @error('telephone')
                            <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <div class="fadeInUp">
                                <span><textarea id="message" name="message" cols="40" rows="10" class="form__input"  placeholder="Votre message"></textarea></span><br />
                                <label for="message" class="form__label"></label>
                            </div>
                            @error('message')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class=" fadeInUp">
                        <input type="submit" value="Soumettre →" class="custom-button12 mb-4" />
                    </div>
                </div>
            </form>

        </div>
    </div>
  </section>
<p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15648.88929386067!2d-12.303630362781126!3d11.318454169067403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xefc3b1b8dce00db%3A0x60a42a7902a749c4!2sHopital%20R%C3%A9gional%20de%20Lab%C3%A9!5e0!3m2!1sfr!2s!4v1716641184965!5m2!1sfr!2s" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</p>
@endsection
