@extends('layouts.app_theme.default')

@section('title', __('site.all_courses'))

@section('styles')
  <style>
    body {
      direction: rtl;
      text-align: right
    }
  
  </style>
@endsection
@section('content')
<div class="page">
  <div class="container">
     <div class="row">
        <!-- page with sidebar starts -->
        <div class="col-lg-9 page-with-sidebar">
           <div class="col-md-12">
              <h3>{{$title}}</h3>
              <!-- row -->
              <div class="row">
                @foreach($courses as $course)
                 <div class="col-md-6">
                  <div class="col-lg-12 team-style3 bg-secondary pattern2">
                    <a href="{{route('course.show', $course)}}">
                    <img src="{{asset('storage/' . $course->image_path)}}" class="img-fluid rounded" alt="" style="height: 200px; object-fit: cover"/>
                    </a>
                    <div class="team-caption">
                       <a href="{{route('course.show', $course)}}">
                          <h4>{{$course->title}}</h4>
                       </a>
                       <h6>{{$course->course_materials()->count()}} {{__('site.materials')}}</h6>
                       <p>
                        {{ Str::limit($course->description, 50)}}
                       </p>
                    </div>
                    <div class="text-center col-md-12">
                      <a href="{{route('course.show', $course)}}" class="btn btn-secondary ">
                     @if(auth()->user()?->hasPurchased($course->id))
                       <small>{{__('site.access_the_course')}}</small> 
                     @else
                       <small>{{__('site.check_it_out_for')}} ${{$course->price}}</small>
                     @endif
                     </a>
                   </div>
                 </div>
                 </div>
                @endforeach
              </div>
              <!-- /row -->
           </div>
           <!-- /col-md-12 -->
        </div>
        <!-- /col-lg-9 -->
        <!-- ==== Sidebar ==== -->
        @if($category_id != 0)
        <div id="sidebar" class="col-lg-3 h-50 sticky-top">
           <!--widget area-->
           <div class="widget-area notepad">
              <h5 class="sidebar-header">{{__('site.categories')}}</h5>
              <div class="list-group">
                <a href="{{route('courses')}}" class="list-group-item list-group-item-action {{ $category_id == -1 ? 'active' : ''}}">
                  {{__('site.all')}}
                  </a>
                @foreach($categories as $category)
                <a href="{{route('courses_by_category', $category->id)}}" class="list-group-item list-group-item-action {{$category->id == $category_id ? 'active' : ''}}">
                  {{$category->name}}
                  </a>
                @endforeach
              </div>
              <!-- /list-group -->
           </div>
           <!-- /widget-area -->
        </div>
        @endif
        <!-- /sidebar -->
     </div>
     <!-- /row-->
  </div>
  <!-- /container-->
</div>
@endsection