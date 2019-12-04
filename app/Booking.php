<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $fillable = 
    ['id','nama_user','no_identity','waktu_sewa','waktu_sewa_return','harga_sewa','no_telepon','motor_id','user_id'];
    public $timestamps = false;
}
