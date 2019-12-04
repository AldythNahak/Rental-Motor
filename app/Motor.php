<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'motor';
    protected $fillable = ['id','nama_motor','type','gas','plat_motor','warna_motor'];
    public $timestamps = false;
}
