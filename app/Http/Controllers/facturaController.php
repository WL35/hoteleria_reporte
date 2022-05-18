<?php

namespace App\Http\Controllers;
use App\clientes;
use App\factura;
use App\habitaciones;
use DB;
use Illuminate\Http\Request;

class facturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=clientes::all();
        $habitaciones=habitaciones::all();
        return view('factura.index')->with('clientes',$clientes)->with('habitaciones',$habitaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data=$request->all();
        $cli_id=$data['cli_id'];

     $cliente=clientes::find($cli_id);

             $clientes=clientes::all();
        $habitaciones=habitaciones::all();
        $data['fac_vt']=0;
       factura::create($data);
       $factura=DB::select("select max(fac_id) as fac_id from factura");
       $factura=$factura[0];
       $fac_id=$factura->fac_id;
    $factura_detalle=DB::select("SELECT * FROM factura f LEFT JOIN factura_detalle fd ON f.fac_id=fd.fac_id JOIN habitaciones h ON fd.hab_id=h.hab_id JOIN tipo tip ON h.tip_id=tip.tip_id WHERE f.fac_id=$fac_id");
     return view('factura.create')->with('clientes',$clientes)->with('cliente',$cliente)->with('habitaciones',$habitaciones)->with('factura',$factura)->with('factura_detalle',$factura_detalle);
    }
    public function datacli(Request $request)
    {
    //     $data=$request->all();
    //     $cli_id=$data['cli_id'];
    //  $cliente=clientes::find($cli_id);

    //          $clientes=clientes::all();
    //     $habitaciones=habitaciones::all();
       
    //  return view('factura.index')->with('clientes',$clientes)->with('cliente',$cliente)->with('habitaciones',$habitaciones);
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
        $data=$request->all();
      
        $cli_id=$data['cli_id'];
        $fac_id=$data['fac_id'];
     $cliente=clientes::find($cli_id);

             $clientes=clientes::all();
        $habitaciones=habitaciones::all();
        $data['fac_vt']=0;
        $fac=factura::find($fac_id);
        $fac->update($request->all());
        $factura=DB::select("select * from factura where fac_id=$fac_id");
        $factura=$factura[0];
       $fac_id=$factura->fac_id;

        $factura_detalle=DB::select("SELECT * FROM factura f LEFT JOIN factura_detalle fd ON f.fac_id=fd.fac_id JOIN habitaciones h ON fd.hab_id=h.hab_id JOIN tipo tip ON h.tip_id=tip.tip_id WHERE f.fac_id=$fac_id");
    // dd($factura_detalle);
     return view('factura.create')->with('clientes',$clientes)->with('cliente',$cliente)->with('habitaciones',$habitaciones)->with('factura',$factura)->with('factura_detalle',$factura_detalle);
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
