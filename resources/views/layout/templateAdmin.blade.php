<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @yield('title')
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
              <a data-toggle="modal" href="#motor_available">Motor : <?php 
            $result = DB::select(DB::raw('SELECT * FROM motor where id NOT IN (select motor_id from booking)'));
            $row = count($result);
              if ($row >0){
                echo $row;
              }else{
                echo "HABIS";
              }
            ?> </a><br>
                <a href="{{URL('/admin')}}" class="active scroll"><span class="glyphicon glyphicon-home"> Home</span></a>
              <a href="{{url('/notification')}}"><span class="glyphicon glyphicon-bell"> Notification</span><span class="badge "style="background-color: orange;"> 
                
             <?php 
                    $notif = DB::table('notification')->get();
                    $row = $notif->count();
                    echo $row;
          ?> 
            </span></a>
            <a href="{{url('/adminOnGoing')}}"><span class="glyphicon glyphicon-tasks"> OnGoing</span><span class="badge" style="background-color: pink;"> 
          <?php 
                    $b = DB::table('booking')->get();
                    $row = $b->count();
                    echo $row;
            ?>
          </span></a>
{{--     <li class="dropdown"> 
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Database
        <span class="caret"></span></a>
        <ul class="dropdown-menu" style="background-color: rgba(0, 0, 0, 0.0); "> --}}
          {{-- <li> --}}
            <a href="{{url('/adminDB')}}"><span class="glyphicon glyphicon-folder-open"> Data Motor</span></a>
          {{-- </li> --}}
          {{-- <li> --}}
            <a href="{{url('/historyDB')}}"><span class="glyphicon glyphicon-floppy-disk"> History Sewa</span></a>
          {{-- </li> --}}
          {{-- <li> --}}
            <a href="{{url('/userDB')}}"><span class="glyphicon glyphicon-list-alt"> Data User</span></a>
          {{-- </li> --}}
        {{-- </ul>
      </li>
      <br><br><br><br><br><br><br><br><br> --}}
      <br><br>
      <a href="{{url('/logout')}}" onclick="return confirm('Are you Sure to Log Out?')"><span class="glyphicon glyphicon-log-out"> LogOut</span></a>

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
            <div class="banner-text">
        <div class="container">
 @yield('container')

 <!-- Modal -->
<div class="modal fade" id="motor_available" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Available Motor = 
          <?php 
              $result = DB::select(DB::raw('SELECT * FROM motor where id NOT IN (select motor_id from booking)'));
       
            $row = count($result);
            if($row > 0){
              echo $row;
            }else{
              echo "Motor Habis";
            }

          ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
         $result = DB::select(DB::raw('SELECT * FROM motor where id NOT IN (select motor_id from booking)'));
        $row = count($result);
        compact('result');
        foreach ($result as $result) {
          if($row>0){
          echo "<ul class="."list-group>".
                "<li class="."list-group-item d-flex justify-content-between align-items-center>".
                $result->plat_motor ."   ".$result->warna_motor. "<span class="."badge badge-pill badge-warning".">" .
                $result->id . "</span>" . "  </li></ul> " ;
        }else{
          echo "Motor Habis";
        }}
    ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</body>
</html> 