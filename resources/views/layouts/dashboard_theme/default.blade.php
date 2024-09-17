<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href=" {{asset('dashboard_assets/style.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Dashboard') }}</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- Styles -->
  @livewireStyles
  @yield('styles')
</head>
<body class="font-sans antialiased">
  <x-banner />

  <input type="checkbox" id="nav-toggle">
  @include('layouts.dashboard_theme.sidebar')
  <div class="main-content">
    @include('layouts.dashboard_theme.header')
    <main>
      @yield('content')
    </main>
  </div>
  <script>
    var list_items = document.querySelectorAll('.sidebar-menu ul li');

    for (var i = 0; i < list_items.length; i++) {
      list_items[i].addEventListener("click", toggle);
    }

    function toggle(e) {
      this.classList.toggle("selected");
      e.preventDefault();
    }
  </script>
  @yield('scripts')
</body>
</html>