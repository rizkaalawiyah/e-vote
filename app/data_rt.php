<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_rt extends Model
{
    protected $table='data_rts';
    protected $fillable=['rt','rw','kelurahan','kecamatan'];
}
