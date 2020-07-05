@php
    $brands = App\Brand::all();
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Maintenance Mobil BI</title>
    
    @include('includes.style')

  </head>
  <body>
    <div class="container-scroller">
      
    @include('includes.navigation')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('includes.sidebar', ['brands' => $brands])        
        <!-- partial -->
        <div class="main-panel">
          
            @yield('content')

        @include('includes.footer')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('includes.script')
  </body>
</html>