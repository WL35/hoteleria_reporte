<?php

namespace App\Http\Controllers;

use App\factura_detalle;
use App\factura;
use App\temporada;
use App\clientes;
use App\habitaciones;

use DB;
use Illuminate\Http\Request;

class factura_detalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data=$request->all();
        
        $hab_id=$data['hab_id'];
        $fac_id=$data['fac_id'];
                $cal=DB::select("SELECT * FROM habitaciones h JOIN tipo tip ON h.tip_id=tip.tip_id JOIN temporada tem ON tem.tem_id=tip.tem_id WHERE h.hab_id=$hab_id");
                $cal=$cal[0];
                $v_hab=$cal->tip_precio;
                $v_tem=$cal->tem_valor;
        if($cal->tem_id==1){

                    $fad_vt=$v_hab+$v_tem;
                    }
                    if($cal->tem_id==2){
        
                        $fad_vt=$v_hab+$v_tem;
                        }
                        if($cal->tem_id==3){
            
                            $fad_vt=$v_hab-$v_tem;
                            }
            
            $data['fad_vt']=$fad_vt;
            
                    factura_detalle::create($data);
            
            // $fd=DB::select("select max(fad_id) as fad_id from factura_detalle");
            // $fd=$fd[0];
            // $fd=$fd->fad_id;
            // $factura_detalle=DB::select("SELECT * FROM factura_detalle fd JOIN habitaciones h ON fd.hab_id=h.hab_id JOIN tipo tip ON h.tip_id=tip.tip_id WHERE fd.fad_id=$fd");
                    // $factura_detalle['fad_vt']=$data['fad_vt'];
                    
                    
                    // return view('factura.create');
                    //  return redirect(route('factura.create'))->with('message','se ha creado el registro    ');
                    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
