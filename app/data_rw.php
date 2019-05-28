<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_rw extends Model
{
    protected $table='data_rws';
    protected $fillable=['datarw','kelurahanrw','kecamatanrw'];
}
