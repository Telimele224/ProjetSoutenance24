@extends('layouts_front.main')
@section('contenu')
{{-- @foreach ($actualites as $actualite) --}}
<header class="page-header wow fadeInUp" data-wow-delay="0.5s" data-background="{{asset('storage/'.$actualite->avatar)}}" heigjt="200"  >
   <div class="container">
      <h2 style="color: rgb(127, 181, 227)">Actualité</h2>
      <div class="bosluk3"></div>
      <p><a href="{{route('welcome')}}" class="headerbreadcrumb" style="color: rgb(98, 178, 232)">Accueil</a> <i class="flaticon-right-chevron"></i>Actualité</p>
   </div>
   <!-- end container -->
</header>
{{-- @endforeach --}}
<main>
   <!--Recent Posts 1-->
   <section class="news-alani-sayfa">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 m-4">
               <p class="post-kutu--yazi">
                    <h3 class="h2-baslik-anasayfa-ozel-blog wow fade animated">{{$actualite->titre}}</h3><hr>
                    <div class="bosluk333"></div>
                    <p class="paragraf wow fade animated">
                        {{$actualite->contenu}}
                    </p>
               </p>
               <div class="h-yazi-ortalama h-yazi-margin-50">
                  <div class="bosluk3"></div>
               </div>

            </div>
            <div class="col-lg-4">

            </div>

         </div>
      </div>
   </section>
</main>
@endsection
