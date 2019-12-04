<!DOCTYPE html>
<html lang="en">
<head>
  @yield('title')
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
<!-- //web-fonts --> 
</head> 
<body> 

<!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> Salatiga, Jawa Tengah
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> +62 8123899777
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> Mon-Fri 07.00 - 22.00<br>
                        <i class="fa fa-clock-o"></i> Sat-Sun 11.00 - 17.00
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Social Icons Start ==-->
                    <div class="col-lg-3 text-right">
                        <div class="header-social-icons">
                            <a href="#"><i class="fa fa-behance"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!--== Social Icons End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

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
              <a href="settingUser/{{$user->email}}" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-user"> {{$user->name}}</span>
              </a>
              <a href="#home" class="active scroll"><span class="glyphicon glyphicon-home"> Home</span></a>
              <a href="#request" class="scroll"><span class="glyphicon glyphicon-tasks"> Request</span></a> 
              <a href="#OnGoing" class="scroll"><span class="fa fa-motorcycle"> On_Going</span></a> 
              <a href="#history" class="scroll"><span class="glyphicon glyphicon-floppy-disk"> History_Booking</span></a>
              <a href="#spec" class="scroll"><span class="glyphicon glyphicon-list-alt"> Specifications</span></a> 
              <a href="#contact" class="scroll"><span class="glyphicon glyphicon-phone-alt"> Contact_Us</span></a> 
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




        @yield('container')
</body>
</html>