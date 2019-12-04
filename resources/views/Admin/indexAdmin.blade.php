@extends('layout/templateAdmin')
@section('tittle', 'HomeAdmin')

@section('container')

<style>
	.form-group input[type=text]:focus:not([readonly]) {
border: 1px solid #f48fb1;
box-shadow: 0 0 0 1px #f48fb1;
}
</style>
<body>

<h2>Booking Form <span>Rental Motor Salatiga</span>********************************</h2>
<br>

<div class="container">
	@if (session('status'))
   <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   {{session('status')}}
   </div>
   @endif
	<form method="POST" action="sewa">
			@csrf
			<div class="form-group">
			<label for="nama_user">Nama Penyewa</label>
			<input type="text" class="form-control" id="nama_user" placeholder="Masukan Nama Penyewa" name="nama_user">
			</div>
			<div class="form-group">
			<label for="no_identity">Nomor Identitas</label>
			<input type="text" class="form-control" id="no_identity" placeholder="Masukan Nomor (NIM / KTP)" name="no_identity">
			</div>
			<div class="form-group">
			<label for="waktu_sewa">Waktu Sewa</label>
			<input type="text" class="form-control" id="waktu_sewa" value="
		            <?php   
		              $D = exec('date /T');
					  $T = exec('time /T');
					  $DT = strtotime(str_replace("/","-",$D." ".$T));
					  echo(date("Y-m-d H:i:s",$DT)); ?>"
					  name="waktu_sewa">
			</div>
			<div class="form-group">
			<label for="no_telepon">Nomor Telepon</label>
			<input type="text" class="form-control" id="no_telepon" placeholder="Masukan No.telp" name="no_telepon">
			</div>
      <div class="form-group">
      <label for="motor_id">Select Motor</label>
      <input type="text" class="form-control" id="motor_id" placeholder="nomor Motor" name="motor_id">
      </div>
      <div class="form-group">
			<input type="hidden" class="form-control" id="waktu_sewa_return" value="NULL" name="waktu_sewa_return">
			<input type="hidden" class="form-control" id="harga_sewa" value="Rp " name="harga_sewa">
			<input type="hidden" class="form-control" id="user_id" value="0" name="user_id">
      </div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<!-- Button trigger modal -->
				<button type="button" class="btn btn-warning  pull-right" data-toggle="modal" data-target="#Available">
				  Check Available Motor Here
				</button>
			</form>
			
</div>

	  </div>
  	 </div>
    </div>
  </div>
  
<!-- Modal -->
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


</body>
@endsection
