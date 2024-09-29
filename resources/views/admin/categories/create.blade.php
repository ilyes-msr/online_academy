@extends('layouts.dashboard_theme.default')

@section('content')

@include('admin.back_link', ['destination' => 'categories'])

  <h3 class="my-3">{{__('site.create_new_category')}}</h3>

  <form action="{{route('categories.store')}}" method="post">
    @csrf
    <div class="mb-3">
      <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('site.enter_category_name')}}" name="name" value="{{old('name')}}">
    </div>
    @error('name')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror
    <button type="submit" class="btn btn-primary">{{__('site.add')}}</button>
  </form>

@endsection