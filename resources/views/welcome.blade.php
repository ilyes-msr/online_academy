@extends('layouts.app_theme.default')

@section('title', __('Welcome to E-Academy'))

@section('content')

  @include('partials.showcase')

  @include('partials.courses')

  @include('partials.blog')
        
@endsection