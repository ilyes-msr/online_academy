@extends('layouts.app_theme.default')

@section('title', $course->title)

@section('styles')
   @if(App::getLocale() == 'ar')
   <style>
      body {
         direction: rtl
      }
      h3, a, h6, h4, p, ul li, a {
         text-align: right !important
      }
   </style>
   @endif
@endsection
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
                     <h4 class="mt-5">{{__('site.about_the_course')}}</h4>
                     <p>
                      {{$course->description}}
                     </p>
                     <h4 class="mt-3">{{__('site.course_content')}}</h4>
                     @if(auth()->user()?->hasPurchased($course->id))
                        @foreach($course->course_materials as $material)
                        <p>
                           <a href="{{route('material', ['course_id' => $course->id, 'material_id' => $material->id])}}">
                              {{$material->title}}
                           </a>
                        </p>
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
                           <input class="custom-link {{App::getLocale() == 'ar' ? 'float-right' : 'float-left'}} mt-5" type="submit" value="{{__('site.buy_this_course_for')}}  ${{$course->price}} {{__('site.only')}}" style="cursor: pointer">
                        </form>
                     
                        <div class="d-inline-block" id="paypal-button-container"></div>

                     @endif
                  </div>
               </div>
            </div>
            <div style="display: none" id="success" class="col-md-8 text-center h3 p-4 bg-success text-light rounded">
               تمت عملية الشراء بنجاح
            </div>
         </div>

@endsection

@section('scripts')
   <!-- Replace "test" with your own sandbox Business account app client ID -->
   <script src="https://www.paypal.com/sdk/js?client-id=AQgxJhH0yQ7oytqc8UgPAL8NRfy-mgieyyz2xefs_n9jotFW7H0RlFJCZ8VLfcdENMXH5kPDQD4nVeSl&currency=USD"></script>

   <script>
   if(document.querySelector('#paypal-button-container'))
   {
      paypal.Buttons({
         // Sets up the transaction when a payment button is clicked
         createOrder: (data, actions) => {
            return fetch('/api/paypal/create-payment', {
                  method: 'POST', 
                  body: JSON.stringify({
                     'courseId' : "{{$course->id}}"
                  })
            }).then(function(res) {
                  return res.json();
            }).then(function(orderData) {
                  return orderData.id;
            })
         },

         onApprove: (data, actions) => {
         
            return fetch('/api/paypal/execute-payment', {
                  method: 'POST',
                  body: JSON.stringify({
                     orderId: data.orderID,
                     'courseId' : "{{$course->id}}",
                     'userId' : "{{auth()->id()}}"
                  })
            }).then(function(res) {
                  return res.json();
            }).then(function(orderData) {
                  $('#success').slideDown(200);
                  setTimeout(() => {
                     location.reload();                     
                  }, 2000);
            })
         }
      }).render('#paypal-button-container');
   }
   </script>
@endsection