@extends('layout/templateAdmin')
@section('tittle', 'History')

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



<h2>Database <span>History Sewa</span>********************************</h2>
<br>


  <div class="container">

    <!-- Search form -->
<form class="form-inline active-purple-4" action="/historyDB" method="get">
  <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search by Name"
    aria-label="Search" id="cari" onkeyup="myFunction()" name="cari">
</form>

   @if (session('status'))
   <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   {{session('status')}}
   </div>
   @endif
 </div>
  
  <br>


  <!-- start table -->
<link rel="stylesheet" type="text/css" href="{{URL::asset('table/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/animate/animate.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/select2/select2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">

<link rel="stylesheet" type="text/css" href="{{URL::asset('table/css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('table/css/main.css')}}">

</head>
<body>

<div class="table100 ver3 m-b-110">
<table data-vertable="ver3" id="myTable">
<thead>
<tr class="row100 head">
<th class="column100 column2" data-column="column2">ID History</th>
<th class="column100 column2" data-column="column3">Nama Penyewa</th>
<th class="column100 column3" data-column="column4">Waktu Sewa</th>
<th class="column100 column5" data-column="column5">Action 1</th>
<th class="column100 column6" data-column="column6">Action 2</th>
</tr>
</thead>
<tbody>
  @foreach($history as $history)
<tr class="row100">
<td class="column100 column2" data-column="column2">{{$history->id}}</td>
<td class="column100 column3" data-column="column3">{{$history->nama_user}}</td>
<td class="column100 column4" data-column="column4">{{$history->waktu_sewa}}</td>
<td class="column100 column5" data-column="column5">
  <button class="btn btn-warning" data-toggle="modal"data-target="#detail"
        data-nama_user="{{$history->nama_user}}" data-no_identity="{{$history->no_identity}}"
        data-no_telepon="{{$history->no_telepon}}" data-motor_id="
        <?php  
          $result = DB::select(DB::raw("SELECT * FROM motor where id = '$history->motor_id'"));
            $row = count($result);
            foreach ($result as $result){
              echo $result->id .": ". $result->plat_motor . " (". $result->warna_motor . ")" ;
            }
              ?>"
        data-waktu_sewa="{{$history->waktu_sewa}}"data-waktu_sewa_return="{{$history->waktu_sewa_return}}"
        data-harga_sewa="{{$history->harga_sewa}}"data-user_id="{{$history->user_id}}"><span class="glyphicon glyphicon-edit"></span>
          Detail
      </button>
</td>
<td class="column100 column6" data-column="column6">
  <a href="delistory/{{$history->id}}"><button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')"><span class="glyphicon glyphicon-trash"></span>delete</button></a>

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

  <!-- end table -->


  
</div>


    <!-- Modal edit-->
   <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="id">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
            <label for="nama_user">Nama Penyewa</label>
            <input type="text" class="form-control" id="nama_user"  name="nama_user">
            </div>
            <div class="form-group">
            <label for="no_identity">NIM/KTP</label>
            <input type="text" class="form-control" id="no_identity"  name="no_identity">
            </div>
            <div class="form-group">
            <label for="no_telepon">No.Tlpn</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon">
            </div>
            <div class="form-group">
            <label for="motor_id">Motor</label>
            <input type="text" class="form-control" id="motor_id" name="motor_id">
            </div>
            <div class="form-group">
            <label for="waktu_sewa">Waktu Sewa</label>
            <input type="text" class="form-control" id="waktu_sewa"  name="waktu_sewa">
            </div>
            <div class="form-group">
            <label for="waktu_sewa_return">Waktu Return</label>
            <input type="text" class="form-control" id="waktu_sewa_return" name="waktu_sewa_return">
            </div>
            <div class="form-group">
            <label for="harga_sewa">Harga Sewa</label>
            <input type="text" class="form-control" id="harga_sewa"  name="harga_sewa">
            </div>
             <div class="form-group">
            <label for="user_id">User_ID</label>
            <input type="text" class="form-control" id="user_id"  name="user_id">
            </div>
      </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->

<script src="{{ asset('js/app.js') }}"></script>
<script>
  $('#detail').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var nama_user = button.data('nama_user')
  var no_identity = button.data('no_identity')
  var no_telepon = button.data('no_telepon')
  var motor_id = button.data('motor_id')
  var waktu_sewa = button.data('waktu_sewa')
  var waktu_sewa_return = button.data('waktu_sewa_return')
  var harga_sewa = button.data('harga_sewa')
  var user_id = button.data('user_id')
  var modal = $(this)
  modal.find('.modal-body #nama_user').val(nama_user);
  modal.find('.modal-body #no_identity').val(no_identity);
  modal.find('.modal-body #no_telepon').val(no_telepon);
  modal.find('.modal-body #motor_id').val(motor_id);
  modal.find('.modal-body #waktu_sewa').val(waktu_sewa);
  modal.find('.modal-body #waktu_sewa_return').val(waktu_sewa_return);
  modal.find('.modal-body #harga_sewa').val(harga_sewa);
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
    td = tr[i].getElementsByTagName("td")[0];
    td = tr[i].getElementsByTagName("td")[1];
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