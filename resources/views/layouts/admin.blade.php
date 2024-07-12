
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  @yield('css')
  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        @include('admins.blocks.logo')
      </div>
      <div class="sidebar-wrapper">
     
        @yield('sidebar')
      </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
      <!-- Navbar -->
      @include('admins.blocks.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            @yield('content')
            
          </div>
        </div>
      </div>
      <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
        @include('admins.blocks.footer')
      
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  @yield('script')
  
</body>

</html>
