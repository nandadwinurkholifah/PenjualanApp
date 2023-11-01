<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    @yield('title') | Penjualan App
  </title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span class="fa-stack fa-md">
            <i class="fas fa-circle fa-stack-2x"></i>
            <i class="fa fa-user fa-stack-1x fa-inverse"></i>
          </span>
          @if(Auth::check())
          <span class="d-sm-inline d-none">{{Auth::user()->name}}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a class="dropdown-item border-radius-md" href="javascript:;">
            <div class="d-flex justify-content-center">
                <div class="my-auto text-center">
                    <img src="#" class="avatar avatar-lg me-3">
                    
                    <p class="text-center" style="margin-top: 10px;">
                        @if(Auth::check())
                        {{Auth::user()->name}}
                        <br>
                        <small>{{Auth::user()->level}}</small>
                        @endif
                    </p><br>
                </div>
            </div>
            <div class="col-12 text-center">
              <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button type="submit" class="btn bg-danger">
                      Log Out
                  </button>
              </form>
          </div>
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  @include('backend.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">@yield('title2')</a></li>
              <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
        
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2023 <a href="#">Lipproject</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
 $.widget.bridge('uibutton', $.ui.button)
</script> 
@stack('js')
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.js')}}"></script>

<script>
  //Datemask dd/mm/yyyy

  
      //Date picker
      $('#reservationdate').datetimepicker({
          autoclose: true,
          format: 'YYYY-MM-DD',
      });
  
      // //Date and time picker
      // $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
      // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      // //Datemask2 mm/dd/yyyy
      // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      // //Money Euro
      // $('[data-mask]').inputmask()
  </script>
</body>
</html>
