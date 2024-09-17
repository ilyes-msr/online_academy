@extends('layouts.dashboard_theme.default')

@section('content')
<a href="{{route('categories.index')}}" class="btn btn-secondary"> <i class="las la-arrow-left"></i> Back</a>

  <h3 class="my-3">Create New Category</h3>

  <form action="{{route('categories.store')}}" method="post">
    @csrf
    <div class="mb-3">
      <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Category Name" name="name" value="{{old('name')}}">
    </div>
    @error('name')
      <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Add</button>
  </form>

@endsection