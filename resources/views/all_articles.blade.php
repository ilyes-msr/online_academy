@extends('layouts.app_theme.default')

@section('title', __('Blog'))
@section('styles')
<style>
   #page-wrapper {
      padding-top: 10px !important
   }
</style>
@endsection
@section('content')
         <!-- Jumbotron -->
          <div class="container" >
             <!-- jumbo-heading -->
             <div class="jumbo-heading" data-aos="fade-down">
                <h1>Blog</h1>
                <!-- Breadcrumbs -->
                <nav aria-label="breadcrumb">
                   <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                   </ol>
                </nav>
                <!-- /breadcrumb -->
             </div>
             <!-- /jumbo-heading -->
          <!-- /container -->
       </div>
       <!-- /jumbotron -->
       <!-- ==== Page Content ==== -->
       <div id="blog-home" class="page">
          <div class="container">
             <div class="row">
                <!-- Blog Entries Column -->
                <div class="col-lg-9 page-with-sidebar-left order-lg-2">
                  @foreach($articles as $article)
                   <div class="card blog-card ">
                      <a href="blog-single.html">
                         <!-- image -->
                         <div class="blog-img">
                            <img class="card-img-top img-fluid" src="{{asset('storage/' . $article->image_path)}}" alt="">
                         </div>
                         <!-- /blog-img -->
                      </a>
                      <div class="card-body">
                         <a href="blog-single.html">
                            <h3 class="card-title">{{$article->title}}</h3>
                         </a>
                         <div class="post-info text-muted">
                            <i class="fas fa-calendar margin-icon"></i>{{$article->created_at->diffForHumans()}}
                            &nbsp;&nbsp;
                            <i class="fas fa-eye margin-icon"></i>{{$article->nb_views}} views
                         </div>
                         <!-- excerpt -->
                         <p class="card-text mt-3">
                          {!! \Illuminate\Support\Str::limit($article->body, 70) !!}
                         </p>
                         <a href="{{route('article.show', $article->slug)}}" class="btn btn-secondary">Read More &rarr;</a>
                      </div>
                      <!--card-footer -->
                   </div>
                  @endforeach
                   <div class="col-md-12 mt-5">
                      <!-- pagination -->
                      <nav aria-label="pagination">
                        {{ $articles->links() }}
                      </nav>
                      <!-- /nav -->
                   </div>
                   <!-- /col-md -->
                </div>
   
             </div>
             <!-- /.row -->
          </div>
          <!-- /.container -->
       </div>
       <!-- /page -->
@endsection