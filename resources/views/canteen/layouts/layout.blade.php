<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Rate my Canteen</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
        <!-- CSS-->
        <link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL :: asset('css/bounce.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        <!-- Scripts -->
        <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    </head>
    <body>

        <!-- NAV -->
        <nav class="navbar navbar-light fixed-top" >
            <div class="col-lg-1 col-xl-1 col-md-1 col-sm-1 col-4">
                <a class="home" href="#" onclick="shop_hide();">
                    <i class="fa fa-home icon" aria-hidden="true"></i>
                </a>
            </div>
            <div class="col-lg-8 col-xl-8 col-md-8 col-sm-8 col-6">
                <input class="form-control form-control-lg mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
            <div class="col-lg-3 col-xl-3 col-md-3 col-sm-2 col-2">
                <div class="login">
                    @if(!isset($user))
                    <i class="fa fa-sign-in icon" aria-hidden="true"></i> 
                    <a href="#" data-toggle="modal" data-target="#login-modal">
                        Login
                    </a>               
                    @endif
                    @if(isset($user))
                    <i class="fa fa-user icon" aria-hidden="true"></i> 
                    <a href="/signout">
                        {{ $user }} 
                    </a>               
                    @endif
                </div>
            </div>
        </nav>

        <!-- Header -->
        <div class="container-fluid header pad-bot">
        </div>
        @if (!isset($user))
        <!-- Login Modal -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>Login to Your Account</h1><br>
                  <form method="post" onsubmit="return false;">
                    <input type="text" name="user" placeholder="Username" maxlength="30">
                    <input type="password" name="pass" placeholder="Password">
                    <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                  </form>
                    
                  <div class="login-help">
                    <a href="#" data-toggle="modal" data-target="#register-modal" data-dismiss="modal">Register</a>
                  </div>
                </div>
            </div>
        </div>

        <!-- Register's Modal -->
        <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Register</h1><br>
              <form method="post" onsubmit="return false;">
                <input type="text" name="user" placeholder="Username" maxlength="30">
                <input type="password" name="pass" placeholder="Password">
                <input type="password" name="re-pass" placeholder="Retype Password">
                <input type="text" name="email" placeholder="E-mail" maxlength="60">
                <div class="g-recaptcha" data-sitekey="6Ld2zDYUAAAAAP2giUxo-4Iq28DSYZhmdwvCG6pL"></div>
                <input type="submit" name="register" class="login regismodal-submit" value="Register">
              </form>
            </div>
        </div>
        </div>

        <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Registered!</h1><br>
            </div>
        </div>
        </div>
        @endif

        <!-- Store's Content -->
        <div class="container-fluid store-content" style="display: none;">
            <div class="row">
                <div class="col-xl-2 col-lg-2 ">
                </div>
                <div class="col-xl-7 col-lg-6 col-md-12 " >
                    <div class="container-fluid store">
                        @yield('store')
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <div class="container-fluid rating"><!-- 
                        <h2>Rating</h2>
                        <h2><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></h2>
                        <h3>5.00</h3> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Comment -->
        <div class="container-fluid">
        <div class="row comment-content" style="display: none;">
            <div class="col-lg-3 "></div>
            <div class="col-lg-5 col-md-12">                
                @yield('comment')
                @yield('others')
            </div>
            <!-- <div class="col-lg-4"></div> -->
        </div>
    </div>

        <!-- Card's Content -->
        <div class="container card-content">
            <div class="row">
                    @yield('content')
            </div>
        </div>
        <!-- Script -->
        <script src="{{ URL :: asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ URL :: asset('js/popper.min.js') }}"></script>
        <script src="{{ URL :: asset('js/bootstrap.min.js') }}"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{ URL :: asset('js/moment.js') }}"></script>
        <script src="{{ URL :: asset('js/bootstrap3-typeahead.js') }}"></script>
        <script src="{{ URL :: asset('js/canteen/canteen.js') }}"></script>
        <script src="{{ URL :: asset('js/canteen/autocomplete.js') }}"></script>
        <script src="{{ URL :: asset('js/canteen/shop.js') }}"></script>
        <script src="{{ URL :: asset('js/canteen/u.js') }}"></script>
        
        @yield('footer')
    </body>
</html>
