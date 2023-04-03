<!DOCTYPE html>
<html lang="en" data-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-touch-fullscreen" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="default" />
        <title>Dashboard | Admin Portal</title>
        <link rel="icon" type="image/x-icon" href="{{asset('console/assets/img/favicon.png')}}" />
        <link rel="icon" href="{{asset('console/assets/img/favicon.png')}}" type="image/png" sizes="16x16" />
        <!--PAGE-->
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/js/jquery-scrollbar/jquery.scrollbar.css')}}" />
        <link rel="stylesheet" href="{{asset('console/assets/js/jquery-ui/jquery-ui.min.css')}}" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet" />
        <!--Material Icons-->
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/fonts/materialdesignicons/materialdesignicons.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/css/font-awesome.min.css')}}" />
        <!--Page Specific CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/js/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/js/DataTables/datatables.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/js/select2/css/select2.min.css')}}" />
        <!--Hci Admin CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/css/tbs.css')}}" />
        <!-- Additional library for page -->
    </head>
    <!--body with default sidebar pinned -->

    <body class="sidebar-pinned">
       
			  @include('employee.partial.sidebar')
        

        <main class="admin-main">
           
             @include('employee.partial.header')
             @foreach(['error','success'] as $msg)
                    @if(Session::has($msg))
                    <div class="alert alert-{{$msg}}" role="alert">
                    {{session::get($msg)}}
                    </div>
                    @endif
                @endforeach
             @yield('content')
            
        </main>
		 @include('employee.partial.footer')
    </body>
    @stack('scripts')
</html>
