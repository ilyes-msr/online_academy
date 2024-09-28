<div class="container block-padding" id="courses">
  <h3 class="text-center">Our Latest Courses</h3>
  <div class="carousel-3items owl-carousel owl-theme mt-5 col-md-12">
   @foreach($courses as $course)
     <div class="col-lg-12 team-style3 bg-secondary pattern2">
        <a href="{{route('course.show', $course)}}">
        <img src="{{asset('storage/' . $course->image_path)}}" class="img-fluid rounded" alt="" />
        </a>
        <div class="team-caption">
           <a href="{{route('course.show', $course)}}">
              <h4>{{$course->title}}</h4>
           </a>
           <h6>{{$course->course_materials()->count()}} materials</h6>
           <p>
            {{ Str::limit($course->description, 50)}}
           </p>
        </div>
        <div class="text-center col-md-12">
          <a href="{{route('course.show', $course)}}" class="btn btn-secondary ">
            @if(auth()->user()?->hasPurchased($course->id))
              <small>Access The Course</small> 
            @else
              <small>Check it out for ${{$course->price}}</small>
            @endif
         </a>
       </div>
     </div>
   @endforeach
  </div>
</div>