@extends('layout/templateAdmin')
@section('tittle', 'Database Motor')

@section('container')

<body>

<h2>Database <span>Data Motor</span>********************************</h2>
<br>


	<div class="container">
   <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addDataMotor">
  		Add Data Motor
	</button>
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
<br>

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

<div class="table100 ver4 m-b-110">
<table data-vertable="ver4" id="myTable">
<thead>
<tr class="row100 head">
<th class="column100 column2" data-column="column2">ID</th>
<th class="column100 column3" data-column="column3">Nama Motor</th>
<th class="column100 column4" data-column="column4">Type</th>
<th class="column100 column5" data-column="column5">Bensin</th>
<th class="column100 column6" data-column="column6">Plat Motor</th>
<th class="column100 column7" data-column="column7">Warna</th>
<th class="column100 column8" data-column="column8">Action 1</th>
<th class="column100 column9" data-column="column9">Action 2</th>
</tr>
</thead>
<tbody>
  @foreach($motor as $motor)
<tr class="row100">
<td class="column100 column2" data-column="column2">{{$motor->id}}</td>
<td class="column100 column3" data-column="column3">{{$motor->nama_motor}}</td>
<td class="column100 column4" data-column="column4">{{$motor->type}}</td>
<td class="column100 column5" data-column="column5">{{$motor->gas}}</td>
<td class="column100 column6" data-column="column6">{{$motor->plat_motor}}</td>
<td class="column100 column7" data-column="column7">{{$motor->warna_motor}}</td>
<td class="column100 column8" data-column="column8">
    <button class="btn btn-warning"  data-nama_motor="{{$motor->nama_motor}}"
        data-id="{{$motor->id}}"
        data-type="{{$motor->type}}" data-gas="{{$motor->gas}}" data-id="{{$motor->id}}"
        data-plat_motor="{{$motor->plat_motor}}" data-warna_motor="{{$motor->warna_motor}}"
        data-toggle="modal"data-target="#edit"><span class="glyphicon glyphicon-edit"></span>
          Edit
      </button>
       {{--    <a href="#" class="btn btn-warning edit">
          Edit
      </a> --}}
</td>
<td class="column100 column9" data-column="column9">
  <a href="delete/{{$motor->id}}"><button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')"><span class="glyphicon glyphicon-trash"></span>delete</button></a>
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
  </div>

<!-- Modal addDataMotor -->
<div class="modal fade" id="addDataMotor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Data Motor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="POST" action="store">
      @csrf

      <div class="form-group">
      <label for="nama_motor">Nama Motor</label>
      <input type="text" class="form-control" id="nama_motor" placeholder="Masukan Nama Motor" name="nama_motor">
      </div>
      <div class="form-group">
      <label for="type">Type</label>
      <input type="text" class="form-control" id="type" placeholder="Matic or another" name="type">
      </div>
      <div class="form-group">
      <label for="gas">Bensin</label>
      <input type="text" class="form-control" id="gas" placeholder="Premium, Pertamax, Pertalite" name="gas">
      </div>
      <div class="form-group">
      <label for="plat_motor">Plat Motor</label>
      <input type="text" class="form-control" id="plat_motor" placeholder="Masukan Plat Motor" name="plat_motor">
      </div>
      <label for="warna_motor">Warna Motor</label>
      <input type="text" class="form-control" id="warna_motor" placeholder="Masukan warna motor" name="warna_motor">
      </div>
      <button type="submit" class="btn btn-primary">add Data</button>
      </form>

      </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->

    <!-- Modal edit-->
   <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="id">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {{-- update/{{$motor->id}} --}}
      <form id="editForm" method="POST" action="update/">
      @csrf
      <input type="hidden" class="form-control" id="id_old" {{-- value="{{$motor->id}}" --}} name="id_old">
      <div class="form-group">
      <label for="id">id</label>
      <input type="text" class="form-control" id="id" {{-- value="{{$motor->id}}" --}} name="id">
      </div>
      <div class="form-group">
      <label for="nama_motor">Nama Motor</label>
      <input type="text" class="form-control" id="nama_motor" {{-- value="{{$motor->nama_motor}}" --}} name="nama_motor">
      </div>
      <div class="form-group">
      <label for="type">Type</label>
      <input type="text" class="form-control" id="type" {{-- value="{{$motor->type}}" --}} name="type">
      </div>
      <div class="form-group">
      <label for="gas">Bensin</label>
      <input type="text" class="form-control" id="gas" {{-- value="{{$motor->gas}}" --}} name="gas">
      </div>
      <div class="form-group">
      <label for="plat_motor">Plat Motor</label>
      <input type="text" class="form-control" id="plat_motor" {{-- value="{{$motor->plat_motor}}" --}} name="plat_motor">
      </div>
      <div class="form-group">
      <label for="warna_motor">Warna Motor</label>
      <input type="text" class="form-control" id="warna_motor" {{-- value="{{$motor->warna_motor}}" --}} name="warna_motor">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      </form>

      </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script>

  $('#edit').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)
  var id = button.data('id')
  var id_old = button.data('id')
  var nama_motor = button.data('nama_motor')
  var type = button.data('type')
  var gas = button.data('gas')
  var plat_motor = button.data('plat_motor')
  var warna_motor = button.data('warna_motor')
  var modal = $(this)

  modal.find('.modal-body #id').val(id);
  modal.find('.modal-body #id_old').val(id_old);
  modal.find('.modal-body #nama_motor').val(nama_motor);
  modal.find('.modal-body #type').val(type);
  modal.find('.modal-body #gas').val(gas);
  modal.find('.modal-body #plat_motor').val(plat_motor);
  modal.find('.modal-body #warna_motor').val(warna_motor);
})
</script>


</body>
@endsection