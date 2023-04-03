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
        <!-- jquery ajax cdn -->
        <script src="{{asset('console/assets/js/jquery-ajax/jquery.min.js')}}"></script>
         <!-- boostrap-->
         <link rel="stylesheet" type="text/css" href="{{asset('console/assets/js/bootstrap/css/bootstrap.min.css')}}" />
          <!-- datatale-->
         <link href="https://cdn.datatables.net/v/dt/dt-1.13.3/datatables.min.css"/>
         <link href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css"/>
         <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"/>
         
        <script>
            var app_url = '{{ url('/') }}';
        </script>
    </head>
    <!--body with default sidebar pinned -->

    <body class="sidebar-pinned">
       
			  @include('admin.partial.sidebar')
        

        <main class="admin-main">
           
             @include('admin.partial.header')
             @foreach(['danger','success'] as $msg)
                    @if(Session::has($msg))
                    <div class="alert alert-{{$msg}}" role="alert">
                    {{session::get($msg)}}
                    </div>
                    @endif
                @endforeach
             @yield('content')
            
        </main>
		 @include('admin.partial.footer')
         @include('admin.modules.validation.validation')
        </body>
        @stack('scripts')
   
</html>
