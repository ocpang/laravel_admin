<!DOCTYPE html>
<!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        
        <title>{{ config('app.name') }}</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- IonIcons -->
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/datatables/dataTables.bootstrap4.css') }}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/toastr/toastr.min.css') }}">
        <!-- JQuery Input Mask -->
        <link rel="stylesheet" href="{{ asset('plugins/inputmask/inputmask.css') }}">
        <!-- JQuery Confirm -->
        <link rel="stylesheet" href="{{ asset('plugins/confirm/css/jquery-confirm.css') }}">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            @include('admin/header')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('admin/sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        @yield('title')        
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            @include('admin/footer')

        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- DataTables -->
        <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('lte/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('lte/plugins/toastr/toastr.min.js') }}"></script>
        <!-- JQuery Input Mask -->
        <script src="{{ asset('plugins/inputmask/jquery.inputmask.js') }}"></script>
        <!-- JQuery Confirm -->
        <script src="{{ asset('plugins/confirm/js/jquery-confirm.js') }}"></script>
        <!-- Jquery Validate -->        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  
        <!-- AdminLTE App -->
        <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>

        <script type="text/javascript">
            $(function() {
                $(".number").inputmask("99999999999");

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "10000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                
                @if($message = Session::get('success'))
                    toastr.success("{{ $message }}");
                @endif
                @if($message = Session::get('info'))
                    toastr.info("{{ $message }}");
                @endif
                @if($message = Session::get('error'))
                    toastr.error("{{ $message }}");
                @endif
                @if($message = Session::get('warning'))
                    toastr.warning("{{ $message }}");
                @endif

            });
        </script>

        @yield('add-on')
        
    </body>
</html>
