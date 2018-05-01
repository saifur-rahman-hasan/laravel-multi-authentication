<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Get you Go') }}</title>

    <!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/theme.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    
    <!-- Editional CSS -->
    @stack('styles')
    
    <!-- Header Scripts -->
    @stack('scripts-header')

</head>
<body @section('body-attrs') class="navbar-top" @show>
    <div id="app">
        
        @section('navbar-main')
            <!-- Main navbar -->
            @include('admin.layouts.components.navbar-main')
            <!-- /main navbar -->
        @show

        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                @section('sidebar-main')
                    <!-- Main Sidebar -->
                    @include('admin.layouts.components.sidebar-main')
                    <!-- /main sidebar -->
                @show

                <!-- Secoundary Sidebar -->
                @yield('sidebar-secoundary')
                <!-- End Secoundary Sidebar -->
                
                <!-- Main content -->
                <div class="content-wrapper">
                    
                    @section('flash-message')
                        @include('flash::message')
                    @show
                    
                    @yield('content')

                </div>
                <!-- End Main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

    </div>

    <!-- Modals -->
    @yield('modals')

    <!-- PHP Variables to Javascript Variables -->
    @include ('footer')

    <!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->
    
    <!-- Flash Message Overlay -->
    <script>
        $('#flash-overlay-modal').modal();
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
    <!-- End Flash Message Overlay -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery_ui/core.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/nicescroll.min.js') }}"></script>
    
    @stack('scripts-plugin')

	<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/layout_fixed_custom.js') }}"></script>
    
    @stack('scripts')
    <!-- /theme JS files -->
    
</body>
</html>
