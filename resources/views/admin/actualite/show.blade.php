@extends('layouts_front.main')
@section('contenu')
{{-- @foreach ($actualites as $actualite) --}}
<header class="page-header wow fadeInUp" data-wow-delay="0.5s" data-background="{{asset('storage/'.$actualite->avatar)}}" heigjt="200"  >
   <div class="container">
      <h2>{{$actualite->titre}}</h2>
      <div class="bosluk3"></div>
      <p><a href="{{route('welcome')}}" class="headerbreadcrumb">Accueil</a> <i class="flaticon-right-chevron"></i>{{$actualite->titre}}</p>
   </div>
   <!-- end container -->
</header>
{{-- @endforeach --}}
<main>
   <!--Recent Posts 1-->
   <section class="news-alani-sayfa">
      <div class="container">
         <div class="row">
            <div class="col-lg-8">
               <p class="post-kutu--yazi">
                    <h2 class="h2-baslik-anasayfa-ozel-blog wow fade animated">Amazing Methods for Toothache</h2>
                    <div class="bosluk333"></div>
                    <p class="paragraf wow fade animated">
                        {{$actualite->contenu}}
                    </p>
                    
               </p>
               <div class="h-yazi-ortalama h-yazi-margin-50">
                  <div class="bosluk3"></div>
               </div>
               <!-- You can start editing here. -->
               <!-- If comments are open, but there are no comments. -->
               <div id="respond" class="comment-respond">
                  <h3 id="reply-title" class="comment-reply-title">Laisser une réponse <small><a rel="nofollow" id="cancel-comment-reply-link" href="index.html#respond" style="display:none;">Cancel reply</a></small></h3>
                  <form action="https://garantiwebtasarim.com/wordpress/medidoc/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate>
                     <p class="comment-notes"><span id="email-notes">Votre adresse email ne sera pas publiée. *</span> <span class="required-field-message">Les champs requis sont indiqués <span class="required">*</span></span></p>
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
               <!-- #respond -->
            </div>
            <div class="col">
               <li id="search-5" class="widget widget_search">
                  <form method="get" id="searchform" class="form__grup" action="https://garantiwebtasarim.com/wordpress/medidoc">
                     <div>
                        <input class="text" type="text" value="" placeholder="Search …" name="s" id="s" />
                     </div>
                  </form>
               </li>
               <li id="recent-posts-7" class="widget widget_recent_entries">
                  <h2 class="widgettitle">Messages Recents</h2>
                  <ul>
                     <li>
                        <a href="../unknowns-in-implant-treatment/index.html">Unknowns in Implant Treatment</a>
                        <span class="post-date">5 June 2022</span>
                     </li>
                     <li>
                        <a href="index.html" aria-current="page">Amazing Methods for Toothache</a>
                        <span class="post-date">5 June 2022</span>
                     </li>
                     <li>
                        <a href="../its-now-easy-to-have-perfect-smiles/index.html">It&#8217;s Now Easy to Have Perfect Smiles</a>
                        <span class="post-date">5 June 2022</span>
                     </li>
                     <li>
                        <a href="../can-teeth-straighten-without-braces/index.html">Can teeth straighten without braces?</a>
                        <span class="post-date">5 June 2022</span>
                     </li>
                     <li>
                        <a href="../stress-threatens-oral-and-dental-health/index.html">Stress threatens oral and dental health!</a>
                        <span class="post-date">5 June 2022</span>
                     </li>
                  </ul>
               </li>
               <li id="tag_cloud-4" class="widget widget_tag_cloud">
                  <h2 class="widgettitle">Mots Clés</h2>
                  <div class="tagcloud"><a href="../tag/brain-surgery/index.html" class="tag-cloud-link tag-link-55 tag-link-position-1" style="font-size: 8pt;" aria-label="Brain Surgery (1 item)">Brain Surgery<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/cardiac-surgery/index.html" class="tag-cloud-link tag-link-58 tag-link-position-2" style="font-size: 8pt;" aria-label="Cardiac Surgery (1 item)">Cardiac Surgery<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/chest-diseases/index.html" class="tag-cloud-link tag-link-57 tag-link-position-3" style="font-size: 8pt;" aria-label="Chest Diseases (1 item)">Chest Diseases<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/dental/index.html" class="tag-cloud-link tag-link-46 tag-link-position-4" style="font-size: 8pt;" aria-label="Dental (1 item)">Dental<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/dental-surgeon/index.html" class="tag-cloud-link tag-link-48 tag-link-position-5" style="font-size: 8pt;" aria-label="Dental Surgeon (1 item)">Dental Surgeon<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/doctor/index.html" class="tag-cloud-link tag-link-52 tag-link-position-6" style="font-size: 8pt;" aria-label="Doctor (1 item)">Doctor<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/gastroenterology/index.html" class="tag-cloud-link tag-link-56 tag-link-position-7" style="font-size: 8pt;" aria-label="Gastroenterology (1 item)">Gastroenterology<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/implant/index.html" class="tag-cloud-link tag-link-49 tag-link-position-8" style="font-size: 8pt;" aria-label="Implant (1 item)">Implant<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/medicine/index.html" class="tag-cloud-link tag-link-51 tag-link-position-9" style="font-size: 8pt;" aria-label="Medicine (1 item)">Medicine<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/radiology/index.html" class="tag-cloud-link tag-link-54 tag-link-position-10" style="font-size: 8pt;" aria-label="Radiology (1 item)">Radiology<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/surgeon/index.html" class="tag-cloud-link tag-link-50 tag-link-position-11" style="font-size: 8pt;" aria-label="Surgeon (1 item)">Surgeon<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/tooth/index.html" class="tag-cloud-link tag-link-45 tag-link-position-12" style="font-size: 8pt;" aria-label="Tooth (1 item)">Tooth<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/tooth-dental/index.html" class="tag-cloud-link tag-link-47 tag-link-position-13" style="font-size: 8pt;" aria-label="Tooth Dental (1 item)">Tooth Dental<span class="tag-link-count"> (1)</span></a>
                     <a href="../tag/urology/index.html" class="tag-cloud-link tag-link-53 tag-link-position-14" style="font-size: 8pt;" aria-label="Urology (1 item)">Urology<span class="tag-link-count"> (1)</span></a>
                  </div>
               </li>
            </div>
         </div>
      </div>
   </section>
</main>
@endsection