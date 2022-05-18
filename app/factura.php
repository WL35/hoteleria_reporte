<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    public $timestamps=false;
    protected $table='factura';
    protected $primaryKey='fac_id';

    protected $fillable=[
    'cli_id','fac_vt',
    ];
}
