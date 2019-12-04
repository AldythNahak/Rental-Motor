@extends('layout/templateAdmin')
@section('tittle', 'OnGoing')

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
.form-group input[type=text]:focus:not([readonly]) {
border: 1px solid #DE8D19;
box-shadow: 0 0 0 1px #DE8D19;
}

</style>

<body>

<h2>List<span>Out For Rent</span>********************************</h2>
<br>

	<div class="container">
    <!-- Search form -->
<form class="form-inline active-purple-4" action="/historyDB" method="get">
  <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search by Name"
    aria-label="Search" id="cari" onkeyup="myFunction()" name="cari">
  <!-- <i class="fas fa-search" aria-hidden="true"></i> -->
</form>

	</div>
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

	<div class="container">
  <h2>Out for Rent</h2>     

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/animate/animate.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/select2/select2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('table/css/main.css')}}">

</head>
<body>

<div class="table100 ver5 m-b-110">
<table data-vertable="ver5" id="myTable">
<thead>
<tr class="row100 head">
<th class="column100 column2" data-column="column2">ID Booking</th>
<th class="column100 column3" data-column="column3">Nama Penyewa</th>
<th class="column100 column4" data-column="column4">No ID (NIM/KTP)</th>
<th class="column100 column5" data-column="column5">Waktu Sewa</th>
<th class="column100 column6" data-column="column6">Action 1</th>
<th class="column100 column7" data-column="column7">Action 2</th>
</tr>
</thead>
<tbody>
  @foreach($booking as $booking)
<tr class="row100">
<td class="column100 column2" data-column="column2">{{$booking->id}}</td>
<td class="column100 column3" data-column="column3">{{$booking->nama_user}}</td>
<td class="column100 column4" data-column="column4">{{$booking->no_identity}}</td>
<td class="column100 column5" data-column="column5">{{$booking->waktu_sewa}}</td>
<td class="column100 column6" data-column="column6">
  <button class="btn btn-primary"  data-nama_user="{{$booking->nama_user}}"
        data-id="{{$booking->id}}" data-no_identity="{{$booking->no_identity}}" 
        data-motor_id="{{$booking->motor_id}}" data-no_telepon="{{$booking->no_telepon}}"
        data-harga_sewa="{{$booking->harga_sewa}}" data-waktu_sewa="{{$booking->waktu_sewa}}" 
        data-waktu_sewa_return="{{$booking->waktu_sewa_return}}" data-id_old="{{$booking->id}}"
        data-user_id="{{$booking->user_id}}"data-toggle="modal"data-target="#return"><span class="glyphicon glyphicon-ok"></span>
          Return & Detail
        </button>
</td>
<td class="column100 column7" data-column="column7">
  <a href="deleteBooking/{{$booking->id}}"><button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')"><span class="glyphicon glyphicon-trash"></span>delete</button></a> 
</td>
</tr>
@endforeach
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


    <!-- Modal return-->
   <div class="modal fade" id="return" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="id">Return</h3>
        <div>
        <p>1-2 jam = Rp 10.000</p>
        <p>2-3 jam = Rp 15.000</p>
        <p>3-6 jam = Rp 20.000</p>
        <p>6-12 jam = Rp 25.000</p>
        <p>12-24 jam = Rp 40.000</p>
      </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

			<form method="POST" action="return/{{$booking->id}}">
			@csrf
			<input type="hidden" class="form-control" id="id_old" {{-- value="{{$booking->id}}" --}} name="id_old">
      <div class="form-group">
      <label for="user_id">User_ID</label>
      <input type="text" class="form-control" id="user_id" name="user_id">
      </div>
			<div class="form-group">
			<label for="id">id</label>
			<input type="text" class="form-control" id="id" {{-- value="{{$booking->id}}" --}} name="id" >
      </div>
			<div class="form-group">
			<label for="nama_user">Nama Penyewa</label>
			<input type="text" class="form-control" id="nama_user" {{-- value="{{$booking->nama_user}}" --}} name="nama_user">
			</div>
			<div class="form-group">
			<label for="no_identity">No. Identity</label>
			<input type="text" class="form-control" id="no_identity" {{-- value="{{$booking->no_identity}}" --}} name="no_identity">
			</div>
			<div class="form-group">
			<label for="no_telepon">No telepon</label>
			<input type="text" class="form-control" id="no_telepon" {{-- value="{{$booking->no_telepon}}" --}} name="no_telepon">
			</div>
			<div class="form-group">
			<label for="motor_id">ID Motor</label>
			<input type="text" class="form-control" id="motor_id" {{-- value="{{$booking->motor_id}}" --}} name="motor_id" >
			</div>
      <div class="form-group">
      <label for="waktu_sewa">Waktu Sewa</label>
      <input type="text" class="form-control" id="waktu_sewa" {{-- value="{{$booking->waktu_sewa}}" --}} name="waktu_sewa">
      </div>
      <div class="form-group">
      <label for="waktu_sewa_return">Waktu Return</label>
      <input type="text" class="form-control" id="waktu_sewa_return" value="
            <?php   $D = exec('date /T');
            $T = exec('time /T');
            $DT = strtotime(str_replace("/","-",$D." ".$T));
            echo(date("Y-m-d H:i:s",$DT)); ?>"
             name="waktu_sewa_return">
      </div>
      <div class="form-group">
      <label for="harga_sewa">Harga Sewa</label>
      <input type="text" class="form-control" id="harga_sewa" {{-- value="{{$booking->harga_sewa}}" --}} name="harga_sewa">
      </div>
			<button type="submit" class="btn btn-success pull-right" onclick="return confirm('Apakah transaksi berjalan dengan baik?')">Done Transaksi</button>
			</form>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- end modal -->



<script src="{{ asset('js/app.js') }}"></script>
<script>
	$('#return').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var user_id = button.data('user_id')
  var id = button.data('id')
  var id_old = button.data('id_old')
  var nama_user = button.data('nama_user')
  var no_identity = button.data('no_identity')
  var waktu_sewa = button.data('waktu_sewa')
  var no_telepon = button.data('no_telepon')
  var motor_id = button.data('motor_id')
  var harga_sewa = button.data('harga_sewa')
  var modal = $(this)
  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #user_id').val(user_id);
  modal.find('.modal-body #id_old').val(id_old);
  modal.find('.modal-body #nama_user').val(nama_user);
  modal.find('.modal-body #no_identity').val(no_identity);
  modal.find('.modal-body #waktu_sewa').val(waktu_sewa);
  modal.find('.modal-body #no_telepon').val(no_telepon);
  modal.find('.modal-body #motor_id').val(motor_id);
  modal.find('.modal-body #harga_sewa').val(harga_sewa);
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
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      }
      else {
        tr[i].style.display = "none";
      }
    }       
  }

}
</script>

</body>
@endsection