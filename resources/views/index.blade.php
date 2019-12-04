@extends('layout/template')
@section('tittle', 'Home')

@section('container')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
 <!-- //banner -->
  <!-- welcome -->  
  <div id="about" class="welcome">
    <div class="container"> 
      <div class="welcome-agileinfo">
        <div class="col-md-6 w3ls_welcome_left"> 
          <div class="w3ls_welcome_right1">
            <h3 class="agileits-title"><span>A</span>bout Us</h3>
            <h6>Rental <span> Motor </span> Salatiga. </h6>
            <p>	Kami adalah rental motor pertama di Salatiga yang menggunakan sistem booking kendaraan secara online. Website ini merupakan website yang dirancang guna mempermudah proses booking sehingga para pengguna baik mahasiswa ataupun masyarakat lokal dapat menyewa kendaraan kami tanpa khawatir akan kehabisan motor.
        	</p>
          </div> 
        </div>
        <div class="col-md-6 w3ls_welcome_right">   
          <div class="agileits_w3layouts_welcome_grid">
            <img src="{{URL::asset('FORM/image/2.jpg')}}" alt=" " class="img-responsive" />
          </div> 
        </div> 
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <!-- //welcome -->  
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
  <!-- services -->
  <div id="booking" class="services">
    <div class="container"> 
      <h3 class="agileits-title w3title2"><span>B</span>ooking</h3>
      <div class="container">
   @if (session('status'))
   <div class="alert alert-success">
   	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   {{session('status')}}
   </div>
   @endif
 </div>
      <div class="services-row-agileinfo">

               <div class="col-sm-4 col-xs-6 services-w3grid">
          <a href="#harga" class="scroll">
            <span class="glyphicon glyphicon-eye-open hi-icon" aria-hidden="true"></span></a>
          <h5>Price</h5>
          <p>Click The Icon to Check the cost</p>
        </div>

        <div class="col-sm-4 col-xs-6 services-w3grid">
          <a href="{{url('/login')}}">
          <span class="glyphicon glyphicon-user hi-icon" aria-hidden="true"></span></a>
          <br><br>
          <p>Click icon to Login</p>
          {{-- <br> --}}
           <u><h5>Booking Form</h5></u> <br>
           <!-- <div class="contact2-form2"> -->
          <form method="POST" action="booking">
		      @csrf
          <div>
		      <p>
		      <div class="form-group">
		      <label for="nama_user">Nama</label>
		      <input type="text" class="form-control" id="nama_user" placeholder="Masukan Nama Lengkap" name="nama_user">
		      </div></p>
		      <p>
		      <div class="form-group">
		      <label for="no_identity">No. Identity</label>
		      <input type="text" class="form-control" id="no_identity" placeholder="NIM/ no.KTP" name="no_identity">
		      </div></p>
		      <p>
		      <div class="form-group">
		      <label for="no_telepon">No telepon</label>
		      <input type="text" class="form-control" id="no_telepon" placeholder="Masukan no telepon" name="no_telepon">
		      </div></p>
		      <p>

		      <div class="form-group">
		      <label for="waktu_sewa">Waktu Sewa</label>
		      <input type="datetime-local" class="form-control" id="waktu_sewa" id="waktu_sewa"
            name="waktu_sewa">
		      </div></p>
          <input type="hidden" class="form-control" id="email" value="@" name="email">
		      <input type="hidden" class="form-control" id="user_id" value="0" name="user_id">
          <input type="hidden" class="form-control" id="waktu_booking" value="
            <?php   $D = exec('date /T');
            $T = exec('time /T');
            $DT = strtotime(str_replace("/","-",$D." ".$T));
            echo(date("Y-m-d H:i:s",$DT)); ?>
          " name="waktu_booking">

		      <button type="submit" class="btn btn-dark" style="background-color: #EA7686"  onclick="return confirm('Apakah anda mau booking?')">Book Now</button></p>
          </style>
        </div>
		      </form>
        </div>
 
        <div class="col-sm-4 col-xs-6 services-w3grid">
          <a href="#spec" class="scroll">
          <span class="fa fa-motorcycle hi-icon" aria-hidden="true">
            <br>
          <?php 
            $result = DB::select(DB::raw('SELECT * FROM motor where id NOT IN (select motor_id from booking)'));
            $row = count($result);
              echo $row; 
          ?>
            </br>
          </span></a>
          <h5>Motor in Place</h5>
          <p>
            <?php 
              if ($row >0){
                echo "Available Motor : ".$row;
              }else{
                echo "Maaf Motor Tidak Tersedia untuk saat ini. <br>";
              }
            
            ?>  
          </p>
          <br><p>Click the icon to see the spesification</p>
        </div> 

        <div class="clearfix"> </div>
      </div> 
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