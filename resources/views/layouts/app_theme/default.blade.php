<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">

      <!-- page title -->
      <title>@yield('title', '') - H_Academy</title>

      <!-- Font files -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700%7CNunito:400,700,900" rel="stylesheet">
      <link href="{{asset('theme_assets/fonts/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('theme_assets/fonts/fontawesome/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css">
      <!-- Fav icons -->
      <link rel="{{asset('theme_assets/apple-touch-icon')}}" sizes="57x57" href="apple-icon-57x57.png">
      <link rel="{{asset('theme_assets/apple-touch-icon')}}" sizes="72x72" href="apple-icon-72x72.png">
      <link rel="{{asset('theme_assets/apple-touch-icon')}}" sizes="114x114" href="apple-icon-114x114.png">
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('theme_assets/favico.png')}}">

      <!-- Bootstrap core CSS -->
      <link href="{{asset('theme_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- style CSS -->


      @if (App::getLocale() == 'ar')
        <link href="{{asset('theme_assets/css/style_rtl.css')}}" rel="stylesheet">
      @else
        <link href="{{asset('theme_assets/css/style.css')}}" rel="stylesheet">
      @endif

      <!-- plugins CSS -->
      <link href="{{asset('theme_assets/css/plugins.css')}}" rel="stylesheet">
      <!-- Colors CSS -->
      <link href="{{asset('theme_assets/styles/maincolors.css')}}" rel="stylesheet">
      <!-- LayerSlider CSS -->
      <link rel="stylesheet" href="{{asset('theme_assets/vendor/layerslider/css/layerslider.css')}}">

      @yield('styles')
      <style>
        .active-language {
            background: #e6a411 !important;
          }
          #logout-btn {
            color: white;
            border: none;
            background: #035392;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
          }
          #logout-btn:hover {
            /* background: #1790ec; */
          }
          .custom-dropdown-link {
            transition: .3s all ease-in-out;
          }
          .custom-dropdown-link:hover {
            color: #dea510 !important;
            text-decoration: #dea510 underline;
          }
          footer {
            padding-top: 10px;
            padding-bottom: 20px
          }
      </style>
   </head>

   <body id="top">
      @include('layouts.app_theme.header')
      @include('layouts.app_theme.loader')

      <div id="page-wrapper">      
        @yield('content')
      </div>

        <svg version="1.1" id="footer-divider"  class="secondary" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 1440 126" xml:space="preserve" preserveAspectRatio="none slice">
         <path class="st0" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"/>
      </svg>
      @include('layouts.app_theme.footer')

      <!-- Bootstrap core & Jquery -->
      <script src="{{asset('theme_assets/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('theme_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
      <!-- Custom Js -->
      <script src="{{asset('theme_assets/js/custom.js')}}"></script>
      <script src="{{asset('theme_assets/js/plugins.js')}}"></script>
      <!-- Prefix free -->
      <script src="{{asset('theme_assets/js/prefixfree.min.js')}}"></script>
  	  <!-- number counter script -->
      <script src="{{asset('theme_assets/js/counter.js')}}"></script>
      <!-- maps -->
      <script src="{{asset('theme_assets/js/map.js')}}"></script>
      <!-- GreenSock -->
      <script src="{{asset('theme_assets/vendor/layerslider/js/greensock.js')}}"></script>
      <!-- LayerSlider script files -->
      <script src="{{asset('theme_assets/vendor/layerslider/js/layerslider.transitions.js')}}"></script>
      <script src="{{asset('theme_assets/vendor/layerslider/js/layerslider.kreaturamedia.jquery.js')}}"></script>
      <script src="{{asset('theme_assets/vendor/layerslider/js/layerslider.load.js')}}"></script>

      @yield('scripts')

   </body>
</html>