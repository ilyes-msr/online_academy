<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Dashboard') }}</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  {{-- CKEDITOR IMPORTMAP --}}
  <script type="importmap">
    {
      "imports": {
        "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.1.1/ckeditor5.js",
        "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.1.1/"
      }
    }
  </script>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Styles -->
  @livewireStyles

  {{-- BOOTSTRAP --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  {{-- DATATABLE --}}
  <link href="https://cdn.datatables.net/v/bs5/dt-2.1.6/r-3.0.3/datatables.min.css" rel="stylesheet">

  @yield('styles')

  @if (App::getLocale() == 'ar')
    <link rel="stylesheet" href=" {{asset('dashboard_assets/style-rtl.css')}}">
  @else
    <link rel="stylesheet" href=" {{asset('dashboard_assets/style.css')}}">
  @endif
  
</head>
<body class="font-sans antialiased">

  <input type="checkbox" id="nav-toggle">
  @include('layouts.dashboard_theme.sidebar')
  <div class="main-content">
    @include('layouts.dashboard_theme.header')
    <main>
      @if(Session::has('success'))
      <div class="p-2 mb-1 bg-white text-success rounded text-center">
          {{ session('success') }}
      </div>  
      @endif
      @yield('content')
    </main>
  </div>


  {{-- JQUERY --}}
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  {{-- BOOTSTRAP --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  {{-- DATATABLE --}}
  <script src="https://cdn.datatables.net/v/bs5/dt-2.1.6/r-3.0.3/datatables.min.js"></script>
  @yield('scripts')
</body>
</html>