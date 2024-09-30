@extends('layouts.app_theme.default')

@section('title', __('Welcome to E-Academy'))

@section('styles')
@if(App::getLocale() == 'ar')
<style>
   h6 {
      direction: rtl
   }
</style>
@endif
@endsection
@section('content')

  @include('partials.showcase')

  @include('partials.courses')

  @include('partials.blog')
        
@endsection