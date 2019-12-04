@extends('layout/templateUser')
@section('tittle', 'Home')

@section('container')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<style>
.rainbow{
  background-image: -webkit-gradient( linear, left top, right top, color-stop(0, pink), color-stop(0.15, purple));
  background-image: gradient( linear, left top, right top, color-stop(0, violet), color-stop(0.15, pink));
  color:transparent;
  -webkit-background-clip: text;
  background-clip: text;
  }

  /*-- banner-text --*/
.banner-text {
    padding:4em 0 19em;
}
.banner-text h2 {
    font-size: 3.5em;
    line-height: 1.5em;
    color:#fff;
}
.banner-text h2 span {
    display: block;
    font-weight: 900;
    font-style: italic;
    letter-spacing: 3px;
}

</style>
 <!-- //banner -->
      <!-- //header -->
      <div class="banner-text">
        <div class="container">
        @foreach($user as $user)

          <h2>Welcome back<span class="rainbow">    {{$user->name}}</span></h2><br>
            <div class="container">
          <form method="post" action="{{URL('LOGIN/bookings')}}">
          @csrf
          <div class="form-group">
          <input type="hidden" class="form-control" id="nama_user" value="{{$user->name}}" name="nama_user">
          </div>
          <div class="form-group">
          <input type="hidden" class="form-control" id="no_identity" value="{{$user->no_identity}}" name="no_identity">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="no_telepon" value="{{$user->no_telepon}}" name="no_telepon">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="email" value="{{$user->email}}" name="email">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="user_id" value="{{$user->id}}" name="user_id">
        </div>
        <div class="form-group">
          <input type="hidden" class="form-control" id="waktu_booking" value="
            <?php   $D = exec('date /T');
            $T = exec('time /T');
            $DT = strtotime(str_replace("/","-",$D." ".$T));
            echo(date("Y-m-d H:i:s",$DT)); ?>
          " name="waktu_booking">
        </div>
          <div class="col-xs-3">
          <div class="form-group">
          <label for="waktu_sewa" style="color: pink"><h4>Pick up booking time</h4></label>
          <input type="datetime-local" class="form-control" id="waktu_sewa" id="waktu_sewa"
            name="waktu_sewa">
          </div>

          <button type="submit" class="btn btn-dark pull-right" style="background-color: #EA7686"  onclick="return confirm('Apakah anda mau booking?')">Book Now</button>
          </div>
          </form> 
        </div>  


        </div> 
        <br><br><br>
          
         <div align="middle"> 
          <div class="col-sm-2 col-xs-4 services-w3grid">
            <a href="#harga" class="scroll">
            <span class="glyphicon glyphicon-eye-open hi-icon" style ="color: #581661" aria-hidden="true"></span></a>
          <h5>Price</h5>
          <li>Click The Icon to Check the cost</li>
        </div>

          <div class="col-sm-2 col-xs-4 services-w3grid">
            <a href="#history" class="scroll">
            <span class="glyphicon glyphicon-time hi-icon" style ="color: #cf5c04" aria-hidden="true"><br>
               <?php 
          $U_history = DB::select(DB::raw("SELECT * FROM history WHERE no_identity = '$user->no_identity'"));
            $row = count($U_history);
            echo $row;
            ?>
            </span></a>
          <h5>Total Booking</h5>
          <li>Count how many time you had rent our Motor</li>
          </div>
          
          <div class="col-sm-2 col-xs-4 services-w3grid">
            <a href="#OnGoing" class="scroll">
            <span class="glyphicon glyphicon-tasks hi-icon" style ="color: #09aab0" aria-hidden="true"><br>
              <?php 
          $U_booking = DB::select(DB::raw("SELECT * FROM booking WHERE no_identity = '$user->no_identity'"));
            $row = count($U_booking);
            echo $row;
            ?>
            </span></a>
          <h5>On Going</h5>
          <li>Motorbike rented by you</li>
          </div>

          <div class="col-sm-2 col-xs-4 services-w3grid">
            <a href="#request" class="scroll">
            <span class="glyphicon glyphicon-share hi-icon" style ="color:#297342" aria-hidden="true"><br>
              <?php 
            $U_notif = DB::select(DB::raw("SELECT * FROM notification WHERE no_identity = '$user->no_identity'"));
            $row = count($U_notif);
            echo $row;
            ?>
            </span></a>
          <h5>Request</h5>
          <li>Booking that still not confirm yet</li>
          </div>

          <div class="col-sm-2 col-xs-4 services-w3grid">
            <a href="#spec" class="scroll">
            <span class="fa fa-motorcycle hi-icon" style ="color:#a1026c" aria-hidden="true"><br>
              <?php 
            $result = DB::select(DB::raw('SELECT * FROM motor where id NOT IN (select motor_id from booking)'));
            $row = count($result);
              echo $row; 
          ?>
            </span></a>
          <h5>Motor Available</h5>
          <li>
              <?php 
              if ($row >0){
                echo "Available Motor : ".$row;
              }else{
                echo "Maaf Motor Tidak Tersedia untuk saat ini. <br>";
              }
            
            ?>  </li>
          </div>

          <div class="col-sm-2 col-xs-4 services-w3grid">
            <a href="settingUser/{{$user->email}}">
            <span class="glyphicon glyphicon-cog hi-icon" style ="color: #050447" aria-hidden="true"></span></a>
          <h5>Setting</h5>
          <li>Your Account Setting</li>
          </div>


      </div>

      </div>
    </div>
  </div>

  <!-- slid -->
  <div class="slid jarallax" id="harga">
    <div class="slid-text">
      <h4>Daftar Harga Sewa:</h4>
        <p>1-2 jam = Rp 10.000</p>
        <p>2-3 jam = Rp 15.000</p>
        <p>3-6 jam = Rp 20.000</p>
        <p>6-12 jam = Rp 25.000</p>
        <p>12-24 jam = Rp 40.000</p>
    </div>
    <div class="clearfix"> </div>
  </div>
  <!-- //slid -->


<!-- //services specifications -->
  <div id="OnGoing" class="spec jarallax">
    <div class="container"> 
      <h3 class="agileits-title w3title2"><span>On</span>Going</h3>
      <div class="specw3-agileits">
        
        {{-- table --}}
       <?php 
          $U_booking = DB::select(DB::raw("SELECT * FROM booking WHERE no_identity = '$user->no_identity'"));
            $row = count($U_booking);
            echo "<h5>"."Total result:".$row."</h5>";
            compact('U_booking');
             ?>  
          
          <div class="table100 ver4 m-b-110">
          <table data-vertable="ver4" id="myTable">
          <thead>
          <tr class="row100 head">
          <th class="column100 column2" data-column="column2">ID Booking</th>
          <th class="column100 column3" data-column="column3">Motor(no_motor/plat_motor/warna)</th>
          <th class="column100 column4" data-column="column4">Waktu Sewa</th>
          <th class="column100 column5" data-column="column5">Status</th>
          </tr>
          </thead>
          <?php
            foreach ($U_booking as $U_booking) {
              if($row>0){
              $motor = DB::select("SELECT * FROM motor where id = '$U_booking->motor_id'");
              compact('motor');
              foreach ($motor as $mtr) {
          ?>
          <tbody>
          <tr class="row100">
          <td class="column100 column2" data-column="column2"><?php echo $U_booking->id;?></td>
          <td class="column100 column3" data-column="column3">
            <?php
            echo $mtr->id ." / ".$mtr->plat_motor." / ".$mtr->warna_motor;
            ?>  
            </td>
          <td class="column100 column4" data-column="column4"><?php echo $U_booking->waktu_sewa;?></td>
          <td class="column100 column5" data-column="column5"><a href="#OnGoing" class="scroll">ON</a></td>
          </tr>
           <?php
              }
            }
          } 
          ?> 
          </tbody>
          </table>
          </div>

        <div class="clearfix"> </div>
      </div>
    </div>
  </div>      
  <!-- //specifications -->


  <!-- services -->
  <div id="request" class="services">
    <div class="container"> 
      <h3 class="agileits-title w3title2"><span>R</span>equest</h3>
      {{-- <div class="services-row-agileinfo"> --}}

                {{-- table --}}
       <?php 
          $U_notif = DB::select(DB::raw("SELECT * FROM notification WHERE no_identity = '$user->no_identity'"));
            $row = count($U_notif);
            echo "<h5>"."Total result:".$row."</h5>";
            compact('U_notif');
             ?> 
          <div class="table100 ver5 m-b-110">
          <table data-vertable="ver5" id="myTable">
          <thead>
          <tr class="row100 head">
          <th class="column100 column2" data-column="column2">ID Request</th>
          <th class="column100 column3" data-column="column3">Waktu request</th>
          <th class="column100 column4" data-column="column4">Waktu Sewa</th>
          <th class="column100 column4" data-column="column4">Time</th>
          <th class="column100 column5" data-column="column5">Status</th>
          </tr>
          </thead>
          <?php
            foreach ($U_notif as $U_notif) {
              if($row>0){
          ?>
          <tbody>
          <tr class="row100">
          <td class="column100 column2" data-column="column2"><?php echo $U_notif->id;?></td>
          <td class="column100 column3" data-column="column3"><?php echo $U_notif->waktu_booking;?></td>
          <td class="column100 column4" data-column="column4"><?php echo $U_notif->waktu_sewa;?></td>
          <td class="column100 column4" data-column="column4"><?php 
            //$D = exec('date /T');
           // $T = exec('time /T');
            //$DT = strtotime(str_replace("/","-",$D." ".$T));
            //echo(date("Y-m-d H:i:s",$DT)); 
          //echo $waktu = $U_notif->waktu_sewa -$DT ;
          ?></td>
          <td class="column100 column5" data-column="column5"><a href="#request" class="scroll">Not Confirm yet</a>
            <a href="deleteReqUser/{{$U_notif->id}}/{{$U_notif->email}}"><button class="btn btn-danger" onclick="return confirm('Yakin mau diCancel?')"><span class="glyphicon glyphicon-remove"></span>Cancel</button></a>
          </td>
          </tr>
           <?php
            }
          } 
          ?> 
          </tbody>
          </table>
          </div>

  
        <div class="clearfix"> </div>
      {{-- </div>  --}}
     </div>
  </div>


  <!-- //services specifications -->
  <div id="spec" class="spec jarallax">
    <div class="container"> 
      <h3 class="agileits-title w3title2"><span>S</span>pecifications</h3>
      <div class="specw3-agileits">
        <div class="col-md-6 spec-grids"> 
          <ul>
            <li>
              <img src="{{URL::asset('FORM/image/img5.png')}}" alt=" " class="img-responsive" />
            </li>
          </ul>
        </div>  


        <div class="col-md-6 spec-grids"> 
          <h4>Honda Beat esp 2019</h4>
          <ul>
            <li>
              <div class="specf-left">
                <p>Engine type</p>
              </div>
              <div class="specf-right">
                <p>PGM-FI 110cc eSP</p>
              </div>
              <div class="clearfix"> </div>
            </li>
            <li>
              <div class="specf-left">
                <p>Brake</p>
              </div>
              <div class="specf-right">
                <p>Combi Brake (front: Cakram ,back: Tromol)</p>
              </div>
              <div class="clearfix"> </div>
            </li>
            <li>
              <div class="specf-left">
                <p>Fuel Capacity</p>
              </div>
              <div class="specf-right">
                <p>4.0 Liter (63 Km/L)</p>
              </div>
              <div class="clearfix"> </div>
            </li>
            <li>
              <div class="specf-left">
                <p>Color</p>
              </div>
              <div class="specf-right">
                <p>White & Black</p>
              </div>
              <div class="clearfix"> </div>
            </li>
            <li>
              <div class="specf-left">
                <p>Tyre type</p>
              </div>
              <div class="specf-right">
                <p>Tubeless</p>
              </div>
              <div class="clearfix"> </div>
            </li>
            <li>
              <div class="specf-left">
                <p>Transmission type</p>
              </div>
              <div class="specf-right">
                <p>Otomatis, V-Matic </p>
              </div>
              <div class="clearfix"> </div>
            </li>
          </ul>
        </div>  
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>      
  <!-- //specifications -->
 
  <!-- History -->
  <div id="history" class="news">   
    <div class="container"> 
      <h3 class="agileits-title w3title2"><span>H</span>istory </h3>
      <div class="news-agileinfo">
          <link rel="stylesheet" type="text/css" href="{{URL::asset('table/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

          <link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/animate/animate.css')}}">

          <link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/select2/select2.min.css')}}">

          <link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">

          <link rel="stylesheet" type="text/css" href="{{URL::asset('table/css/util.css')}}">
          <link rel="stylesheet" type="text/css" href="{{URL::asset('table/css/main.css')}}">

          {{-- table --}}
       <?php 
          $U_history = DB::select(DB::raw("SELECT * FROM history WHERE no_identity = '$user->no_identity'"));
            $row = count($U_history);
            echo "<h5>"."Total result:".$row."</h5>";
            compact('U_history');
             ?>  
          <div class="table100 ver1 m-b-110">
          <table data-vertable="ver1" id="myTable">
          <thead>
          <tr class="row100 head">
          <th class="column100 column2" data-column="column2">ID History</th>
          <th class="column100 column3" data-column="column3">Motor</th>
          <th class="column100 column4" data-column="column4">Waktu Sewa</th>
          <th class="column100 column5" data-column="column5">Waktu Kembali</th>
          <th class="column100 column6" data-column="column6">Harga</th>
          </tr>
          </thead>
          <?php

            foreach ($U_history as $U_history) {
              if($row>0){
                ?>
          <tbody>
          <tr class="row100">
          <td class="column100 column2" data-column="column2"><?php echo $U_history->id;?></td>
          <td class="column100 column3" data-column="column3"><?php echo $U_history->motor_id;?></td>
          <td class="column100 column4" data-column="column4"><?php echo $U_history->waktu_sewa;?></td>
          <td class="column100 column5" data-column="column5"><?php echo $U_history->waktu_sewa_return;?></td>
          <td class="column100 column6" data-column="column6"><?php echo $U_history->harga_sewa;?></td>
        
          </tr>
           <?php
              }
            } 
          ?> 
          </tbody>
          </table>
          </div>

             </div>
            </div>
              </div>
            </div>


          <script src="{{URL::asset('table/vendor/jquery/jquery-3.2.1.min.js')}}" type="a2352c53f184ffdcf5871cc8-text/javascript"></script>

          <script src="{{URL::asset('table/vendor/bootstrap/js/popper.js')}}" type="a2352c53f184ffdcf5871cc8-text/javascript"></script>


          <script src="{{URL::asset('table/vendor/select2/select2.min.js')}}" type="a2352c53f184ffdcf5871cc8-text/javascript"></script>

          <script src="{{URL::asset('table/js/main.js')}}" type="a2352c53f184ffdcf5871cc8-text/javascript"></script>

          <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="a2352c53f184ffdcf5871cc8-text/javascript"></script>
          <script type="a2352c53f184ffdcf5871cc8-text/javascript">
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-23581568-13');
            </script>

          <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/95c75768/cloudflare-static/rocket-loader.min.js" data-cf-settings="a2352c53f184ffdcf5871cc8-|49" defer=""></script>

<!-- Table -->


        <div class="clearfix"> </div>
      </div> 
    </div> 
  </div>
  <!-- //History --> 

  <!-- contact -->
  <center>
  <div class="contact" id="contact">
    <div class="container"> 
      <h3 class="agileits-title w3title2"><span>C</span>ontact Us</h3>
      <div class="contact-grids">
        {{-- <div class="col-md-5 address"> --}}
          <h4>Contact us</h4>
          <p class="cnt-p">id there is a Problem, or for more information </p>
          <div class="agile_social_icons">
            <ul class="agileits_social_list">
              <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
              <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
            </ul>
          </div>  
          <p>jl. Kemiri Barat</p>
          <p>Telephone : +62 81238996885</p>
          <p>Email : <a href="mailto:RentalMotorSalatiga@gmail.com">RentalMotorSalatiga@gmail.com</a></p>
        {{-- </div> --}}
       
        <div class="clearfix"> </div> 
      </div>
      <div class="w3-agilemap">  
        <iframe src="https://maps.google.com/maps?q=rental%20motor%20salatiga&t=k&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
      </div> 
  </div>
  </center>
  <!-- //contact --> 

  @endforeach

  <!-- jarallax -->  
  <script src="{{URL::asset('template/js/SmoothScroll.min.js')}}"></script> 
  <script src="{{URL::asset('template/js/jarallax.js')}}"></script> 
  <script type="text/javascript">
    /* init Jarallax */
    $('.jarallax').jarallax({
      speed: 0.5,
      imgWidth: 1366,
      imgHeight: 768
    })
  </script>  
  <!-- //jarallax -->   
  <!-- start-smooth-scrolling -->
  <script type="text/javascript" src="{{URL::asset('template/js/move-top.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('template/js/easing.js')}}"></script> 
  <script type="text/javascript">
      jQuery(document).ready(function($) {
        $(".scroll").click(function(event){   
          event.preventDefault();
      
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
      });
  </script>
  <!-- //end-smooth-scrolling --> 
  <!-- smooth-scrolling-of-move-up -->
  <script type="text/javascript">
    $(document).ready(function() {
      /*
      var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
      };
      */   
      $().UItoTop({ easingType: 'easeOutQuart' });
      
    });
  </script>
  <!-- //smooth-scrolling-of-move-up -->  
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{URL::asset('template/js/bootstrap.js')}}"></script>

@endsection