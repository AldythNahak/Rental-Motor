<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $fillable = 
    ['nama_user','no_identity','waktu_sewa','no_telepon','email','id','waktu_booking','user_id'];
    public $timestamps = false;
}
