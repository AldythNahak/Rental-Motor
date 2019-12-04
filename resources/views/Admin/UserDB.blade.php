@extends('layout/templateAdmin')
@section('tittle', 'UserDB')

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



<h2>Database <span>Data User</span>********************************</h2>
<br>


  <div class="container">

    <!-- Search form -->
<form class="form-inline active-purple-4">
  <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search by Name"
    aria-label="Search" id="cari" onkeyup="myFunction()" name="cari">
</form>

  
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

<div class="table100 ver2 m-b-110">
<table data-vertable="ver2" id="myTable">
<thead>
<tr class="row100 head">
<th class="column100 column2" data-column="column2">ID</th>
<th class="column100 column2" data-column="column3">Nama </th>
<th class="column100 column3" data-column="column4">No Identitas</th>
<th class="column100 column5" data-column="column5">No Telepon</th>
<th class="column100 column6" data-column="column6">Alamat</th>
<th class="column100 column7" data-column="column7">Email</th>
</tr>
</thead>
<tbody>
  @foreach($userDB as $userDB)
<tr class="row100">
<td class="column100 column2" data-column="column2">{{$userDB->id}}</td>
<td class="column100 column3" data-column="column3">{{$userDB->name}}</td>
<td class="column100 column4" data-column="column4">{{$userDB->no_identity}}</td>
<td class="column100 column5" data-column="column5">{{$userDB->no_telepon}}</td>
<td class="column100 column6" data-column="column6">{{$userDB->address}}</td>
<td class="column100 column7" data-column="column7">{{$userDB->email}}</td>
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
  var modal = $(this)
  modal.find('.modal-body #nama_user').val(nama_user);
  modal.find('.modal-body #no_identity').val(no_identity);
  modal.find('.modal-body #no_telepon').val(no_telepon);
  modal.find('.modal-body #motor_id').val(motor_id);
  modal.find('.modal-body #waktu_sewa').val(waktu_sewa);
  modal.find('.modal-body #waktu_sewa_return').val(waktu_sewa_return);
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
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
@endsection