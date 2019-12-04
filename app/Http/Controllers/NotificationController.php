<?php

namespace App\Http\Controllers;
use DB;
use App\Notification;
use App\Booking;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notification = Notification::all();
        return view('Admin.notification', compact('notification'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index');
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request, Notification $notification, $no_identity)
    // {
    //     Notification::create($request->all());
    //     DB::delete('delete from notification where id = ?',[$no_identity]);
    //     return redirect('/notification')->with('status','Sukses! -> Accepted -> Check On Going Menu');
    // }

        public function booking(Request $request)
    {
        Notification::create($request->all());
        return redirect('/')->with('status','Booking Sukses Silahkan Datang ke Lokasi rental untuk mengambil motor sesuai jadwal yang anda tentukan');
    }

        public function confirm(Request $request, Notification $notification,Booking $booking)
    {
        $id = $request->input('id');
        $nama_user = $request->input('nama_user');
        $waktu_sewa_return = $request->input('waktu_sewa_return');
        $waktu_sewa = $request->input('waktu_sewa');
        $no_identity = $request->input('no_identity');
        $no_telepon = $request->input('no_telepon');
        $harga_sewa = $request->input('harga_sewa');
        $motor_id = $request->input('motor_id');
        $user_id = $request->input('user_id');

        $data=array('nama_user'=>$nama_user,"no_identity"=>$no_identity,"no_telepon"=>$no_telepon, "waktu_sewa"=>$waktu_sewa,"waktu_sewa_return"=>$waktu_sewa_return,"harga_sewa"=>$harga_sewa,"motor_id"=>$motor_id,"user_id"=>$user_id);
        DB::table('booking')->insert($data);

        // Booking::create($request->all());
        DB::delete('delete from notification where id = ?',[$id]);
        return redirect('/notification')->with('status','Request Accepted -> Check On Going Menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Notification $notification,Booking $booking, $no_identity)
    // {
        // Booking::create($request->all());
        // DB::delete('delete from notification where no_identity = ?',[$no_identity]);
        // return redirect('/notification')->with('status','Sukses! -> Accepted -> Check On Going Menu');
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification, $id)
    {
        DB::delete('delete from notification where id = ?',[$id]);
        return redirect('/notification')->with('status','Request telah di Cancel');
    }

        public function destroyAll(Notification $notification)
    {
        DB::delete('delete from notification');
        DB::select(DB::raw("ALTER TABLE notification AUTO_INCREMENT = 1"));
        return redirect('/notification')->with('status','Request telah di Cancel');
    }
}
