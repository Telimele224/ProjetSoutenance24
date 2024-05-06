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
            <div class="col-lg-10">
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
               <!-- You can start editing here. -->
               {{-- <!-- If comments are open, but there are no comments. -->
               <div id="respond" class="comment-respond">
                  <h3 id="reply-title" class="comment-reply-title">Laisser une réponse <small><a rel="nofollow" id="cancel-comment-reply-link" href="index.html#respond" style="display:none;">Cancel reply</a></small></h3>
                  <form action="https://garantiwebtasarim.com/wordpress/medidoc/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate>
                     <p class="comment-notes"><span id="email-notes">Votre adresse email ne sera pas publiée. *</span>
                        <span class="required-field-message">Les champs requis sont indiqués <span class="required">*</span>
                    </span>
                </p>
                     <p class="comment-form-comment"><label for="comment">Comment <span class="required">*</span></label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required></textarea></p>
                     <p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" maxlength="245" autocomplete="name" required /></p>
                     <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email" required /></p>
                     <p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url" type="url" value="" size="30" maxlength="200" autocomplete="url" /></p>
                     <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" /> <label for="wp-comment-cookies-consent">Enregistrez mon nom, mon adresse e-mail et mon site Web dans ce navigateur pour la prochaine fois que je commenterai..</label></p>
                     <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Poster un commentaire" /> <input type='hidden' name='comment_post_ID' value='1485' id='comment_post_ID' />
                        <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                     </p>
                  </form>
               </div>
               <!-- #respond --> --}}
            </div>

         </div>
      </div>
   </section>
</main>
@endsection
