<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
  <link rel="icon" href="{{asset('backend/assets/images/favicon-32x32.png')}}" type="image/png" />
  <!--plugins-->
  <link href="{{asset('backend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/assets/plugins/input-tags/css/tagsinput.css')}}" rel="stylesheet" />

  <link href="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
  <!-- loader-->
  <link href="{{asset('backend/assets/css/pace.min.css')}}" rel="stylesheet" />
  <script src="{{asset('backend/assets/js/pace.min.js')}}"></script>


  <!-- Bootstrap CSS -->
  <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/css/app.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/css/icons.css')}}" rel="stylesheet">
  <!-- Theme Style CSS -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/dark-theme.css')}}" />
  <link rel="stylesheet" href="{{asset('backend/assets/css/semi-dark.css')}}" />
  <link rel="stylesheet" href="{{asset('backend/assets/css/header-colors.css')}}" />
  <title>Rukada - Responsive Bootstrap 5 Admin Template</title>
</head>

<body>
  <div class="wrapper">

    @include('vendor.layouts.inc.header')
    @include('vendor.layouts.inc.sidebar')
    @include('vendor.layouts.inc.footer')
    @yield('vendor')
    @include('vendor.layouts.inc.switcher')

  </div>
  <script src="{{asset('backend/assets/js/vendor.js')}}"></script>

  <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/input-tags/js/tagsinput.js')}}"></script>

  <script src="{{asset('backend/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/jquery-knob/excanvas.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
  <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
  <!--plugins-->
  <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/vendor.js')}}"></script>

  <script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('#image-uploadify').imageuploadify();
		})
  </script>
  <!--app JS-->
  <script src="{{asset('backend/assets/js/app.js')}}"></script>
  <script>
    $(function() {
      $(".knob").knob();
    });
  </script>
  <script src="{{asset('backend/assets/js/index.js')}}"></script>
  <!--app JS-->
  <script src="{{asset('backend/assets/js/app.js')}}"></script>
  @stack('script')
</body>

</html>