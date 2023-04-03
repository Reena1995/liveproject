<!DOCTYPE html>
<html lang="en" data-theme="light">
    <head>
        <meta charset="UTF-8" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-touch-fullscreen" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="default" />
        <title>Login | Admin Portal</title>
        <link rel="icon" type="image/x-icon" href="{{asset('console/assets/img/favicon.png')}}" />
        <link rel="icon" href="{{asset('console/assets/img/favicon.png')}}" type="image/png" sizes="16x16" />
        <!--PAGE-->
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/js/jquery-scrollbar/jquery.scrollbar.css')}}" />
        <link rel="stylesheet" href="{{asset('console/assets/js/jquery-ui/jquery-ui.min.css')}}" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet" />
        <!--Material Icons-->
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/fonts/materialdesignicons/materialdesignicons.min.css')}}" />
        <!--Hci Admin CSS-->
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/css/tbs.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('console/assets/css/responsive.css')}}" />
        <!-- Additional library for page -->
    </head>
    <!--body with default sidebar pinned -->

    <body class="sidebar-pinned">
        <!--Body Content :: START-->

        <section class="sign__in__page">
            <div class="container-fluid pt-50 pb-50 main__section__wrapper">
                <div class="container inner__wrapper text-white">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-12 left__side_wrapper pt-50 pb-30 first_div pl-40">
                            <div class="form_inner_div">
                                <img class="login_logo" src="{{asset('console/assets/img/logo.png')}}" alt="Company Logo" />
                                <form  action="{{route('authnication')}}" method="post" enctype="multipart/form-data" class="pt-30 login_form" >
                                @csrf  
                                    <div class="form-group pt-10">
                                        <label for="Email">Enter Email address</label>
                                        <input type="email"  name="email"  class="form-control" id="InputEmail" placeholder="Enter Email Address" tabindex="1"/>
                                    </div>
                                    <div class="form-group pt-10">
                                        <label for="Email">Enter Password</label>
                                        <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Enter Password" tabindex="2"/>
                                    </div>
                                    <div class="form-group form-check pt-10 pb-20 text-right">
                                        <a href="" tabindex="4">Forgot password?</a>
                                    </div>
                                    <a href=""><button class="form-btn" type="submit" value="Sign In" name="login">Sign In</button></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 right__side_wrapper pt-100 second_div">
                            <div class="heading_text">
                                <div class="color-overlay"></div>
                                <img src="{{asset('console/assets/img/login-bg.png')}}" alt="Login Background" />
                                <div class="inner_content_text">
                                    <h4>Welcome to</h4>
                                    <h3>Technotery Accounting</h3>
                                    <p class="mt-5">Login to Access Dashboard</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Body Content :: END-->

        <script src="{{asset('console/assets/js/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('console/assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('console/assets/js/popper/popper.js')}}"></script>
        <script src="{{asset('console/assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('console/assets/js/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{asset('console/assets/js/tbs.js')}}"></script>
        <!--page specific scripts for demo-->
    </body>
</html>
