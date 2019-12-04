<?php

namespace App\Http\Controllers;
use DB;
use App\Admin;
use App\Booking;
use App\History;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::all();
        return view('Admin.OnGoing', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = Admin::all();
        return view('Admin.indexAdmin',compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     Booking::create($request->all());
    //     return redirect('/admin')->with('status','Data Sewa Telah Tersimpan! -> check On Going menu for detail');
    // }
        public function sewa(Request $request)
    {
        Booking::create($request->all());
        return redirect('/admin')->with('status','Data Sewa Telah Tersimpan! -> check On Going menu for detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking, History $history, $id)
    {
        $id_old = $request->input('id_old');
        $id = $request->input('id');
        $waktu_sewa_return = $request->input('waktu_sewa_return');
        $harga_sewa = $request->input('harga_sewa');
        $nama_user = $request->input('nama_user');
        $waktu_sewa = $request->input('waktu_sewa');
        $no_identity = $request->input('no_identity');
        $no_telepon = $request->input('no_telepon');
        $motor_id = $request->input('motor_id');
        $user_id = $request->input('user_id');

        $data=array('nama_user'=>$nama_user,"no_identity"=>$no_identity,"no_telepon"=>$no_telepon, "waktu_sewa"=>$waktu_sewa,"waktu_sewa_return"=>$waktu_sewa_return,"harga_sewa"=>$harga_sewa,"motor_id"=>$motor_id,"user_id"=>$user_id);
        
        DB::update('update booking set id = ?, waktu_sewa_return = ?, harga_sewa = ? where id = ?',
            [$id,$waktu_sewa_return,$harga_sewa,$id_old]);
        DB::table('history')->insert($data);
        DB::delete('delete from booking where id = ?',[$id]);
        return redirect('/adminOnGoing')->with('status','Sukses! -> Data tersimpan di History'); 
    }

    //  public function confirm(Request $request, Notification $notification,Booking $booking, $no_identity)
    // {
    //     Booking::create($request->all());
    //     DB::delete('delete from notification where no_identity = ?',[$no_identity]);
    //     return redirect('/notification')->with('status','Request Accepted -> Check On Going Menu');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking, $id)
    {
        DB::delete('delete from booking where id = ?',[$id]);
        return redirect('/adminOnGoing')->with('status','Data Berhasil Di Hapus!');
    }
}
