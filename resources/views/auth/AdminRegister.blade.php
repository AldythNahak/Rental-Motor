<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Admin</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Motorbike Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
          SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Custom Theme files -->
        <link href="template/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="template/css/style.css" type="text/css" rel="stylesheet" media="all"> 
        <link href="template/css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
        <link rel="stylesheet" href="template/css/lightbox.css">
        <!--//Custom Theme files-->
        <!-- js -->
        <script src="template/js/jquery-2.2.3.min.js"></script>  
        <!-- //js -->
        <!-- web-fonts -->
        <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Arsenal:400,400i,700,700i" rel="stylesheet"> 

    <!-- Font Icon -->
    <!-- <link rel="stylesheet" href="http://localhost:8080/TAS_PL_Rental/resource/views/Login/FORM/fonts/material-icon/css/material-design-iconic-font.min.css"> -->
    <link rel="stylesheet" href="{{URL::asset('FORM/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{URL::asset('FORM/css/style.css')}}">
</head>
<body>


<!-- banner -->
  <div id="home" class="banner">
    <div class="banner-agileinfo">
      <!-- header -->
      <div class="header">
        <div class="container"> 
          <div class="menu">
            <a href="" id="menuToggle"> <span class="navClosed"></span> </a>
            <nav>  
                <a href="{{URL('/')}}"><span class="glyphicon glyphicon-home"> Home</span></a>
              <a href="{{url('/loginAdmin')}}"><span class="glyphicon glyphicon-user"> Login Admin</span></a>
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
          <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{URL::asset('FORM/image/img1.jpg')}}" alt="sing up image"></figure>
                        <a href="{{url('/loginAdmin')}}" class="signup-image-link">I'm Admin of this web!?</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Admin Register</h2>
                        <form method="post" class="Login-form" id="login-form" action="admin-register">
                           @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your email"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your name"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="Adminreg" id="AdminReg" class="form-submit" value="Register as admin"/>
                            </div>
                           {{-- <button type="submit" class="btn btn-primary">Reg</button> --}}

                        </form>

                    </div>
                </div>
            </div>
        </section>

        </div> 
      </div>
    </div>
  </div>
        



    <!-- JS -->
    <script src="{{URL::asset('FORM/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('FORM/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>