@extends('layouts.app_theme.default')

@section('title', $article->title)

@section('styles')
<style>
   #page-wrapper {
      padding-top: 10px !important
   }
</style>
@if(App::getLocale() == 'ar')
<style>
   body {
      direction: rtl;
      text-align: right
   }
</style>
@endif
@endsection
@section('content')
            <!-- Jumbotron -->
               <div class="container" >
                  <!-- jumbo-heading -->
                  <div class="jumbo-heading" data-aos="fade-down">
                     <h1>{{__('site.blog')}}</h1>
                     <!-- Breadcrumbs -->
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('site.home')}}</a></li>
                           <li class="breadcrumb-item"><a href="{{route('articles')}}">{{__('site.blog')}}</a></li>
                           <li class="breadcrumb-item active" aria-current="page">
                              {{$article->title}}
                           </li>
                        </ol>
                     </nav>
                     <!-- /breadcrumb -->
                  </div>
                  <!-- /jumbo-heading -->
               <!-- /container -->
            </div>
            <!-- /jumbotron -->
            <!-- ==== Page Content ==== -->
            <div class="page">
               <div class="container">
                  <div class="row">
                     <!-- Post Content Column -->
                     <div class="col-lg-9 blog-card page-with-sidebar">
                        <h2 class="mt-3 mb-2">{{$article->title}}</h2>
                        <!-- Post info-->
                        <div class="post-info text-muted">
                           <i class="fas fa-calendar margin-icon"></i>
                           {{$article->created_at->diffForHumans()}}
                           &nbsp;&nbsp;  
                           <i class="fas fa-eye margin-icon"></i>{{$article->nb_views}} {{__('site.views')}}
                        </div>
                        <hr>
                        <!-- Preview Image -->
                        <img src="{{asset('storage/' . $article->image_path)}}" class="img-fluid" alt="">
                        <hr>
                        <!-- Post Content -->
                        {!! $article->body !!}
                        
                     </div>
  
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.container -->
            </div>
            <!-- /page -->
@endsection