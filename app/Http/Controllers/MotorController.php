<?php

namespace App\Http\Controllers;
use DB;
use App\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motor = Motor::all();
        return view('Admin.databaseMotor', compact('motor')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Motor::create($request->all());
        return redirect('/adminDB')->with('status','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function show(Motor $motor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function edit(Motor $motor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motor $motor,$id)
    {
        $motor_idOld = $request->input('id_old');
        $motor_id = $request->input('id');
        $nama_motor = $request->input('nama_motor');
        $type = $request->input('type');
        $gas = $request->input('gas');
        $plat_motor = $request->input('plat_motor');
        DB::update('update motor set id = ?, nama_motor = ?, type = ?, gas = ?, plat_motor = ? where id = ?',
            [$motor_id ,$nama_motor,$type,$gas,$plat_motor,$motor_idOld]);
        return redirect('/adminDB')->with('status','Data Berhasil Di Edit!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motor $motor,$id)
    {
        DB::delete('delete from motor where id = ?',[$id]);
        return redirect('/adminDB')->with('status','Data Berhasil Di Hapus!');
    }
}
