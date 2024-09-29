@extends('layouts.dashboard_theme.default')

@section('content')
<div class="cards">
  <div class="card-single">
    <div>
      <h1>{{$students_count}}</h1>
      <span>Students</span>
    </div>
    <div>
      <span class="las la-user-graduate"></span>
    </div>
  </div>
  <div class="card-single">
    <div>
      <h1>{{$courses_count}}</h1>
      <span>Courses</span>
    </div>
    <div>
      <span class="las la-school"></span>
    </div>
  </div>
  <div class="card-single">
    <div>
      <h1>{{$categories_count}}</h1>
      <span>Categories</span>
    </div>
    <div>
      <span class="las la-braille"></span>
    </div>
  </div>
  <div class="card-single">
    <div>
      <h1>{{$articles_count}}</h1>
      <span>Articles</span>
    </div>
    <div>
      <span class="las la-pen-square"></span>
    </div>
  </div>
</div>
@endsection