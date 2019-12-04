@extends('layout/templateAdmin')
@section('tittle', 'notification')

@section('container')

<style>
  .active-purple-4 input[type=text]:focus:not([readonly]) {
border: 1px solid #ce93d8;
box-shadow: 0 0 0 1px #ce93d8;
  background-image: url('/css/searchicon.png');
    background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>

<body>

<h2>Menu <span>Request</span>********************************</h2>
<br>


  <div class="container">
    <!-- Search form -->
<form class="form-inline active-purple-4" action="/historyDB" method="get">
  <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search by Name"
    aria-label="Search" id="cari" onkeyup="myFunction()" name="cari">
</form>
    <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning  pull-right" data-toggle="modal" data-target="#Available">
          Check Available Motor Here
        </button>
  </div>
  <div class="container">
   @if (session('status'))
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   {{session('status')}}
   </div>
   @endif
 </div>

	<div class="container">      

   <!-- start table -->
<link rel="stylesheet" type="text/css" href="{{URL::asset('table/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/animate/animate.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/select2/select2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('table/css/main.css')}}">

</head>
<body>

<div class="table100 ver6 m-b-110">
<table data-vertable="ver6" id="myTable">
<thead>
<tr class="row100 head">
<th class="column100 column2" data-column="column2">Waktu Booking</th>
<th class="column100 column3" data-column="column3">ID Notif</th>
<th class="column100 column4" data-column="column4">Nama Penyewa</th>
<th class="column100 column5" data-column="column5">No Identitas</th>
<th class="column100 column6" data-column="column6">No Telepon</th>
<th class="column100 column7" data-column="column7">Waktu Sewa</th>
<th class="column100 column8" data-column="column8">Action 1</th>
<th class="column100 column9" data-column="column9">Action 2

        <a href="deleteReqAll"><button class="bdg bdg-danger" onclick="return confirm('Yakin mau diCancel semua?')"><span class="glyphicon glyphicon-remove"></span>Cancel All</button></a>
        </div>
</th>
</tr>
</thead>
<tbody>
  @foreach($notification as $notification)
<tr class="row100">
<td class="column100 column2" data-column="column2">{{$notification->waktu_booking}}</td>
<td class="column100 column3" data-column="column3">{{$notification->id}}</td>
<td class="column100 column4" data-column="column4">{{$notification->nama_user}}</td>
<td class="column100 column5" data-column="column5">{{$notification->no_identity}}</td>
<td class="column100 column6" data-column="column6">{{$notification->no_telepon}}</td>
<td class="column100 column7" data-column="column7">{{$notification->waktu_sewa}}</td>
<td class="column100 column8" data-column="column8">
   <button type="button" class="btn btn-primary" 
        data-nama_user="{{$notification->nama_user}}"
        data-user_id="{{$notification->user_id}}"
         data-no_identity="{{$notification->no_identity}}" data-no_telepon="{{$notification->no_telepon}}" 
         data-waktu_sewa="{{$notification->waktu_sewa}}" data-id = "{{$notification->id}}"
        data-toggle="modal" data-target="#confirm"><span class="glyphicon glyphicon-ok"></span>
          Confirm
        </button>
</td>
<td class="column100 column9" data-column="column9">
    <a href="deleteReq/{{$notification->id}}"><button class="btn btn-danger" onclick="return confirm('Yakin mau diCancel?')"><span class="glyphicon glyphicon-remove"></span>Cancel</button></a>
</td>
</tr>
@endforeach
</tbody>
</table>
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

  <!-- end table -->
   </div>
  </div>
    </div>
  </div>


<!-- Modal confirm-->
   <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Confirm</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" action="confirmReq">
      @csrf
      <input type="hidden" class="form-control" id="id" value="" name="id">
      <div class="form-group">
      <label for="nama_user">Nama Penyewa</label>
      <input type="text" class="form-control" id="nama_user" {{-- value="{{$notification->nama_user}}" --}} name="nama_user">
      </div>
      <div class="form-group">
      <label for="no_identity">No. Identity</label>
      <input type="text" class="form-control" id="no_identity" {{-- value="{{$notification->no_identity}}" --}} name="no_identity">
      </div>
      <div class="form-group">
      <label for="no_telepon">No telepon</label>
      <input type="text" class="form-control" id="no_telepon" {{-- value="{{$notification->no_telepon}}" --}} name="no_telepon">
      </div>
      <div class="form-group">
      <label for="motor_id">ID Motor</label>
      <input type="text" class="form-control" id="motor_id" placeholder="Masukan ID motor" name="motor_id" >
      </div>
      <div class="form-group">
      <label for="waktu_sewa">Waktu Sewa</label>
      <input type="text" class="form-control" id="waktu_sewa" value="" name="waktu_sewa">
      </div>
      <div class="form-group">
      <label for="user_id">User_ID</label>
      <input type="text" class="form-control" id="user_id" name="user_id">
      </div>
      <div class="form-group">
      <input type="hidden" class="form-control" id="waktu_sewa_return" value="NULL" name="waktu_sewa_return">
      <input type="hidden" class="form-control" id="harga_sewa" value="Rp " name="harga_sewa">
      </div>
      <button type="submit" class="btn btn-success pull-right" onclick="return confirm('Yakin mau di Confirm?')">Confirm</button>
      </form>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- end modal -->


<!-- Modal available-->
<div class="modal fade" id="Available" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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



<script src="{{ asset('js/app.js') }}"></script>
<script>
  $('#confirm').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id')
  var nama_user = button.data('nama_user')
  var no_identity = button.data('no_identity')
  var waktu_sewa = button.data('waktu_sewa')
  var no_telepon = button.data('no_telepon')
  var user_id = button.data('user_id')
  var modal = $(this)
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #nama_user').val(nama_user);
  modal.find('.modal-body #no_identity').val(no_identity);
  modal.find('.modal-body #waktu_sewa').val(waktu_sewa);
  modal.find('.modal-body #no_telepon').val(no_telepon);
  modal.find('.modal-body #user_id').val(user_id);
})
</script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("cari");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
@endsection