 <!-- section -->
 <section id="blogprev-home" data-100-bottom="background-position: 0% 120%;"
 data-top-bottom="background-position: 0% 100%;">
 <div class="container">
    <!-- section heading -->  
    <div class="section-heading text-center">
       <h3>{{__('site.latest_blog_posts')}}</h3>
       <p class="subtitle">{{ __('site.our_updates') }}</p>
    </div>
    <!-- /section-heading -->
    <!-- blog carousel -->
    <div class="carousel-3items owl-carousel owl-theme mt-0">
      @foreach($articles as $article)
       <div class="blog-box">
          <!-- image -->
          <a href="{{route('article.show', $article->slug)}}">
             <div class="image"><img src="{{asset('storage/' . $article->image_path)}}" alt="" style="height: 200px; object-fit: cover"/></div>
          </a>
          <!-- blog-box-caption -->
          <div class="blog-box-caption">
             <!-- date -->
             <div class="date">
               @php
                  $day = $article->created_at->format('d');  // Day (e.g., 28)
                  $month = $article->created_at->format('F');  // Full month name (e.g., September)
               @endphp
               <span class="day">{{$day}}</span>
               <span class="month"><small>{{$month}}</small></span>
            </div>
             <a href="{{route('article.show', $article->slug)}}">
                <h6>{{$article->title}}</h6>
             </a>

             <p>{!! \Illuminate\Support\Str::limit($article->body, 50) !!}</p>

          </div>
          <!-- blog-box-footer -->
          <div class="blog-box-footer">
             <div class="comments"><i class="fas fa-eye"></i>{{$article->nb_views}}</div>
             <!-- Button -->	 
             <div class="text-center col-md-12">
                <a href="{{route('article.show', $article->slug)}}" class="btn btn-primary btn-sm">{{ __('site.read_more') }}</a>
             </div>
          </div>
          <!-- /blog-box-footer -->
       </div>
       @endforeach
    </div>
    <!-- /owl-carousel -->
 </div>
 <!-- /container -->
</section>
<!-- /section ends-->