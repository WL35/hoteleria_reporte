<?php

namespace App\Http\Controllers;

use App\reservaciones;
use App\clientes;
use App\habitaciones;
use Auth;
use Illuminate\Http\Request;
use DB;

class ReservacionesController extends Controller
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
    public function create($id)
    {
        $habitaciones=habitaciones::find($id);
        $cal=DB::select("SELECT * FROM habitaciones h JOIN tipo tip ON h.tip_id=tip.tip_id JOIN temporada tem ON tem.tem_id=tip.tem_id WHERE h.hab_id=$id");
        $cal=$cal[0];
        $v_hab=$cal->tip_precio;
        $v_tem=$cal->tem_valor;
        if($cal->tem_id==1){

                $n_res_total=$v_hab+$v_tem;
                }
                if($cal->tem_id==2){
    
                $n_res_total=$v_hab+$v_tem;
                }
                if($cal->tem_id==3){
    
                $n_res_total=$v_hab-$v_tem;
                }

        $clientes=clientes::all();
        $v_reserva=DB::select("SELECT * FROM habitaciones h LEFT JOIN reservaciones r ON h.hab_id=r.hab_id WHERE h.hab_id=$id AND res_estado=2");
     

        
        if($v_reserva==[]){
            return view('reservaciones.create')->with('clientes',$clientes)->with('habitaciones',$habitaciones)->with('n_res_total',$n_res_total);
            
        }else{
            return view('reservaciones.create')->with('clientes',$clientes)->with('habitaciones',$habitaciones)->with('v_reserva',$v_reserva)->with('n_res_total',$n_res_total);

       }
 
       
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        
        $data['usu_id']=Auth::user()->usu_id;
        // dd($data);

        $hab_id=$data['hab_id'];
        $hab=habitaciones::find($hab_id);
        reservaciones::create($data);
       if($data['res_estado']==1){

           habitaciones::where('hab_id', $hab_id)->update(array('hab_estado' => '2'));
       }else{
        habitaciones::where('hab_id', $hab_id)->update(array('hab_estado' => '1'));

       }
        return redirect(route('habitaciones'))->with('message','Se ha Reservado correctamente ');
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
        $f_actual=date('Y-m-d H:i');
        $reservaciones=DB::select("SELECT * FROM habitaciones h left JOIN reservaciones r ON h.hab_id=r.hab_id 
WHERE h.hab_id=$id
AND '$f_actual' BETWEEN r.res_f_llegada and r.res_f_salida");
             //dd($reservaciones);
        $reservaciones=$reservaciones[0];
        
$clientes=clientes::all();
$habitaciones=$id;

        return view('reservaciones.edit')->with('reservaciones',$reservaciones)->with('clientes',$clientes)->with('habitaciones',$habitaciones);
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
