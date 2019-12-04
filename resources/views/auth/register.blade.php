<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUP</title>


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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Font Icon -->
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
              <a href="{{url('/login')}}"><span class="glyphicon glyphicon-user"> Login</span></a>
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


  <div class="container">

 </div>


      <!-- //header -->
      <div class="banner-text">
        <div class="container">  
               @if (session('status'))
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   {{session('status')}}
   </div>
   @endif
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">User Register</h2>
                        <form method="POST" class="register-form" id="register-form" action="user-register">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/><span id='message'></span>
                            </div>
                            <div class="form-group">
                                <label for="no_identity"><i class="zmdi zmdi-accounts-list"></i></label>
                                <input type="text" name="no_identity" id="no_identity" placeholder="ID number (NIM/KTP)"/>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon"><i class="zmdi zmdi-smartphone-android "></i></label>
                                <input type="text" name="no_telepon" id="no_telepon" placeholder="Phone Number"/>
                            </div>
                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-gps-dot "></i></label>
                                <input type="text" name="address" id="address" placeholder="Address"/>
                            </div>


                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{URL::asset('FORM/image/img3.jpg')}}" alt="sing up image"></figure>
                        <a href="{{url('/login')}}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

       </div> 
      </div>
    </div>
  </div>
<script>
$('#password, #re_pass').on('keyup', function () {
  // if ($('#password').val() == $('#re_pass').val()) {
  if ($('#password').val() == $('#re_pass').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>

 <!-- JS -->
    <script src="{{URL::asset('FORM/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('FORM/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>