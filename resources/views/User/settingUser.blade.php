<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Motorbike Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
          SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Custom Theme files -->
        <link href="{{URL::asset('template/css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
        <link href="{{URL::asset('template/css/style.css')}}" type="text/css" rel="stylesheet" media="all"> 
        <link href="{{URL::asset('template/css/font-awesome.css')}}" rel="stylesheet"> <!-- font-awesome icons -->
        <link rel="stylesheet" href="{{URL::asset('template/css/lightbox.css')}}">
        <!--//Custom Theme files-->
        <!-- js -->
        <script src="{{URL::asset('template/js/jquery-2.2.3.min.js')}}"></script>  
        <!-- //js -->
        <!-- web-fonts -->
        <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Arsenal:400,400i,700,700i" rel="stylesheet"> 


    <!-- Font Icon -->
    <link rel="stylesheet" href="{{URL::asset('FORM/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::asset('FORM/css/style.css')}}">
</head>
<body>
@foreach($user as $user)
<!-- banner -->
  <div id="home" class="banner">
    <div class="banner-agileinfo">
      <!-- header -->
      <div class="header">
        <div class="container">   
          <div class="logo">
          </div> 
          <div class="menu">
            <a href="" id="menuToggle"> <span class="navClosed"></span> </a>
            <nav>
              {{-- <a href="../HOME/{{$user->email}}"><span class="glyphicon glyphicon-home"> Home</span></a> --}}
              {{-- <a href="../"><span class="glyphicon glyphicon-home"> Home</span></a> --}}
              <br><br><br>
              <a href="{{url('/logouts')}}" onclick="return confirm('Are you Sure to Log Out?')"><span class="glyphicon glyphicon-log-out"> LogOut</span></a>
            </nav>
            <script>
            (function($){
              // Menu Functions
              $(document).ready(function(){
              $('#menuToggle').click(function(e){
                var $parent = $(this).parent('.menu');
                $parent.toggleClass("open");
                var navState = $parent.hasClass('open') ? "hide" : "show";
                $(this).attr("title", navState + " navigation");
                  // Set the timeout to the animation length in the CSS.
                  setTimeout(function(){
                    console.log("timeout set");
                    $('#menuToggle > span').toggleClass("navClosed").toggleClass("navOpen");
                  }, 200);
                e.preventDefault();
              });
              });
            })(jQuery);
            </script>
     
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>

      <!-- //header -->
      <div class="banner-text">
        <div class="container">  
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">User Data</h2>
                        <form method="POST" class="register-form" id="register-form" action="#">
                            @csrf
                            
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="{{$user->email}}"/>
                            </div>
                            <div class="form-group">
                                <label for="no_identity"><i class="zmdi zmdi-accounts-list"></i></label>
                                <input type="text" name="no_identity" id="no_identity" value="{{$user->no_identity}}"/>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon"><i class="zmdi zmdi-smartphone-android "></i></label>
                                <input type="text" name="no_telepon" id="no_telepon" value="{{$user->no_telepon}}"/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-gps-dot "></i></label>
                                <input type="text" name="address" id="address" value="{{$user->address}}"/>
                            </div>
                {{--             <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div> --}}
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{URL::asset('FORM/image/5.jpeg')}}" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
        @endforeach

       </div> 
      </div>
    </div>
  </div>




 <!-- JS -->
    <script src="{{URL::asset('FORM/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('FORM/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>