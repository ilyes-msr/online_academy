@extends('layouts.dashboard_theme.default')

@section('content')
<a href="{{route('materials.index', $course_id)}}" class="btn btn-secondary"> <i class="las la-arrow-left"></i> Back</a>

  <h3 class="my-3">Create New Material</h3>

  <form action="{{route('materials.store', $course_id)}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="title">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Material Title" name="title" value="{{old('title')}}" id="title">
    </div>
    @error('title')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Material Description">{{old('description')}}</textarea>
    </div>
    @error('description')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <div class="mb-3">
      <label for="video_path">Video Link (from Youtube)</label>
      <input type="text" class="form-control @error('video_path') is-invalid @enderror" placeholder="Enter Material Video Link" name="video_path" value="{{old('video_path')}}" id="video_path">
    </div>
    @error('video_path')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Add</button>
  </form>

@endsection