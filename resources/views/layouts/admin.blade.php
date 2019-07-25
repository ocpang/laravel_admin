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

        <title>{{ config('app.name') }}</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- IonIcons -->
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
        <!-- AdminLTE App -->
        <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('lte/dist/js/demo.js') }}"></script>
        <script src="{{ asset('lte/dist/js/pages/dashboard3.js') }}"></script>

    </body>
</html>
