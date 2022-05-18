<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factura_detalle extends Model
{
    public $timestamps=false;
    protected $table='factura_detalle';
    protected $primaryKey='fad_id';

    protected $fillable=[
    'fac_id','hab_id','fad_vt',
    ];
}
