@extends('layouts.app_theme.default')

@section('title', $course->title)

@section('content')
          <div class="page container">
            <div class="row">
               @if(Session::has('success'))
               <div class="p-2 mb-1 bg-success text-white rounded text-center">
                   {{ session('success') }}
               </div>  
               @endif
               <div class="col-lg-9 page-with-sidebar">
                  <div class="col-lg-12">
                     <div class="row">
                      <div class="col-lg-12">
                        <h3 class="res-marginmb-1">{{$course->title}}</h3>
                        <a href="{{route('courses_by_category', $course->category_id)}}"><h6>{{$course->category->name}}</h6></a>
                     </div>
                        <div class="col-lg-12 text-center">
                           <img src="{{asset('storage/' . $course->image_path)}}" class="img-fluid rounded" alt="">
                        </div>
                     </div>
                     <h4 class="mt-5">About the course</h4>
                     <p>
                      {{$course->description}}
                     </p>
                     <h4 class="mt-3">Course Content</h4>
                     @if(auth()->user()?->hasPurchased($course->id))
                        @foreach($course->course_materials as $material)
                           <a href="{{route('material', ['course_id' => $course->id, 'material_id' => $material->id])}}">
                              {{$material->title}}
                           </a>
                           <br>
                        @endforeach
                     @else
                     <ul class="custom pl-0">
                        @foreach($course->course_materials as $material)
                        <li>{{$material->title}}</li>
                        @endforeach
                       </ul>
                     @endif

                     @if(auth()->user()?->hasPurchased($course->id))

                     @else
                     <form action="{{route('credit.checkout')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$course->id}}" name="course_id">
                        <input class="custom-link float-left mt-5" type="submit" value="Buy this course for  ${{$course->price}} only" style="cursor: pointer">
                     </form>
                     @endif
                  </div>
               </div>
            </div>
         </div>
@endsection