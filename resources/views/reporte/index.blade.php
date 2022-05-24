@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header bg-dark" style="background: #4873C1;color:white">
                    <div class="row">


                        <div class="col-md-12 pt-2">
                            <h3>
                                Reportes

                            </h3>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <h6>Desde</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>hasta:</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Tipo de Habitacion:</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Cliente:</h6>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-2">
                            <input type="date" class="form-control" name="desde" id="desde">
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control" name="hasta" id="hasta">
                        </div>
                        <div class="col-md-3">

                        <select class="form-control " id="buscador_habitaciones" name="cli_id" id="validationCustom04" required>
                        <option value="todo">Todas las Habitaciones</option>

@foreach($tipos as $tip)
<option value="{{$tip->tip_id}}">{{$tip->tip_nombre}} Camas:{{$tip->tip_camas}}</option>
@endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                        <script>
                                            $("#buscador_habitaciones").select2({

                                                tags: true
                                            });
                                        </script>


                           

                        </div>
                        <div class="col-md-3">
                        <select class="form-control " id="buscador_clientes" name="cli_id" id="validationCustom04" required>
                                            <option disabled selected value="">Seleccione un Cliente</option>

                                            @foreach($clientes as $cli)
                                            <option value="{{$cli->cli_id}}">{{$cli->cli_cedula}} - {{$cli->cli_nombre}} {{$cli->cli_apellido}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                        <script>
                                            $("#buscador_clientes").select2({

                                                tags: true
                                            });
                                        </script>
                        </div>
                   
                        <div class="col-md-1">
                        <button type="button" class="btn" style="border:solid #000 1px; background: #ABFAB5" >
                                        Buscar
                                    </button>
                        </div>
                        <div class="col-md-1">
                        <button type="button" class="btn" style="border:solid #000 1px; background: #FFB3AE" >
                                        PDF
                                    </button>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="card-body">



                <table class="table table-striped">
                    <th>H Nro</th>
                    <th>Nombre</th>
                    <th>Detalle</th>
                    <th>Camas</th>
                    
                    <th>Temporada</th>
                     <th>Personas</th><!-- niños adultos                   -->
<th>Llegada</th>
<th>Salida</th>
<th>cliente</th>
<th>recepcionista</th>
<th>total</th>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>


                    </tr>




                </table>

            </div>
        </div>
    </div>
</div>
</div>

@endsection