@extends('layouts.dashboard_theme.default')

@section('content')
<a href="{{route('materials.index', $course_id)}}" class="btn btn-secondary"> <i class="las la-arrow-{{App::getLocale() == 'ar' ? 'right' : 'left'}}"></i> {{__('site.back')}}</a>

  <h3 class="my-3">{{__('site.edit_material')}}</h3>

  <form action="{{route('materials.update', ['course_id' => $course_id, 'material' => $material])}}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title">{{__('site.title')}}</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="{{__('site.enter_material_title')}}" name="title" value="{{$material->title}}" id="title">
    </div>
    @error('title')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="description" class="form-label">{{__('site.description')}}</label>
      <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="{{__('site.enter_material_description')}}">{{$material->description}}</textarea>
    </div>
    @error('description')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="video_path">Video Link (from Youtube)</label>
      <input type="text" class="form-control @error('video_path') is-invalid @enderror" placeholder="{{__('site.enter_material_video_link')}}" name="video_path" value="{{$material->video_path}}" id="video_path">
    </div>
    @error('video_path')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <button type="submit" class="btn btn-primary">{{__('site.submit')}}</button>
  </form>

@endsection