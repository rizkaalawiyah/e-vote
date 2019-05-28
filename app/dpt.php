<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dpt extends Model
{
    protected $table='dpts';
    protected $fillable=['nama_dpt','alamat_dpt','jns_kelamin','agama_dpt','rwid','rtid', 'voted'];
}
