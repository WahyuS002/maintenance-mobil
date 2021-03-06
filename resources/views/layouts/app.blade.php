@php
    $brands = App\Brand::all();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>BI Maintenance Mobil</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="{{ asset('flatkit/assets/images/logo.png') }}">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="{{ asset('flatkit/assets/images/logo.png') }}">

  @stack('style-before')
  @include('includes.style')
  @stack('style-after')
  @livewireStyles
</head>
<body class=" pace-done dark">
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

    @include('includes.sidebar')

  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">

    @include('includes.navigation')

    @include('includes.footer')

    @yield('content')

  </div>
  <!-- / -->

<!-- ############ LAYOUT END-->

  </div>

  @include('includes.script')

  @stack('script-before')
  @yield('js')
  @stack('script-after')
  @livewireScripts
</body>
</html>

