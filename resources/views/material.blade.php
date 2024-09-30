@extends('layouts.app_theme.default')

@section('title', $material->title)

@section('styles')
@if(App::getLocale() == 'ar')
<style>
   body {
      direction: rtl
   }
   h3, a, h6, h4, p, ul li, a, .card-body {
      text-align: right !important
   }
</style>
@endif
@endsection
@section('content')
          <div class="page container">
            <div class="row">
               <div class="col-lg-9 page-with-sidebar">
                  <div class="col-lg-12">
                     <div class="row">
                      <div class="col-lg-12">
                        <h3 class="res-marginmb-1">{{$material->title}}</h3>
                        <a href="{{route('course.show', $material->course_id)}}">
                           <h6 class="text-primary">{{$material->course->title}}</h6>
                        </a>
                     </div>
                        <div class="col-lg-12 text-center">
                           {!! youtube_embed($material->video_path, 4/3) !!}
                        </div>
                     </div>
                     <h4 class="mt-5">
                        {{__('site.explanation')}}
                     </h4>
                     <p>
                      {{$material->description}}
                     </p>
                  </div>

                  <h4>
                     {{__('site.add_a_comment')}}
                  </h4>
                  <form action="{{route('comment.add')}}" method="POST">
                     @csrf
                     <input type="hidden" name="material_id" value="{{$material->id}}">
                     <textarea name="body" id="" class="form-control  @error('body') is-invalid @enderror" placeholder="{{__('site.enter_your_comment_here')}}"></textarea>
                     @error('body')
                        <span class="invalid-feedback">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                     <input type="submit" class="btn btn-secondary btn-sm mb-2" value="{{__('site.add')}}">
                  </form>   

                  <h4 class="mt-5">
                     {{__('site.comments')}}

                     {{ '(' . $comments->count() . ')' }}
                  </h4>

                  @include('partials.comments', ['comments' => $comments, 'material_id' => $material->id])
 
               </div>
            </div>
         </div>
@endsection