<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ config('app.name') }} | Dashboard v.2</title>

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

  <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  @yield('css')
</head>

<body>
    <div id="wrapper">
      {{-- Sidebar --}}
      @include('admin.layouts.sidenav')

      <div id="page-wrapper" class="gray-bg">
        {{-- Navbar --}}
        @include('admin.layouts.nav')

        <div class="wrapper wrapper-content">
          @yield('content')    {{-- Main Content --}}
        </div>

      </div>
    </div>

    {{-- Footer --}}
    @include('admin.layouts.footer')

  <!-- Mainly scripts -->
  <script src="{{ asset('js/jquery-2.1.1.js')}}"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
  <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

  <!-- Flot -->
  <script src="{{ asset('js/plugins/flot/jquery.flot.js')}}"></script>
  <script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
  <script src="{{ asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
  <script src="{{ asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
  <script src="{{ asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
  <script src="{{ asset('js/plugins/flot/jquery.flot.symbol.js')}}"></script>
  <script src="{{ asset('js/plugins/flot/jquery.flot.time.js')}}"></script>

  <!-- Peity -->
  <script src="{{ asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
  <script src="{{ asset('js/demo/peity-demo.js')}}"></script>

  <!-- Custom and plugin javascript -->
  <script src="{{ asset('js/inspinia.js')}}"></script>
  <script src="{{ asset('js/plugins/pace/pace.min.js')}}"></script>

  <!-- jQuery UI -->
  <script src="{{ asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

  <!-- Jvectormap -->
  <script src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{ asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

  <!-- EayPIE -->
  <script src="{{ asset('js/plugins/easypiechart/jquery.easypiechart.js')}}"></script>

  <!-- Sparkline -->
  <script src="{{ asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

  <!-- Sparkline demo data  -->
  <script src="{{ asset('js/demo/sparkline-demo.js')}}"></script>

  {{-- Additional scripts. --}}
  @yield('scripts')
</body>
</html>
